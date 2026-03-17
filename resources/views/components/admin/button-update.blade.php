<button {{ $attributes->merge(['class' => "btn gap-1 btn-" . (isset($style) ? $style . '-' . $variant : $variant), 'type' => 'submit']) }}>
    @if ($icon)
        <x-icons.update />
    @endif

    {{ $text }}
</button>
