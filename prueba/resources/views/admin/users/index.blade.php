@extends('layaout.app')

@section('title', 'Usuarios')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card" style="background-color: #ffffff; border: 1px solid #808080;">
                    <div class="card-header" style="background-color: #ffffff; border-bottom: 1px solid #808080;">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="mb-0" style="color: #000000;">Lista de Usuarios</h4>
                            <a href="{{ route('admin.users.create') }}" class="btn"
                                style="background-color: #dc3545; color: #ffffff; border: none;">
                                <i class="ri-add-line" style="color: #ffffff;"></i> Nuevo Usuario
                            </a>
                        </div>
                    </div>
                    <div class="card-body" style="background-color: #ffffff;">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert"
                                style="background-color: #d4edda; border: 1px solid #808080; color: #000000;">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-bordered" style="border: 1px solid #808080; color: #000000;">
                                <thead style="background-color: #f8f9fa; border-bottom: 2px solid #808080;">
                                    <tr>
                                        <th style="color: #000000; border: 1px solid #808080;">ID</th>
                                        <th style="color: #000000; border: 1px solid #808080;">Nombre</th>
                                        <th style="color: #000000; border: 1px solid #808080;">Email</th>
                                        <th style="color: #000000; border: 1px solid #808080;">Roles</th>
                                        <th style="color: #000000; border: 1px solid #808080;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($users as $user)
                                        <tr>
                                            <td style="color: #000000; border: 1px solid #808080;">{{ $user->id }}</td>
                                            <td style="color: #000000; border: 1px solid #808080;">{{ $user->name }}</td>
                                            <td style="color: #000000; border: 1px solid #808080;">{{ $user->email }}</td>
                                            <td style="color: #000000; border: 1px solid #808080;">
                                                @foreach($user->roles as $role)
                                                    <span class="badge"
                                                        style="background-color: #dc3545; color: #ffffff; border: 1px solid #808080;">{{ $role->name }}</span>
                                                @endforeach
                                            </td>
                                            <td style="color: #000000; border: 1px solid #808080;">
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.users.show', $user) }}" class="btn btn-sm"
                                                        style="background-color: #dc3545; color: #ffffff; border: 1px solid #808080;">
                                                        <i class="ri-eye-line" style="color: #ffffff;"></i>
                                                    </a>
                                                    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm"
                                                        style="background-color: #dc3545; color: #ffffff; border: 1px solid #808080;">
                                                        <i class="ri-edit-line" style="color: #ffffff;"></i>
                                                    </a>
                                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                                        class="d-inline"
                                                        onsubmit="return confirm('¿Estás seguro de eliminar este usuario?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm"
                                                            style="background-color: #dc3545; color: #ffffff; border: 1px solid #808080;">
                                                            <i class="ri-delete-bin-line" style="color: #ffffff;"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center"
                                                style="color: #000000; border: 1px solid #808080;">No hay usuarios registrados.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-center mt-3">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection