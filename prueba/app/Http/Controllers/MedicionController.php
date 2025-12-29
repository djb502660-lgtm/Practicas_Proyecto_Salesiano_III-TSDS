<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMedicionRequest;
use App\Http\Requests\UpdateMedicionRequest;
use App\Models\Afiliado;
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
        $mediciones = Medicion::with(['destinatarios', 'user'])
            ->latest('fecha_medicion')
            ->paginate(15);

        return view('admin.mediciones.index', compact('mediciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $afiliados = Afiliado::where('estado', 'activo')
            ->orderBy('primer_nombre')
            ->get();

        return view('admin.mediciones.create', compact('afiliados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMedicionRequest $request): RedirectResponse
    {
        $imc = round($request->peso / ($request->talla * $request->talla), 2);
        $clasificacion = $this->obtenerClasificacion($imc);

        $medicion = Medicion::create([
            'destinatario_id' => $request->afiliado_id,
            'peso' => $request->peso,
            'talla' => $request->talla,
            'imc' => $imc,
            'clasificacion' => $clasificacion,
            'observaciones' => $request->observaciones,
            'fecha_medicion' => $request->fecha_medicion,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('admin.mediciones.index')
            ->with('success', 'Medición registrada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Medicion $medicion): View
    {
        $medicion->load(['afiliado', 'user']);

        return view('admin.mediciones.show', compact('medicion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medicion $medicion): View
    {
        $afiliados = Afiliado::where('estado', 'activo')
            ->orderBy('primer_nombre')
            ->get();

        $medicion->load('afiliado');

        return view('admin.mediciones.edit', compact('medicion', 'afiliados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMedicionRequest $request, Medicion $medicion): RedirectResponse
    {
        $imc = round($request->peso / ($request->talla * $request->talla), 2);
        $clasificacion = $this->obtenerClasificacion($imc);

        $medicion->update([
            'afiliado_id' => $request->afiliado_id,
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
