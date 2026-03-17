@if (!$social_links->isEmpty())
    @foreach ($social_links as $link)
    <a href="{{ $link->link }}" target="_blank">
        <i class="{{ $link->icon }}"></i>
    </a>
    @endforeach
@endif
