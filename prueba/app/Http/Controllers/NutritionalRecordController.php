<?php

namespace App\Http\Controllers;

use App\Models\NutritionalRecord;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NutritionalRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Carga las relaciones 'student' y 'recorder' para evitar N+1 queries
        $records = NutritionalRecord::with(['student', 'recorder'])
            ->latest('record_date')
            ->paginate(15);

        return view('nutritional-records.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtenemos solo usuarios con el rol 'Estudiante'
        $students = User::role('Estudiante')->get();
        return view('nutritional-records.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:users,id',
            'weight_kg' => 'required|numeric|min:0',
            'height_cm' => 'required|numeric|min:0',
            'record_date' => 'required|date',
        ]);

        $height_m = $request->height_cm / 100;
        $imc = $request->weight_kg / ($height_m * $height_m);
        $classification = $this->getImcClassification($imc);

        NutritionalRecord::create([
            'student_id' => $request->student_id,
            'recorder_id' => Auth::id(),
            'weight_kg' => $request->weight_kg,
            'height_cm' => $request->height_cm,
            'record_date' => $request->record_date,
            'imc' => round($imc, 2),
            'classification' => $classification,
        ]);

        return redirect()->route('nutritional-records.index')->with('success', 'Registro nutricional creado exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NutritionalRecord $nutritionalRecord)
    {
        $students = User::role('Estudiante')->get();
        return view('nutritional-records.edit', compact('nutritionalRecord', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NutritionalRecord $nutritionalRecord)
    {
        $request->validate([
            'student_id' => 'required|exists:users,id',
            'weight_kg' => 'required|numeric|min:0',
            'height_cm' => 'required|numeric|min:0',
            'record_date' => 'required|date',
        ]);

        $height_m = $request->height_cm / 100;
        $imc = $request->weight_kg / ($height_m * $height_m);
        $classification = $this->getImcClassification($imc);

        $nutritionalRecord->update([
            'student_id' => $request->student_id,
            'weight_kg' => $request->weight_kg,
            'height_cm' => $request->height_cm,
            'record_date' => $request->record_date,
            'imc' => round($imc, 2),
            'classification' => $classification,
        ]);

        return redirect()->route('nutritional-records.index')->with('success', 'Registro nutricional actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NutritionalRecord $nutritionalRecord)
    {
        $nutritionalRecord->delete();
        return redirect()->route('nutritional-records.index')->with('success', 'Registro nutricional eliminado exitosamente.');
    }

    /**
     * Calcula la clasificación basada en el IMC.
     * (Esta es una clasificación de ejemplo para adultos, se debería ajustar según tablas pediátricas).
     */
    private function getImcClassification(float $imc): string
    {
        if ($imc < 18.5) {
            return 'Bajo Peso';
        } elseif ($imc < 25) {
            return 'Peso Normal';
        } elseif ($imc < 30) {
            return 'Sobrepeso';
        } else {
            return 'Obesidad';
        }
    }
}

