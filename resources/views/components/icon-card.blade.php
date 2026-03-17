<div class="settings-card text-center">
    @if ($icon)
    <div class="settings-card-icon mx-auto mb-5">
        {{ $icon }}
    </div>
    @endif
    <div class="settings-card-content">
        <h3 class="mb-1">{{ $title }}</h3>
        @if ($description)
            <p>{{ $description }}</p>
        @endif
        
        <a href="{{ $link }}" class="settings-card-link">
            {{ $linkText }}
            <svg width="20" height="12" viewBox="0 0 20 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 6H19M19 6L14.1538 11M19 6L14.1538 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a>
    </div>
</div>