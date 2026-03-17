<button {{ $attributes->merge(['class' => "btn btn-" . ($style ? $style . '-' . $variant : $variant)]) }}>
    {{ $text ?? $slot }}
</button>
