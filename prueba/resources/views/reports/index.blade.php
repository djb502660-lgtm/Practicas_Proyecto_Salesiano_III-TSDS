@extends('layaout.app')

@section('title', 'Reportes')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: #ffffff; border: 1px solid #808080;">
                <div class="card-header" style="background-color: #ffffff; border-bottom: 1px solid #808080;">
                    <h4 class="mb-0" style="color: #000000;">Reportes del Sistema</h4>
                </div>
                <div class="card-body" style="background-color: #ffffff;">
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="card" style="background-color: #f8f9fa; border: 1px solid #808080;">
                                <div class="card-body text-center">
                                    <i class="bx bx-line-chart" style="font-size: 3rem; color: #dc3545;"></i>
                                    <h5 class="mt-3" style="color: #000000;">Reportes Nutricionales</h5>
                                    <p class="text-muted">Estadísticas y análisis de registros nutricionales</p>
                                    <a href="{{ route('reports.nutritional') }}" class="btn" style="background-color: #dc3545; color: #ffffff; border: none;">
                                        Ver Reportes
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="card" style="background-color: #f8f9fa; border: 1px solid #808080;">
                                <div class="card-body text-center">
                                    <i class="bx bx-brain" style="font-size: 3rem; color: #dc3545;"></i>
                                    <h5 class="mt-3" style="color: #000000;">Reportes Psicológicos</h5>
                                    <p class="text-muted">Evaluaciones y seguimientos psicológicos</p>
                                    <a href="{{ route('reports.psychological') }}" class="btn" style="background-color: #dc3545; color: #ffffff; border: none;">
                                        Ver Reportes
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="card" style="background-color: #f8f9fa; border: 1px solid #808080;">
                                <div class="card-body text-center">
                                    <i class="bx bx-error-circle" style="font-size: 3rem; color: #dc3545;"></i>
                                    <h5 class="mt-3" style="color: #000000;">Alertas</h5>
                                    <p class="text-muted">Casos de riesgo psicológico</p>
                                    <a href="{{ route('reports.alerts') }}" class="btn" style="background-color: #dc3545; color: #ffffff; border: none;">
                                        Ver Alertas
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

