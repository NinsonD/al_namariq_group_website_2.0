<div class="form-check form-switch">
    <input class="form-check-input change-status" data-href="{{ $route }}" type="checkbox" role="switch" id="cat-{{ $id }}" {{ $status ? 'checked' : '' }} />

    @if ($text)
    <label class="form-check-label" for="cat-{{ $id }}">
        {{ $text }}
    </label>
    @endif
</div>  