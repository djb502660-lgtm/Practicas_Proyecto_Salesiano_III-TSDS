@extends('layaout.app')

@section('content')
<div class="container">
    <h1>Detalle de Evaluación Psicológica</h1>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Registro #{{ $psychologicalRecord->id }}</h5>
            <a href="{{ route('psychological-records.index') }}" class="btn btn-secondary">Volver al listado</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Estudiante:</strong> {{ $psychologicalRecord->student->name }}</p>
                    <p><strong>Fecha de Evaluación:</strong> {{ $psychologicalRecord->evaluation_date->format('d/m/Y') }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Psicólogo/a:</strong> {{ $psychologicalRecord->psychologist->name }}</p>
                    <p><strong>Nivel de Riesgo:</strong> 
                        @php
                            $riskClass = 'bg-secondary';
                            if ($psychologicalRecord->risk_level === 'medium') $riskClass = 'bg-warning text-dark';
                            if ($psychologicalRecord->risk_level === 'high') $riskClass = 'bg-danger';
                        @endphp
                        <span class="badge {{ $riskClass }}">
                            {{ ucfirst($psychologicalRecord->risk_level) }}
                        </span>
                    </p>
                </div>
            </div>
            <hr>
            <h5>Motivo de la Consulta</h5>
            <p>{{ $psychologicalRecord->reason }}</p>

            <h5>Detalles de la Evaluación / Seguimiento</h5>
            <div class="p-3 bg-light border rounded">
                {!! nl2br(e($psychologicalRecord->evaluation_details)) !!}
            </div>

            @if($psychologicalRecord->recommendations)
                <h5 class="mt-3">Recomendaciones</h5>
                <div class="p-3 bg-light border rounded">
                    {!! nl2br(e($psychologicalRecord->recommendations)) !!}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

