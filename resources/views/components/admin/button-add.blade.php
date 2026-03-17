<button {{ $attributes->merge(['class' => "btn gap-1 btn-" . ($style ? $style . '-' . $variant : $variant), 'type' => 'submit']) }}>
    @if ($icon)
        <x-icons.plus />
    @endif

    {{ $text }}
</button>
