<?php

namespace App\Http\Controllers;

use App\Models\NutritionalRecord;
use App\Models\PsychologicalRecord;
use App\Models\Medicion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ReportController extends Controller
{
    /**
     * Muestra el índice de reportes
     */
    public function index()
    {
        return view('reports.index');
    }

    /**
     * Genera reportes nutricionales (RF-03 Comedor/MCI)
     */
    public function nutritional(Request $request)
    {
        $query = NutritionalRecord::with(['student', 'recorder']);

        // Filtros
        if ($request->filled('start_date')) {
            $query->where('record_date', '>=', $request->start_date);
        }
        if ($request->filled('end_date')) {
            $query->where('record_date', '<=', $request->end_date);
        }
        if ($request->filled('classification')) {
            $query->where('classification', $request->classification);
        }
        if ($request->filled('student_id')) {
            $query->where('student_id', $request->student_id);
        }

        $records = $query->latest('record_date')->get();

        // Estadísticas
        $stats = [
            'total' => $records->count(),
            'by_classification' => $records->groupBy('classification')->map->count(),
            'avg_imc' => $records->avg('imc'),
            'students_count' => $records->pluck('student_id')->unique()->count(),
        ];

        $students = User::role('Estudiante')->orderBy('name')->get();

        return view('reports.nutritional', compact('records', 'stats', 'students'));
    }

    /**
     * Genera reportes psicológicos (RF-04 Psicología)
     */
    public function psychological(Request $request)
    {
        $query = PsychologicalRecord::with(['student', 'psychologist']);

        // Filtros
        if ($request->filled('start_date')) {
            $query->where('evaluation_date', '>=', $request->start_date);
        }
        if ($request->filled('end_date')) {
            $query->where('evaluation_date', '<=', $request->end_date);
        }
        if ($request->filled('risk_level')) {
            $query->where('risk_level', $request->risk_level);
        }
        if ($request->filled('student_id')) {
            $query->where('student_id', $request->student_id);
        }

        $records = $query->latest('evaluation_date')->get();

        // Estadísticas
        $stats = [
            'total' => $records->count(),
            'by_risk' => $records->groupBy('risk_level')->map->count(),
            'high_risk_count' => $records->where('risk_level', 'high')->count(),
            'students_count' => $records->pluck('student_id')->unique()->count(),
        ];

        $students = User::role('Estudiante')->orderBy('name')->get();

        return view('reports.psychological', compact('records', 'stats', 'students'));
    }

    /**
     * Vista de alertas psicológicas (RF-03 Psicología)
     */
    public function alerts()
    {
        // Obtener registros con alertas (nivel de riesgo medio o alto)
        $highRiskRecords = PsychologicalRecord::with(['student', 'psychologist'])
            ->where('risk_level', 'high')
            ->latest('evaluation_date')
            ->get();

        $mediumRiskRecords = PsychologicalRecord::with(['student', 'psychologist'])
            ->where('risk_level', 'medium')
            ->latest('evaluation_date')
            ->get();

        return view('reports.alerts', compact('highRiskRecords', 'mediumRiskRecords'));
    }
}

