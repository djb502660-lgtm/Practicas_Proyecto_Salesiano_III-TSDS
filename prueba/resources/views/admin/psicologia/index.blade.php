@extends('layaout.app')

@section('title', 'Psicologia')

@section('content')
<style>
    .psych-page {
        display: flex;
        flex-direction: column;
        gap: 18px;
    }

    .psych-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        flex-wrap: wrap;
    }

    .psych-breadcrumb {
        color: #7a7a7a;
        font-size: 0.9rem;
        margin-bottom: 4px;
    }

    .psych-title {
        font-size: 1.6rem;
        font-weight: 700;
        color: #151515;
        margin: 0;
    }

    .psych-actions {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
    }

    .psych-btn {
        background: #dc3545;
        color: #ffffff;
        border: none;
        padding: 10px 18px;
        border-radius: 12px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .psych-btn:hover {
        background: #b91e24;
        color: #ffffff;
    }

    .psych-btn-muted {
        background: #f1f1f1;
        color: #333333;
        border: 1px solid #e1e1e1;
        padding: 10px 16px;
        border-radius: 12px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .psych-card {
        border-radius: 18px !important;
        box-shadow: 0 12px 28px rgba(15, 15, 15, 0.06);
    }

    .psych-toolbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        flex-wrap: wrap;
        margin-bottom: 16px;
    }

    .psych-section-title {
        font-weight: 700;
        color: #1f1f1f;
        margin: 0;
    }

    .psych-search {
        display: flex;
        align-items: center;
        gap: 8px;
        background: #f7f7f7;
        border: 1px solid #e3e3e3;
        border-radius: 10px;
        padding: 8px 12px;
        min-width: 240px;
    }

    .psych-search input {
        border: none;
        background: transparent;
        outline: none;
        width: 100%;
        font-size: 0.9rem;
        color: #333333;
    }

    .psych-list {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .psych-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 14px 16px;
        border: 1px solid #edf0f4;
        border-radius: 14px;
        background: #ffffff;
        box-shadow: 0 6px 14px rgba(15, 15, 15, 0.04);
    }

    .psych-left {
        display: flex;
        align-items: center;
        gap: 14px;
        min-width: 0;
    }

    .psych-avatar {
        width: 44px;
        height: 44px;
        border-radius: 999px;
        background: #f2f2f2;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #8a8a8a;
        font-size: 1.4rem;
    }

    .psych-info {
        min-width: 0;
    }

    .psych-name {
        font-weight: 600;
        color: #1f1f1f;
        margin: 0;
        font-size: 0.98rem;
    }

    .psych-meta {
        color: #7a7a7a;
        font-size: 0.85rem;
    }

    .psych-badge {
        display: inline-flex;
        align-items: center;
        padding: 3px 9px;
        border-radius: 999px;
        font-size: 0.72rem;
        font-weight: 600;
        margin-left: 8px;
    }

    .psych-actions-row {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .psych-icon-btn {
        width: 34px;
        height: 34px;
        border-radius: 10px;
        border: 1px solid #e3e3e3;
        background: #ffffff;
        color: #555555;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .psych-icon-btn:hover {
        border-color: #dc3545;
        color: #dc3545;
    }

    @media (max-width: 768px) {
        .psych-item {
            flex-direction: column;
            align-items: flex-start;
        }

        .psych-actions-row {
            width: 100%;
            justify-content: flex-end;
        }
    }
</style>

<div class="psych-page">
    <div class="psych-header">
        <div>
            <div class="psych-breadcrumb">Psicología / Gestión de Pacientes</div>
            <h2 class="psych-title">Gestión de Pacientes de Psicología</h2>
        </div>
        <div class="psych-actions">
            <a href="{{ route('admin.psicologia.create') }}" class="psych-btn">
                <i class="bx bx-plus"></i> Nuevo Paciente
            </a>
            <a href="{{ route('admin.psicologia-alertas.index') }}" class="psych-btn-muted">
                <i class="bx bx-alarm"></i>
                Alertas
                @if($alertasPendientes > 0)
                    <span class="badge" style="background-color: #dc3545; color: #ffffff; margin-left: 4px;">
                        {{ $alertasPendientes }}
                    </span>
                @endif
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color: #d4edda; border: 1px solid #808080; color: #000000;">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card psych-card">
        <div class="card-body">
            <div class="psych-toolbar">
                <h5 class="psych-section-title">Seleccionar Niño/a</h5>
                <div class="psych-search">
                    <i class="bx bx-search" style="color: #9a9a9a;"></i>
                    <input type="text" placeholder="Buscar por nombre o ID" />
                </div>
            </div>

            <div class="psych-list">
                @forelse($registros as $registro)
                    @php
                        $estadoLabel = match (true) {
                            $registro->afiliado?->estado === 'inactivo' => 'Dado de alta',
                            $registro->nivel_riesgo === 'alto' => 'Evaluación pendiente',
                            $registro->tipo === 'evaluacion' => 'En terapia',
                            $registro->tipo === 'seguimiento' => 'En seguimiento',
                            default => 'Sin estado',
                        };
                        $estadoColor = match ($estadoLabel) {
                            'Dado de alta' => '#e9f8ee',
                            'Evaluación pendiente' => '#ffeaea',
                            'En terapia' => '#eef4ff',
                            'En seguimiento' => '#fff7da',
                            default => '#f0f0f0',
                        };
                        $estadoText = match ($estadoLabel) {
                            'Dado de alta' => '#2e7a45',
                            'Evaluación pendiente' => '#b7464a',
                            'En terapia' => '#2f5c9d',
                            'En seguimiento' => '#8a6d1f',
                            default => '#6a6a6a',
                        };
                    @endphp
                    <div class="psych-item">
                        <div class="psych-left">
                            <div class="psych-avatar">
                                <i class="bx bx-user"></i>
                            </div>
                            <div class="psych-info">
                                <div class="d-flex align-items-center flex-wrap">
                                    <p class="psych-name mb-0">{{ $registro->afiliado->nombre_completo }}</p>
                                    <span class="psych-badge" style="background-color: {{ $estadoColor }}; color: {{ $estadoText }};">
                                        {{ $estadoLabel }}
                                    </span>
                                </div>
                                <div class="psych-meta">ID: {{ $registro->afiliado->id }}</div>
                            </div>
                        </div>
                        <div class="psych-actions-row">
                            <a href="{{ route('admin.psicologia.show', $registro) }}" class="psych-icon-btn" title="Ver">
                                <i class="bx bx-show"></i>
                            </a>
                            <a href="{{ route('admin.psicologia.edit', ['psicologiaRegistro' => $registro]) }}" class="psych-icon-btn" title="Editar">
                                <i class="bx bx-edit"></i>
                            </a>
                            <a href="{{ route('admin.psicologia.report', $registro->afiliado) }}" class="psych-icon-btn" title="Reporte">
                                <i class="bx bx-file"></i>
                            </a>
                            <form action="{{ route('admin.psicologia.destroy', $registro) }}" method="POST" onsubmit="return confirm('Esta seguro de eliminar este registro?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="psych-icon-btn" title="Eliminar">
                                    <i class="bx bx-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="text-center" style="color: #000000;">No hay registros de psicologia.</div>
                @endforelse
            </div>

            <div class="d-flex justify-content-center mt-3">
                {{ $registros->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
