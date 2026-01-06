<?php

namespace App\Http\Controllers;

use App\Models\SeguimientoMedicion;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SeguimientoMedicionController extends Controller
{
    /**
     * Display a listing of the follow-ups.
     */
    public function index(Request $request): View
    {
        $search = $request->input('search');
        $status = $request->input('status');

        $query = SeguimientoMedicion::with(['destinatario', 'medicion']);

        if ($search) {
            $query->whereHas('destinatario', function ($q) use ($search) {
                $q->where('primer_nombre', 'like', "%{$search}%")
                    ->orWhere('segundo_nombre', 'like', "%{$search}%")
                    ->orWhere('primer_apellido', 'like', "%{$search}%")
                    ->orWhere('segundo_apellido', 'like', "%{$search}%");
            });
        }

        if ($status) {
            $query->where('estado', $status);
        }

        $seguimientos = $query->latest()->paginate(15);

        return view('admin.mediciones.seguimientos.index', compact('seguimientos'));
    }

    /**
     * Remove the specified follow-up from storage.
     */
    public function destroy(SeguimientoMedicion $seguimiento)
    {
        $seguimiento->delete();

        return redirect()->route('admin.seguimientos.index')
            ->with('success', 'Seguimiento eliminado exitosamente.');
    }
}
