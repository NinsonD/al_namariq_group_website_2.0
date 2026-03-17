@php
    $value = $checked ? 1 : 0;
@endphp
<div class="form-check form-switch {{ $class }}">
    <input class="form-check-input conca-status-switch" type="checkbox" role="switch" id="{{ $id }}" name="{{ $name }}" {{ $checked ? 'checked' : '' }} value="{{ $value }}">
    <label class="form-check-label fw-medium" for="{{ $id }}">{{ $label }}</label>
</div>
