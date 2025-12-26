<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePsicologiaRegistroRequest;
use App\Http\Requests\UpdatePsicologiaRegistroRequest;
use App\Models\Afiliado;
use App\Models\PsicologiaAlerta;
use App\Models\PsicologiaRegistro;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PsicologiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $registros = PsicologiaRegistro::with(['afiliado', 'user'])
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
        $afiliados = Afiliado::where('estado', 'activo')
            ->orderBy('primer_nombre')
            ->get();

        return view('admin.psicologia.create', compact('afiliados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePsicologiaRegistroRequest $request): RedirectResponse
    {
        $registro = PsicologiaRegistro::create(array_merge(
            $request->validated(),
            ['user_id' => auth()->id()]
        ));

        $this->syncAlerta($registro);

        return redirect()->route('admin.psicologia.index')
            ->with('success', 'Registro de psicologia creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PsicologiaRegistro $psicologiaRegistro): View
    {
        $psicologiaRegistro->load(['afiliado', 'user']);

        return view('admin.psicologia.show', compact('psicologiaRegistro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PsicologiaRegistro $psicologiaRegistro): View
    {
        $afiliados = Afiliado::where('estado', 'activo')
            ->orderBy('primer_nombre')
            ->get();

        $psicologiaRegistro->load('afiliado');

        return view('admin.psicologia.edit', compact('psicologiaRegistro', 'afiliados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePsicologiaRegistroRequest $request, PsicologiaRegistro $psicologiaRegistro): RedirectResponse
    {
        $psicologiaRegistro->update($request->validated());

        $this->syncAlerta($psicologiaRegistro);

        return redirect()->route('admin.psicologia.index')
            ->with('success', 'Registro de psicologia actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PsicologiaRegistro $psicologiaRegistro): RedirectResponse
    {
        $psicologiaRegistro->delete();

        return redirect()->route('admin.psicologia.index')
            ->with('success', 'Registro de psicologia eliminado exitosamente.');
    }

    /**
     * Display the report for a specific afiliado.
     */
    public function report(Afiliado $afiliado): View
    {
        $registros = PsicologiaRegistro::where('afiliado_id', $afiliado->id)
            ->orderBy('fecha_registro')
            ->get();

        return view('admin.psicologia.report', compact('afiliado', 'registros'));
    }

    /**
     * Display the alerts list.
     */
    public function alertasIndex(): View
    {
        $alertas = PsicologiaAlerta::with(['afiliado', 'registro', 'user'])
            ->latest()
            ->paginate(15);

        return view('admin.psicologia.alertas', compact('alertas'));
    }

    /**
     * Create or close alerts based on risk level.
     */
    private function syncAlerta(PsicologiaRegistro $registro): void
    {
        if ($registro->nivel_riesgo === 'alto') {
            $registro->loadMissing('afiliado');
            PsicologiaAlerta::firstOrCreate(
                ['psicologia_registro_id' => $registro->id],
                [
                    'afiliado_id' => $registro->afiliado_id,
                    'nivel_riesgo' => $registro->nivel_riesgo,
                    'mensaje' => sprintf(
                        'Se detecto un nivel de riesgo alto en %s del afiliado %s.',
                        strtolower($registro->tipo_label),
                        $registro->afiliado->nombre_completo
                    ),
                    'estado' => 'pendiente',
                    'user_id' => $registro->user_id,
                ]
            );

            return;
        }

        PsicologiaAlerta::where('psicologia_registro_id', $registro->id)
            ->where('estado', 'pendiente')
            ->update(['estado' => 'cerrada']);
    }
}
