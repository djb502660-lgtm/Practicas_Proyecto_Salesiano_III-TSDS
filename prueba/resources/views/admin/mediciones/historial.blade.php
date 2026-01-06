@extends('layaout.app')

@section('title', 'Historial de Mediciones')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card" style="background-color: #ffffff; border: 1px solid #808080;">
                    <div class="card-header" style="background-color: #ffffff; border-bottom: 1px solid #808080;">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="mb-0" style="color: #000000;">Historial Nutricional</h4>
                                <small class="text-muted">{{ $destinatario->nombre_completo }}</small>
                            </div>
                            <div>
                                <a href="{{ route('admin.mediciones.create', ['destinatario_id' => $destinatario->id]) }}"
                                    class="btn" style="background-color: #dc3545; color: #ffffff; border: none;">
                                    <i class="bx bx-plus" style="color: #ffffff;"></i> Nueva Medición
                                </a>
                                <a href="{{ route('admin.mediciones.index') }}" class="btn"
                                    style="background-color: #808080; color: #ffffff; border: none;">
                                    Volver
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="background-color: #ffffff;">
                        <!-- Gráfica de Progreso -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="card" style="border: 1px solid #808080;">
                                    <div class="card-header py-2" style="background-color: #f8f9fa;">
                                        <h6 class="mb-0">Curva de Progreso (Peso e IMC)</h6>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="progressChart" style="max-height: 300px; width: 100%;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered" style="border: 1px solid #808080; color: #000000;">
                                <thead style="background-color: #f8f9fa; border-bottom: 2px solid #808080;">
                                    <tr>
                                        <th style="color: #000000; border: 1px solid #808080;">Fecha</th>
                                        <th style="color: #000000; border: 1px solid #808080;">Peso (kg)</th>
                                        <th style="color: #000000; border: 1px solid #808080;">Talla (m)</th>
                                        <th style="color: #000000; border: 1px solid #808080;">IMC</th>
                                        <th style="color: #000000; border: 1px solid #808080;">Clasificación</th>
                                        <th style="color: #000000; border: 1px solid #808080;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($mediciones as $medicion)
                                        <tr>
                                            <td style="color: #000000; border: 1px solid #808080;">
                                                {{ $medicion->fecha_medicion->format('d/m/Y') }}
                                            </td>
                                            <td style="color: #000000; border: 1px solid #808080;">
                                                {{ number_format($medicion->peso, 2) }}
                                            </td>
                                            <td style="color: #000000; border: 1px solid #808080;">
                                                {{ number_format($medicion->talla, 2) }}
                                            </td>
                                            <td style="color: #000000; border: 1px solid #808080;">
                                                {{ number_format($medicion->imc, 2) }}
                                            </td>
                                            <td style="color: #000000; border: 1px solid #808080;">
                                                <span class="badge"
                                                    style="background-color: {{ $medicion->clasificacion_color }}; color: #ffffff; border: 1px solid #808080;">
                                                    {{ $medicion->clasificacion_label }}
                                                </span>
                                            </td>
                                            <td style="color: #000000; border: 1px solid #808080;">
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.mediciones.show', $medicion) }}" class="btn btn-sm"
                                                        style="background-color: #dc3545; color: #ffffff; border: 1px solid #808080;">
                                                        <i class="bx bx-show" style="color: #ffffff;"></i>
                                                    </a>
                                                    <a href="{{ route('admin.mediciones.edit', $medicion) }}" class="btn btn-sm"
                                                        style="background-color: #dc3545; color: #ffffff; border: 1px solid #808080;">
                                                        <i class="bx bx-edit" style="color: #ffffff;"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center"
                                                style="color: #000000; border: 1px solid #808080;">No hay registros históricos
                                                para este destinatario.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-center mt-3">
                            {{ $mediciones->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('progressChart').getContext('2d');
            const chartData = @json($chartData);

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: chartData.dates,
                    datasets: [
                        {
                            label: 'Peso (kg)',
                            data: chartData.peso,
                            borderColor: '#dc3545',
                            backgroundColor: 'rgba(220, 53, 69, 0.1)',
                            borderWidth: 2,
                            tension: 0.3,
                            yAxisID: 'y',
                            fill: true
                        },
                        {
                            label: 'IMC',
                            data: chartData.imc,
                            borderColor: '#808080',
                            backgroundColor: 'rgba(128, 128, 128, 0.1)',
                            borderWidth: 2,
                            tension: 0.3,
                            yAxisID: 'y1',
                            fill: false
                        }
                    ]
                },
                options: {
                    responsive: true,
                    interaction: {
                        mode: 'index',
                        intersect: false,
                    },
                    scales: {
                        y: {
                            type: 'linear',
                            display: true,
                            position: 'left',
                            title: {
                                display: true,
                                text: 'Peso (kg)'
                            }
                        },
                        y1: {
                            type: 'linear',
                            display: true,
                            position: 'right',
                            grid: {
                                drawOnChartArea: false,
                            },
                            title: {
                                display: true,
                                text: 'IMC'
                            }
                        }
                    }
                }
            });
        });
    </script>
@endpush