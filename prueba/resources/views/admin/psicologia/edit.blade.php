@extends('layaout.app')

@section('title', 'Editar Registro de Psicología')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card" style="background-color: #ffffff; border: 1px solid #808080;">
                    <div class="card-header" style="background-color: #ffffff; border-bottom: 1px solid #808080;">
                        <h4 class="mb-0" style="color: #000000;">Editar Registro</h4>
                    </div>
                    <div class="card-body" style="background-color: #ffffff;">
                        <form action="{{ route('admin.psicologia.update', $psicologia) }}" method="POST"
                            id="psicologiaForm">
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
                                            <option value="{{ $destinatario->id }}" {{ old('destinatario_id', $psicologia->destinatario_id) == $destinatario->id ? 'selected' : '' }}>
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
                                        <option value="evaluacion" {{ old('tipo', $psicologia->tipo) === 'evaluacion' ? 'selected' : '' }}>Evaluacion</option>
                                        <option value="seguimiento" {{ old('tipo', $psicologia->tipo) === 'seguimiento' ? 'selected' : '' }}>Seguimiento</option>
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
                                        value="{{ old('fecha_registro', $psicologia->fecha_registro->format('Y-m-d')) }}"
                                        required style="border: 1px solid #808080; color: #000000;">
                                    @error('fecha_registro')
                                        <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="nivel_riesgo" class="form-label" style="color: #000000;">Nivel de Riesgo
                                        <span style="color: #dc3545;">*</span></label>
                                    <select class="form-control @error('nivel_riesgo') is-invalid @enderror"
                                        id="nivel_riesgo" name="nivel_riesgo" required
                                        style="border: 1px solid #808080; color: #000000;">
                                        <option value="bajo" {{ old('nivel_riesgo', $psicologia->nivel_riesgo) === 'bajo' ? 'selected' : '' }}>Bajo</option>
                                        <option value="medio" {{ old('nivel_riesgo', $psicologia->nivel_riesgo) === 'medio' ? 'selected' : '' }}>Medio</option>
                                        <option value="alto" {{ old('nivel_riesgo', $psicologia->nivel_riesgo) === 'alto' ? 'selected' : '' }}>Alto</option>
                                    </select>
                                    @error('nivel_riesgo')
                                        <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="estado_emocional" class="form-label" style="color: #000000;">Estado
                                        Emocional</label>
                                    <textarea class="form-control" id="estado_emocional" name="estado_emocional" rows="2"
                                        style="border: 1px solid #808080; color: #000000;">{{ old('estado_emocional', $psicologia->estado_emocional) }}</textarea>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="conducta" class="form-label" style="color: #000000;">Conducta</label>
                                    <textarea class="form-control" id="conducta" name="conducta" rows="2"
                                        style="border: 1px solid #808080; color: #000000;">{{ old('conducta', $psicologia->conducta) }}</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="riesgo_detectado"
                                            name="riesgo_detectado" value="1" {{ old('riesgo_detectado', $psicologia->riesgo_detectado) ? 'checked' : '' }}
                                            style="border: 1px solid #808080;">
                                        <label class="form-check-label" for="riesgo_detectado" style="color: #000000;">
                                            Se detectaron signos de riesgo
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row" id="bloqueEvaluacion" style="display: none;">
                                <div class="col-md-12 mb-3">
                                    <label for="diagnostico_inicial" class="form-label" style="color: #000000;">Diagnostico
                                        Inicial <span style="color: #dc3545;">*</span></label>
                                    <textarea class="form-control @error('diagnostico_inicial') is-invalid @enderror"
                                        id="diagnostico_inicial" name="diagnostico_inicial" rows="3"
                                        style="border: 1px solid #808080; color: #000000;">{{ old('diagnostico_inicial', $psicologia->diagnostico_inicial) }}</textarea>
                                    @error('diagnostico_inicial')
                                        <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row" id="bloqueSeguimiento" style="display: none;">
                                <div class="col-md-12 mb-3">
                                    <label for="evolucion" class="form-label" style="color: #000000;">Evolucion <span
                                            style="color: #dc3545;">*</span></label>
                                    <textarea class="form-control @error('evolucion') is-invalid @enderror" id="evolucion"
                                        name="evolucion" rows="3"
                                        style="border: 1px solid #808080; color: #000000;">{{ old('evolucion', $psicologia->evolucion) }}</textarea>
                                    @error('evolucion')
                                        <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="observaciones" class="form-label"
                                        style="color: #000000;">Observaciones</label>
                                    <textarea class="form-control" id="observaciones" name="observaciones" rows="3"
                                        style="border: 1px solid #808080; color: #000000;">{{ old('observaciones', $psicologia->observaciones) }}</textarea>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.psicologia.index') }}" class="btn"
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

    <script>
        function toggleBloques() {
            const tipo = document.getElementById('tipo').value;
            const bloqueEvaluacion = document.getElementById('bloqueEvaluacion');
            const bloqueSeguimiento = document.getElementById('bloqueSeguimiento');

            if (tipo === 'evaluacion') {
                bloqueEvaluacion.style.display = 'flex';
                bloqueSeguimiento.style.display = 'none';
            } else if (tipo === 'seguimiento') {
                bloqueEvaluacion.style.display = 'none';
                bloqueSeguimiento.style.display = 'flex';
            } else {
                bloqueEvaluacion.style.display = 'none';
                bloqueSeguimiento.style.display = 'none';
            }
        }

        document.getElementById('tipo').addEventListener('change', toggleBloques);
        window.onload = toggleBloques;
    </script>
@endsection