@if ($errors->has($field))
    <div class="form-text text-danger">
        {{ $errors->first($field) }}
    </div>
@endif