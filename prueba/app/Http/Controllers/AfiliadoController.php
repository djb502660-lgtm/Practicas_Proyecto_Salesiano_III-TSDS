<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAfiliadoRequest;
use App\Http\Requests\UpdateAfiliadoRequest;
use App\Models\Afiliado;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AfiliadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $afiliados = Afiliado::with('user')
            ->latest()
            ->paginate(15);

        return view('admin.afiliados.index', compact('afiliados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.afiliados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAfiliadoRequest $request): RedirectResponse
    {
        $afiliado = Afiliado::create([
            ...$request->validated(),
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('admin.afiliados.index')
            ->with('success', 'Afiliado creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Afiliado $afiliado): View
    {
        $afiliado->load('user');

        return view('admin.afiliados.show', compact('afiliado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Afiliado $afiliado): View
    {
        return view('admin.afiliados.edit', compact('afiliado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAfiliadoRequest $request, Afiliado $afiliado): RedirectResponse
    {
        $afiliado->update($request->validated());

        return redirect()->route('admin.afiliados.index')
            ->with('success', 'Afiliado actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Afiliado $afiliado): RedirectResponse
    {
        $afiliado->delete();

        return redirect()->route('admin.afiliados.index')
            ->with('success', 'Afiliado eliminado exitosamente.');
    }
}

