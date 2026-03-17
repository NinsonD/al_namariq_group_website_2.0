<a href="{{ $route }}" @if (isset($target) && $target) target="{{ $target }}" @endif {{ $attributes->merge(['class' => 'btn btn-sm btn-icon btn-icon-info rounded-pill']) }} data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{ $title ?? '' }}">
    <x-icons.view />
</a>
