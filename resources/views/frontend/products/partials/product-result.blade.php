<p class="mb-0">
    @if ($total > 0)
        {{ __('frontend.showing') }} {{ $firstItem }}-{{ $lastItem }} {{ __('frontend.of') }} {{ $total }} {{ __('frontend.results') }}
    @else
        {{ __('frontend.no_products_found') }}
    @endif
</p>
