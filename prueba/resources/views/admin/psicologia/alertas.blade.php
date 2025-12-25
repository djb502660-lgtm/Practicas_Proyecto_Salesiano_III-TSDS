@extends('layaout.app')

@section('title', 'Alertas Psicologia')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: #ffffff; border: 1px solid #808080;">
                <div class="card-header" style="background-color: #ffffff; border-bottom: 1px solid #808080;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0" style="color: #000000;">Alertas de Psicologia</h4>
                        <a href="{{ route('admin.psicologia.index') }}" class="btn" style="background-color: #808080; color: #ffffff; border: 1px solid #808080;">
                            Volver
                        </a>
                    </div>
                </div>
                <div class="card-body" style="background-color: #ffffff;">
                    <div class="table-responsive">
                        <table class="table table-bordered" style="border: 1px solid #808080; color: #000000;">
                            <thead style="background-color: #f8f9fa; border-bottom: 2px solid #808080;">
                                <tr>
                                    <th style="color: #000000; border: 1px solid #808080;">ID</th>
                                    <th style="color: #000000; border: 1px solid #808080;">Afiliado</th>
                                    <th style="color: #000000; border: 1px solid #808080;">Registro</th>
                                    <th style="color: #000000; border: 1px solid #808080;">Riesgo</th>
                                    <th style="color: #000000; border: 1px solid #808080;">Mensaje</th>
                                    <th style="color: #000000; border: 1px solid #808080;">Estado</th>
                                    <th style="color: #000000; border: 1px solid #808080;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($alertas as $alerta)
                                    <tr>
                                        <td style="color: #000000; border: 1px solid #808080;">{{ $alerta->id }}</td>
                                        <td style="color: #000000; border: 1px solid #808080;">{{ $alerta->afiliado->nombre_completo }}</td>
                                        <td style="color: #000000; border: 1px solid #808080;">
                                            {{ $alerta->registro->tipo_label }} - {{ $alerta->registro->fecha_registro->format('d/m/Y') }}
                                        </td>
                                        <td style="color: #000000; border: 1px solid #808080;">{{ ucfirst($alerta->nivel_riesgo) }}</td>
                                        <td style="color: #000000; border: 1px solid #808080;">{{ $alerta->mensaje }}</td>
                                        <td style="color: #000000; border: 1px solid #808080;">{{ ucfirst($alerta->estado) }}</td>
                                        <td style="color: #000000; border: 1px solid #808080;">
                                            <a href="{{ route('admin.psicologia.show', $alerta->registro) }}" class="btn btn-sm" style="background-color: #dc3545; color: #ffffff; border: 1px solid #808080;">
                                                <i class="bx bx-show" style="color: #ffffff;"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center" style="color: #000000; border: 1px solid #808080;">No hay alertas registradas.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-3">
                        {{ $alertas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
