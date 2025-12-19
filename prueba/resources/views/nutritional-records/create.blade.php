@extends('layaout.app')

@section('title', 'Crear Registro Nutricional')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: #ffffff; border: 1px solid #808080;">
                <div class="card-header" style="background-color: #ffffff; border-bottom: 1px solid #808080;">
                    <h4 class="mb-0" style="color: #000000;">Nuevo Registro Nutricional</h4>
                </div>
                <div class="card-body" style="background-color: #ffffff;">
                    <form action="{{ route('nutritional-records.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="student_id" class="form-label">Estudiante <span style="color: #dc3545;">*</span></label>
                                <select class="form-control @error('student_id') is-invalid @enderror" id="student_id" name="student_id" required>
                                    <option value="">Seleccione un estudiante...</option>
                                    @foreach($students as $student)
                                        <option value="{{ $student->id }}" {{ old('student_id') == $student->id ? 'selected' : '' }}>
                                            {{ $student->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('student_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="record_date" class="form-label">Fecha de Registro <span style="color: #dc3545;">*</span></label>
                                <input type="date" class="form-control @error('record_date') is-invalid @enderror" id="record_date" name="record_date" value="{{ old('record_date', date('Y-m-d')) }}" required>
                                @error('record_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="weight_kg" class="form-label">Peso (kg) <span style="color: #dc3545;">*</span></label>
                                <input type="number" step="0.01" class="form-control @error('weight_kg') is-invalid @enderror" id="weight_kg" name="weight_kg" value="{{ old('weight_kg') }}" min="0" required>
                                @error('weight_kg')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="height_cm" class="form-label">Altura (cm) <span style="color: #dc3545;">*</span></label>
                                <input type="number" step="0.01" class="form-control @error('height_cm') is-invalid @enderror" id="height_cm" name="height_cm" value="{{ old('height_cm') }}" min="0" required>
                                @error('height_cm')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('nutritional-records.index') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn" style="background-color: #dc3545; color: #ffffff; border: none;">
                                Guardar Registro
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

