@extends('layaout.app')

@section('title', 'Editar Seguimiento Educador')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card" style="background-color: #ffffff; border: 1px solid #808080;">
                    <div class="card-header" style="background-color: #ffffff; border-bottom: 1px solid #808080;">
                        <h4 class="mb-0" style="color: #000000;">Editar Seguimiento Educador</h4>
                    </div>
                    <div class="card-body" style="background-color: #ffffff;">
                        <form action="{{ route('admin.educador.update', $educador) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="destinatario_id" class="form-label" style="color: #000000;">Destinatario
                                        <span style="color: #dc3545;">*</span></label>
                                    <select class="form-control @error('destinatario_id') is-invalid @enderror"
                                        id="destinatario_id" name="destinatario_id" required
                                        style="border: 1px solid #808080; color: #000000;">
                                        <option value="">Seleccione un Destinatario...</option>
                                        @foreach($destinatarios as $destinatario)
                                            <option value="{{ $destinatario->id }}" {{ old('destinatario_id', $educador->destinatario_id) == $destinatario->id ? 'selected' : '' }}>
                                                {{ $destinatario->nombre_completo }} - {{ $destinatario->numero_documento }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('destinatario_id')
                                        <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="tipo" class="form-label" style="color: #000000;">Tipo <span
                                            style="color: #dc3545;">*</span></label>
                                    <select class="form-control @error('tipo') is-invalid @enderror" id="tipo" name="tipo"
                                        required style="border: 1px solid #808080; color: #000000;">
                                        <option value="">Seleccione...</option>
                                        <option value="academico" {{ old('tipo', $educador->tipo) === 'academico' ? 'selected' : '' }}>Académico</option>
                                        <option value="convivencial" {{ old('tipo', $educador->tipo) === 'convivencial' ? 'selected' : '' }}>Convivencial</option>
                                        <option value="disciplinario" {{ old('tipo', $educador->tipo) === 'disciplinario' ? 'selected' : '' }}>Disciplinario</option>
                                        <option value="otro" {{ old('tipo', $educador->tipo) === 'otro' ? 'selected' : '' }}>Otro</option>
                                    </select>
                                    @error('tipo')
                                        <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="fecha_registro" class="form-label" style="color: #000000;">Fecha <span
                                            style="color: #dc3545;">*</span></label>
                                    <input type="date" class="form-control @error('fecha_registro') is-invalid @enderror"
                                        id="fecha_registro" name="fecha_registro"
                                        value="{{ old('fecha_registro', $educador->fecha_registro->format('Y-m-d')) }}" required
                                        style="border: 1px solid #808080; color: #000000;">
                                    @error('fecha_registro')
                                        <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="nivel_riesgo" class="form-label" style="color: #000000;">Nivel de Riesgo</label>
                                    <select class="form-control @error('nivel_riesgo') is-invalid @enderror"
                                        id="nivel_riesgo" name="nivel_riesgo"
                                        style="border: 1px solid #808080; color: #000000;">
                                        <option value="bajo" {{ old('nivel_riesgo', $educador->nivel_riesgo) === 'bajo' ? 'selected' : '' }}>Bajo</option>
                                        <option value="medio" {{ old('nivel_riesgo', $educador->nivel_riesgo) === 'medio' ? 'selected' : '' }}>Medio</option>
                                        <option value="alto" {{ old('nivel_riesgo', $educador->nivel_riesgo) === 'alto' ? 'selected' : '' }}>Alto</option>
                                    </select>
                                    @error('nivel_riesgo')
                                        <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-8 mb-3">
                                    <div class="form-check mt-4">
                                        <input class="form-check-input" type="checkbox" id="riesgo_detectado"
                                            name="riesgo_detectado" value="1" {{ old('riesgo_detectado', $educador->riesgo_detectado) ? 'checked' : '' }}
                                            style="border: 1px solid #808080;">
                                        <label class="form-check-label" for="riesgo_detectado" style="color: #000000;">
                                            Se detectaron signos de riesgo
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="observacion" class="form-label" style="color: #000000;">Observación <span
                                            style="color: #dc3545;">*</span></label>
                                    <textarea class="form-control @error('observacion') is-invalid @enderror"
                                        id="observacion" name="observacion" rows="4"
                                        style="border: 1px solid #808080; color: #000000;">{{ old('observacion', $educador->observacion) }}</textarea>
                                    @error('observacion')
                                        <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="acuerdos" class="form-label" style="color: #000000;">Acuerdos y Compromisos</label>
                                    <textarea class="form-control @error('acuerdos') is-invalid @enderror"
                                        id="acuerdos" name="acuerdos" rows="3"
                                        style="border: 1px solid #808080; color: #000000;">{{ old('acuerdos', $educador->acuerdos) }}</textarea>
                                    @error('acuerdos')
                                        <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.educador.index') }}" class="btn"
                                    style="background-color: #808080; color: #ffffff; border: 1px solid #808080;">
                                    Cancelar
                                </a>
                                <button type="submit" class="btn"
                                    style="background-color: #dc3545; color: #ffffff; border: none;">
                                    <i class="bx bx-save" style="color: #ffffff;"></i> Actualizar Registro
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
