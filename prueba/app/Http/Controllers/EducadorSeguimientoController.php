<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\EducadorSeguimiento;
use App\Models\Destinatario;
use App\Http\Requests\StoreEducadorSeguimientoRequest;
use App\Http\Requests\UpdateEducadorSeguimientoRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;

class EducadorSeguimientoController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:educador.view', only: ['index', 'show']),
            new Middleware('permission:educador.create', only: ['create', 'store']),
            new Middleware('permission:educador.edit', only: ['edit', 'update']),
            new Middleware('permission:educador.delete', only: ['destroy']),
        ];
    }

    public function index(): View
    {
        $registros = EducadorSeguimiento::with(['destinatario', 'user'])
            ->latest('fecha_registro')
            ->paginate(15);

        return view('admin.educador.index', compact('registros'));
    }

    public function create(): View
    {
        $destinatarios = Destinatario::where('estado', 'activo')
            ->orderBy('primer_nombre')
            ->get();

        return view('admin.educador.create', compact('destinatarios'));
    }

    public function store(StoreEducadorSeguimientoRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['riesgo_detectado'] = (bool) ($data['riesgo_detectado'] ?? false);
        $data['user_id'] = auth()->id();

        EducadorSeguimiento::create($data);

        return redirect()->route('admin.educador.index')
            ->with('success', 'Seguimiento de Educador creado exitosamente.');
    }

    public function show(EducadorSeguimiento $educador): View
    {
        $educador->load(['destinatario', 'user']);

        return view('admin.educador.show', compact('educador'));
    }

    public function edit(EducadorSeguimiento $educador): View
    {
        $destinatarios = Destinatario::where('estado', 'activo')
            ->orderBy('primer_nombre')
            ->get();

        $educador->load('destinatario');

        return view('admin.educador.edit', compact('educador', 'destinatarios'));
    }

    public function update(UpdateEducadorSeguimientoRequest $request, EducadorSeguimiento $educador): RedirectResponse
    {
        $data = $request->validated();
        $data['riesgo_detectado'] = (bool) ($data['riesgo_detectado'] ?? false);

        $educador->update($data);

        return redirect()->route('admin.educador.index')
            ->with('success', 'Seguimiento de Educador actualizado exitosamente.');
    }

    public function destroy(EducadorSeguimiento $educador): RedirectResponse
    {
        $educador->delete();

        return redirect()->route('admin.educador.index')
            ->with('success', 'Seguimiento de Educador eliminado exitosamente.');
    }
}
