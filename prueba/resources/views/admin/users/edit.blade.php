@extends('layaout.app')

@section('title', 'Editar Usuario')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: #ffffff; border: 1px solid #808080;">
                <div class="card-header" style="background-color: #ffffff; border-bottom: 1px solid #808080;">
                    <h4 class="mb-0" style="color: #000000;">Editar Usuario: {{ $user->name }}</h4>
                </div>
                <div class="card-body" style="background-color: #ffffff;">
                    <form action="{{ route('admin.users.update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label" style="color: #000000;">Nombre</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" style="border: 1px solid #808080; color: #000000;">
                            @error('name')
                                <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label" style="color: #000000;">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" style="border: 1px solid #808080; color: #000000;">
                            @error('email')
                                <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label" style="color: #000000;">Nueva Contraseña (dejar en blanco para no cambiar)</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" style="border: 1px solid #808080; color: #000000;">
                            @error('password')
                                <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label" style="color: #000000;">Confirmar Nueva Contraseña</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" style="border: 1px solid #808080; color: #000000;">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" style="color: #000000;">Roles</label>
                            <div class="row">
                                @foreach($roles as $role)
                                    <div class="col-md-4 mb-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role->id }}" id="role_{{ $role->id }}" {{ $user->roles->contains($role->id) ? 'checked' : '' }} style="border: 1px solid #808080;">
                                            <label class="form-check-label" for="role_{{ $role->id }}" style="color: #000000;">
                                                {{ $role->name }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.users.index') }}" class="btn" style="background-color: #808080; color: #ffffff; border: 1px solid #808080;">
                                Cancelar
                            </a>
                            <button type="submit" class="btn" style="background-color: #dc3545; color: #ffffff; border: none;">
                                <i class="bx bx-save" style="color: #ffffff;"></i> Actualizar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

