<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMedicionRequest;
use App\Http\Requests\UpdateMedicionRequest;
use App\Models\Destinatario;
use App\Models\Medicion;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MedicionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $mediciones = Medicion::with(['destinatario', 'user'])
            ->latest('fecha_medicion')
            ->paginate(15);

        return view('admin.mediciones.index', compact('mediciones'));
    }

    /**
     * Display historical measurements for a specific destinatario.
     */
    public function historial(Destinatario $destinatario): View
    {
        $mediciones = Medicion::where('destinatario_id', $destinatario->id)
            ->with(['user'])
            ->latest('fecha_medicion')
            ->paginate(15);

        // Datos para la gráfica (en orden cronológico)
        $graficaData = Medicion::where('destinatario_id', $destinatario->id)
            ->orderBy('fecha_medicion', 'asc')
            ->get();

        $chartData = [
            'dates' => $graficaData->pluck('fecha_medicion')->map(fn($d) => $d->format('d/m/Y')),
            'peso' => $graficaData->pluck('peso'),
            'imc' => $graficaData->pluck('imc'),
        ];

        return view('admin.mediciones.historial', compact('mediciones', 'destinatario', 'chartData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(\Illuminate\Http\Request $request): View
    {
        $destinatarios = Destinatario::where('estado', 'activo')
            ->orderBy('primer_nombre')
            ->get();

        $selected_destinatario_id = $request->get('destinatario_id');

        return view('admin.mediciones.create', compact('destinatarios', 'selected_destinatario_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMedicionRequest $request): RedirectResponse
    {
        $imc = round($request->peso / ($request->talla * $request->talla), 2);
        $clasificacion = $this->obtenerClasificacion($imc);

        $medicion = Medicion::create([
            'destinatario_id' => $request->destinatario_id,
            'peso' => $request->peso,
            'talla' => $request->talla,
            'imc' => $imc,
            'clasificacion' => $clasificacion,
            'observaciones' => $request->observaciones,
            'fecha_medicion' => $request->fecha_medicion,
            'user_id' => auth()->id(),
        ]);

        // Crear automáticamente el registro de seguimiento
        \App\Models\SeguimientoMedicion::create([
            'medicion_id' => $medicion->id,
            'destinatario_id' => $medicion->destinatario_id,
            'fecha_seguimiento' => $medicion->fecha_medicion,
            'fecha_proximo_seguimiento' => \Carbon\Carbon::parse($medicion->fecha_medicion)->addMonths(6),
            'estado' => 'realizado', // Se marca como realizado porque la medición acaba de ocurrir
        ]);

        return redirect()->route('admin.mediciones.index')
            ->with('success', 'Medición y seguimiento registrados exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Medicion $medicion): View
    {
        $medicion->load(['destinatario', 'user']);

        return view('admin.mediciones.show', compact('medicion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medicion $medicion): View
    {
        $destinatarios = Destinatario::where('estado', 'activo')
            ->orderBy('primer_nombre')
            ->get();

        $medicion->load('destinatario');

        return view('admin.mediciones.edit', compact('medicion', 'destinatarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMedicionRequest $request, Medicion $medicion): RedirectResponse
    {
        $imc = round($request->peso / ($request->talla * $request->talla), 2);
        $clasificacion = $this->obtenerClasificacion($imc);

        $medicion->update([
            'destinatario_id' => $request->destinatario_id,
            'peso' => $request->peso,
            'talla' => $request->talla,
            'imc' => $imc,
            'clasificacion' => $clasificacion,
            'observaciones' => $request->observaciones,
            'fecha_medicion' => $request->fecha_medicion,
        ]);

        return redirect()->route('admin.mediciones.index')
            ->with('success', 'Medición actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicion $medicion): RedirectResponse
    {
        $medicion->delete();

        return redirect()->route('admin.mediciones.index')
            ->with('success', 'Medición eliminada exitosamente.');
    }

    /**
     * Get classification based on IMC.
     */
    private function obtenerClasificacion(float $imc): string
    {
        if ($imc < 18.5) {
            return 'desnutricion';
        } elseif ($imc < 25) {
            return 'peso_normal';
        } elseif ($imc < 30) {
            return 'sobrepeso';
        } else {
            return 'obesidad';
        }
    }
}
