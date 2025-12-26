<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAfiliadoRequest;
use App\Http\Requests\UpdateAfiliadoRequest;
use App\Models\Afiliado;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AfiliadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $search = trim((string) $request->get('q', ''));

        $afiliadosQuery = Afiliado::with('user')
            ->latest();

        if ($search !== '') {
            $afiliadosQuery->where(function ($query) use ($search) {
                $query->where('primer_nombre', 'like', '%' . $search . '%')
                    ->orWhere('segundo_nombre', 'like', '%' . $search . '%')
                    ->orWhere('primer_apellido', 'like', '%' . $search . '%')
                    ->orWhere('segundo_apellido', 'like', '%' . $search . '%')
                    ->orWhere('numero_documento', 'like', '%' . $search . '%')
                    ->orWhere('ciudad_residencia', 'like', '%' . $search . '%')
                    ->orWhere('sector_barrio', 'like', '%' . $search . '%')
                    ->orWhere('departamento_referencia', 'like', '%' . $search . '%');
            });
        }

        $afiliados = $afiliadosQuery
            ->paginate(15)
            ->appends(['q' => $search]);

        return view('admin.afiliados.index', compact('afiliados', 'search'));
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
