<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $roles = Role::with('permissions')
            ->orderByRaw("CASE 
                WHEN slug = 'director' THEN 1 
                WHEN slug = 'coordinador' THEN 2 
                WHEN slug = 'educador' THEN 3 
                ELSE 4 END")
            ->paginate(15);

        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $permissions = Permission::all();

        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request): RedirectResponse
    {
        $role = Role::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
        ]);

        if ($request->has('permissions')) {
            $role->permissions()->sync($request->permissions);
        }

        return redirect()->route('admin.roles.index')
            ->with('success', 'Rol creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role): View
    {
        $role->load('permissions', 'users');

        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role): View
    {
        $permissions = Permission::all();
        $role->load('permissions');

        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role): RedirectResponse
    {
        $role->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
        ]);

        if ($request->has('permissions')) {
            $role->permissions()->sync($request->permissions);
        } else {
            $role->permissions()->detach();
        }

        return redirect()->route('admin.roles.index')
            ->with('success', 'Rol actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role): RedirectResponse
    {
        $role->delete();

        return redirect()->route('admin.roles.index')
            ->with('success', 'Rol eliminado exitosamente.');
    }
}

