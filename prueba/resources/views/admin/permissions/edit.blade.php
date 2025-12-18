@extends('layaout.app')

@section('title', 'Editar Permiso')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: #ffffff; border: 1px solid #808080;">
                <div class="card-header" style="background-color: #ffffff; border-bottom: 1px solid #808080;">
                    <h4 class="mb-0" style="color: #000000;">Editar Permiso: {{ $permission->name }}</h4>
                </div>
                <div class="card-body" style="background-color: #ffffff;">
                    <form action="{{ route('admin.permissions.update', $permission) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label" style="color: #000000;">Nombre</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $permission->name) }}" style="border: 1px solid #808080; color: #000000;">
                            @error('name')
                                <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="slug" class="form-label" style="color: #000000;">Slug</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $permission->slug) }}" style="border: 1px solid #808080; color: #000000;">
                            @error('slug')
                                <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label" style="color: #000000;">Descripción</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" style="border: 1px solid #808080; color: #000000;">{{ old('description', $permission->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.permissions.index') }}" class="btn" style="background-color: #808080; color: #ffffff; border: 1px solid #808080;">
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

