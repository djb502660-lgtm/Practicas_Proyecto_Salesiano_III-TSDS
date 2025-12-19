@extends('layaout.app')

@section('content')
<div class="container">
    <h1>Nueva Evaluación Psicológica</h1>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('psychological-records.store') }}" method="POST">
                @include('psychological-records._form')
                <a href="{{ route('psychological-records.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar Evaluación</button>
            </form>
        </div>
    </div>
</div>
@endsection

