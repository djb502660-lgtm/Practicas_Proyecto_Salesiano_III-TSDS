<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDestinatarioRequest;
use App\Http\Requests\UpdateDestinatarioRequest;
use App\Models\Destinatario;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DestinatarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $destinatarios = Destinatario::with('user')
            ->latest()
            ->paginate(15);

        return view('admin.destinatarios.index', compact('destinatarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.destinatarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDestinatarioRequest $request): RedirectResponse
    {
        $destinatario = destinatario::create([
            ...$request->validated(),
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('admin.destinatarios.index')
            ->with('success', 'destinatario creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Destinatario $destinatario): View
    {
        $destinatario->load('user');

        return view('admin.destinatarios.show', compact('destinatario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Destinatario $destinatario): View
    {
        return view('admin.destinatarios.edit', compact('destinatario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDestinatarioRequest $request, Destinatario $destinatario): RedirectResponse
    {
        $destinatario->update($request->validated());

        return redirect()->route('admin.destinatarios.index')
            ->with('success', 'Destinatario actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Destinatario $destinatario): RedirectResponse
    {
        $destinatario->delete();

        return redirect()->route('admin.destinatarios.index')
            ->with('success', 'Destinatario eliminado exitosamente.');
    }
}
