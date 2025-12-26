@extends('layaout.app')

@section('title', 'Editar Medición')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: #ffffff; border: 1px solid #808080;">
                <div class="card-header" style="background-color: #ffffff; border-bottom: 1px solid #808080;">
                    <h4 class="mb-0" style="color: #000000;">Editar Medición</h4>
                </div>
                <div class="card-body" style="background-color: #ffffff;">
                    <form action="{{ route('admin.mediciones.update', $medicion) }}" method="POST" id="medicionForm">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="afiliado_id" class="form-label" style="color: #000000;">Afiliado <span style="color: #dc3545;">*</span></label>
                                <input type="text" class="form-control mb-2" id="afiliado_busqueda" placeholder="Buscar afiliado..." style="border: 1px solid #808080; color: #000000;">
                                <select class="form-control @error('afiliado_id') is-invalid @enderror" id="afiliado_id" name="afiliado_id" required style="border: 1px solid #808080; color: #000000;">
                                    <option value="">Seleccione un afiliado...</option>
                                    @foreach($afiliados as $afiliado)
                                        <option value="{{ $afiliado->id }}" {{ old('afiliado_id', $medicion->afiliado_id) == $afiliado->id ? 'selected' : '' }}>
                                            {{ $afiliado->nombre_completo }} - {{ $afiliado->numero_documento }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('afiliado_id')
                                    <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="fecha_medicion" class="form-label" style="color: #000000;">Fecha de Medición <span style="color: #dc3545;">*</span></label>
                                <input type="date" class="form-control @error('fecha_medicion') is-invalid @enderror" id="fecha_medicion" name="fecha_medicion" value="{{ old('fecha_medicion', $medicion->fecha_medicion->format('Y-m-d')) }}" required style="border: 1px solid #808080; color: #000000;">
                                @error('fecha_medicion')
                                    <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="peso" class="form-label" style="color: #000000;">Peso (kg) <span style="color: #dc3545;">*</span></label>
                                <input type="number" step="0.01" class="form-control @error('peso') is-invalid @enderror" id="peso" name="peso" value="{{ old('peso', $medicion->peso) }}" min="1" max="300" required style="border: 1px solid #808080; color: #000000;" oninput="calcularIMC()">
                                @error('peso')
                                    <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                @enderror
                                <small class="form-text" style="color: #000000;">Ingrese el peso en kilogramos</small>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="talla" class="form-label" style="color: #000000;">Talla (metros) <span style="color: #dc3545;">*</span></label>
                                <input type="number" step="0.01" class="form-control @error('talla') is-invalid @enderror" id="talla" name="talla" value="{{ old('talla', $medicion->talla) }}" min="0.5" max="2.5" required style="border: 1px solid #808080; color: #000000;" oninput="calcularIMC()">
                                @error('talla')
                                    <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                @enderror
                                <small class="form-text" style="color: #000000;">Ingrese la talla en metros (ej: 1.75)</small>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="card" style="background-color: #f8f9fa; border: 1px solid #808080;">
                                    <div class="card-body">
                                        <h5 style="color: #000000;">Cálculo de IMC</h5>
                                        <div id="imcResultado" style="color: #000000;">
                                            <p>Complete los campos de peso y talla para calcular el IMC</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="observaciones" class="form-label" style="color: #000000;">Observaciones</label>
                                <textarea class="form-control" id="observaciones" name="observaciones" rows="3" style="border: 1px solid #808080; color: #000000;">{{ old('observaciones', $medicion->observaciones) }}</textarea>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.mediciones.index') }}" class="btn" style="background-color: #808080; color: #ffffff; border: 1px solid #808080;">
                                Cancelar
                            </a>
                            <button type="submit" class="btn" style="background-color: #dc3545; color: #ffffff; border: none;">
                                <i class="bx bx-save" style="color: #ffffff;"></i> Actualizar Medición
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function filtrarAfiliados() {
    const input = document.getElementById('afiliado_busqueda');
    const filtro = input.value.toLowerCase();
    const select = document.getElementById('afiliado_id');
    const opciones = select.options;

    for (let i = 0; i < opciones.length; i += 1) {
        const texto = opciones[i].text.toLowerCase();
        opciones[i].style.display = texto.includes(filtro) || opciones[i].value === '' ? '' : 'none';
    }
}
function calcularIMC() {
    const peso = parseFloat(document.getElementById('peso').value);
    const talla = parseFloat(document.getElementById('talla').value);
    const resultadoDiv = document.getElementById('imcResultado');

    if (peso && talla && talla > 0) {
        const imc = peso / (talla * talla);
        const imcRedondeado = imc.toFixed(2);
        
        let clasificacion = '';
        let color = '';
        
        if (imc < 18.5) {
            clasificacion = 'Desnutrición';
            color = '#ffc107';
        } else if (imc < 25) {
            clasificacion = 'Peso Normal';
            color = '#28a745';
        } else if (imc < 30) {
            clasificacion = 'Sobrepeso';
            color = '#fd7e14';
        } else {
            clasificacion = 'Obesidad';
            color = '#dc3545';
        }

        resultadoDiv.innerHTML = `
            <p><strong>IMC:</strong> <span style="font-size: 1.2em; color: ${color};">${imcRedondeado}</span></p>
            <p><strong>Clasificación:</strong> <span style="color: ${color}; font-weight: bold;">${clasificacion}</span></p>
        `;
    } else {
        resultadoDiv.innerHTML = '<p>Complete los campos de peso y talla para calcular el IMC</p>';
    }
}

// Calcular IMC al cargar la página
window.onload = function() {
    calcularIMC();
};
document.getElementById('afiliado_busqueda').addEventListener('input', filtrarAfiliados);
</script>
@endsection
