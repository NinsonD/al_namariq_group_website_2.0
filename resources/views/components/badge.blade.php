<span {{ $attributes->merge(['class' => "badge rounded-pill badge-" . ($style ? $style . '-' . $variant : $variant)]) }}>
    {{ $text ?? $slot }}
</span>
