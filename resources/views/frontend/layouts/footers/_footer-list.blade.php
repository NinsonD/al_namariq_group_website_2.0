@php
    $menu_data = is_array($menu_data) ? json_encode($menu_data) : $menu_data;
    $menu_data = $menu_data ?: '[]';
    $menu_items = json_decode($menu_data);
    $custom_class = $class ?? '';
@endphp

@if (is_array($menu_items) && count($menu_items) > 0)
    @foreach ($menu_items as $item)
        <li class="{{ isset($item->children) && count($item->children) > 0 ? 'has-dropdown' : '' }}">
            <a href="{{ url($item->href) }}" target="{{ $item->target }}" class="{{ $custom_class }}">
                {{ $item->text }}
            </a>

            @if (isset($item->children) && count($item->children) > 0)
                <ul class="footer-submenu">
                    @include('frontend.layouts.footers._footer-list', ['menu_data' => $item->children])
                </ul>
            @endif
        </li>
    @endforeach
@endif
