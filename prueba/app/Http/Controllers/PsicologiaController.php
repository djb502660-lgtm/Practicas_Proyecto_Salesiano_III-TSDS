<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePsicologiaRequest;
use App\Http\Requests\UpdatePsicologiaRequest;
use App\Models\Destinatario;
use App\Models\Psicologia;
use App\Models\PsicologiaAlerta;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PsicologiaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:psicologia.view')->only(['index', 'show']);
        $this->middleware('permission:psicologia.create')->only(['create', 'store']);
        $this->middleware('permission:psicologia.edit')->only(['edit', 'update']);
        $this->middleware('permission:psicologia.delete')->only(['destroy']);
        $this->middleware('permission:psicologia-reportes.view')->only(['report']);
        $this->middleware('permission:psicologia-alertas.view')->only(['alertasIndex']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $registros = Psicologia::with(['destinatario', 'user'])
            ->latest('fecha_registro')
            ->paginate(15);

        $alertasPendientes = PsicologiaAlerta::where('estado', 'pendiente')->count();

        return view('admin.psicologia.index', compact('registros', 'alertasPendientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $destinatarios = Destinatario::where('estado', 'activo')
            ->orderBy('primer_nombre')
            ->get();

        return view('admin.psicologia.create', compact('destinatarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePsicologiaRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['riesgo_detectado'] = (bool) ($data['riesgo_detectado'] ?? false);
        $data['user_id'] = auth()->id();

        $registro = Psicologia::create($data);

        $this->syncAlerta($registro);

        return redirect()->route('admin.psicologia.index')
            ->with('success', 'Registro de Psicología creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Psicologia $psicologia): View
    {
        $psicologia->load(['destinatario', 'user']);

        return view('admin.psicologia.show', compact('psicologia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Psicologia $psicologia): View
    {
        $destinatarios = Destinatario::where('estado', 'activo')
            ->orderBy('primer_nombre')
            ->get();

        $psicologia->load('destinatario');

        return view('admin.psicologia.edit', compact('psicologia', 'destinatarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePsicologiaRequest $request, Psicologia $psicologia): RedirectResponse
    {
        $data = $request->validated();
        $data['riesgo_detectado'] = (bool) ($data['riesgo_detectado'] ?? false);

        $psicologia->update($data);

        $this->syncAlerta($psicologia);

        return redirect()->route('admin.psicologia.index')
            ->with('success', 'Registro de Psicología actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Psicologia $psicologia): RedirectResponse
    {
        $psicologia->delete();

        return redirect()->route('admin.psicologia.index')
            ->with('success', 'Registro de Psicología eliminado exitosamente.');
    }

    /**
     * Display the report for a specific afiliado.
     */
    public function report(Destinatario $destinatario): View
    {
        $registros = Psicologia::where('destinatario_id', $destinatario->id)
            ->orderBy('fecha_registro')
            ->get();

        return view('admin.psicologia.report', compact('destinatario', 'registros'));
    }

    /**
     * Display the alerts list.
     */
    public function alertasIndex(): View
    {
        $alertas = PsicologiaAlerta::with(['destinatario', 'psicologia', 'user'])
            ->latest()
            ->paginate(15);

        return view('admin.psicologia.alertas', compact('alertas'));
    }

    /**
     * Create or close alerts based on risk level.
     */
    private function syncAlerta(Psicologia $registro): void
    {
        $registro->loadMissing('destinatario');
        $debeAlertar = $registro->riesgo_detectado && $registro->nivel_riesgo === 'alto';

        if ($debeAlertar) {
            PsicologiaAlerta::updateOrCreate(
                ['psicologia_id' => $registro->id],
                [
                    'destinatario_id' => $registro->destinatario_id,
                    'nivel_riesgo' => $registro->nivel_riesgo,
                    'mensaje' => sprintf(
                        'Se detecto un nivel de riesgo alto en %s del Destinatario %s.',
                        strtolower($registro->tipo_label),
                        $registro->destinatario->nombre_completo
                    ),
                    'estado' => 'pendiente',
                    'user_id' => $registro->user_id,
                ]
            );

            $registro->updateQuietly(['alerta_generada' => true]);

            return;
        }

        PsicologiaAlerta::where('psicologia_id', $registro->id)
            ->where('estado', 'pendiente')
            ->update(['estado' => 'cerrada']);

        $registro->updateQuietly(['alerta_generada' => false]);
    }
}
