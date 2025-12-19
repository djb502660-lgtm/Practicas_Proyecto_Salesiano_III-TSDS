<?php

namespace App\Http\Controllers;

use App\Models\PsychologicalRecord;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PsychologicalRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = PsychologicalRecord::with(['student', 'psychologist'])
            ->latest('evaluation_date')
            ->paginate(15);

        return view('psychological-records.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = User::role('Estudiante')->orderBy('name')->get();
        return view('psychological-records.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:users,id',
            'evaluation_date' => 'required|date',
            'reason' => 'required|string|max:255',
            'evaluation_details' => 'required|string',
            'recommendations' => 'nullable|string',
            'risk_level' => 'required|in:low,medium,high',
        ]);

        PsychologicalRecord::create($request->all() + [
            'psychologist_id' => Auth::id(),
        ]);

        return redirect()->route('psychological-records.index')->with('success', 'Evaluación psicológica guardada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PsychologicalRecord $psychologicalRecord)
    {
        // Cargar relaciones para la vista detallada
        $psychologicalRecord->load(['student', 'psychologist']);
        return view('psychological-records.show', compact('psychologicalRecord'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PsychologicalRecord $psychologicalRecord)
    {
        $students = User::role('Estudiante')->orderBy('name')->get();
        return view('psychological-records.edit', compact('psychologicalRecord', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PsychologicalRecord $psychologicalRecord)
    {
        $request->validate([
            'student_id' => 'required|exists:users,id',
            'evaluation_date' => 'required|date',
            'reason' => 'required|string|max:255',
            'evaluation_details' => 'required|string',
            'recommendations' => 'nullable|string',
            'risk_level' => 'required|in:low,medium,high',
        ]);

        $psychologicalRecord->update($request->all());

        return redirect()->route('psychological-records.index')->with('success', 'Evaluación psicológica actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PsychologicalRecord $psychologicalRecord)
    {
        $psychologicalRecord->delete();
        return redirect()->route('psychological-records.index')->with('success', 'Evaluación psicológica eliminada exitosamente.');
    }
}

