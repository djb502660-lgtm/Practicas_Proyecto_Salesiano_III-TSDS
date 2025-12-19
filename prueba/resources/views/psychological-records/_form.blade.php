@csrf

<div class="mb-3">
    <label for="student_id" class="form-label">Estudiante</label>
    <select class="form-select @error('student_id') is-invalid @enderror" id="student_id" name="student_id" required>
        <option value="" disabled selected>Selecciona un estudiante</option>
        @foreach ($students as $student)
            <option value="{{ $student->id }}" {{ old('student_id', $psychologicalRecord->student_id ?? '') == $student->id ? 'selected' : '' }}>
                {{ $student->name }}
            </option>
        @endforeach
    </select>
    @error('student_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="evaluation_date" class="form-label">Fecha de Evaluación</label>
        <input type="date" class="form-control @error('evaluation_date') is-invalid @enderror" id="evaluation_date" name="evaluation_date" value="{{ old('evaluation_date', isset($psychologicalRecord) ? $psychologicalRecord->evaluation_date->format('Y-m-d') : now()->format('Y-m-d')) }}" required>
        @error('evaluation_date')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label for="reason" class="form-label">Motivo de la Consulta</label>
        <input type="text" class="form-control @error('reason') is-invalid @enderror" id="reason" name="reason" value="{{ old('reason', $psychologicalRecord->reason ?? '') }}" required>
        @error('reason')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label for="evaluation_details" class="form-label">Detalles de la Evaluación / Seguimiento</label>
    <textarea class="form-control @error('evaluation_details') is-invalid @enderror" id="evaluation_details" name="evaluation_details" rows="5" required>{{ old('evaluation_details', $psychologicalRecord->evaluation_details ?? '') }}</textarea>
    @error('evaluation_details')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="recommendations" class="form-label">Recomendaciones</label>
    <textarea class="form-control @error('recommendations') is-invalid @enderror" id="recommendations" name="recommendations" rows="3">{{ old('recommendations', $psychologicalRecord->recommendations ?? '') }}</textarea>
    @error('recommendations')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="risk_level" class="form-label">Nivel de Riesgo (Alerta)</label>
    <select class="form-select @error('risk_level') is-invalid @enderror" id="risk_level" name="risk_level" required>
        @php
            $riskLevel = old('risk_level', $psychologicalRecord->risk_level ?? 'low');
        @endphp
        <option value="low" {{ $riskLevel == 'low' ? 'selected' : '' }}>Bajo</option>
        <option value="medium" {{ $riskLevel == 'medium' ? 'selected' : '' }}>Medio</option>
        <option value="high" {{ $riskLevel == 'high' ? 'selected' : '' }}>Alto</option>
    </select>
    @error('risk_level')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

