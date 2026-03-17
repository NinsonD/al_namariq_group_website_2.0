@if ($settings?->show_all_homepage == 1)
<li class="has-dropdown has-mega-menu">
    <a href="{{ url('/') }}">{{ __('frontend.home') }}</a>
    <ul class="tp-submenu submenu">
        <li>
            <a href="{{ route('set-home', ['slug' => 'home_main']) }}">{{ __('frontend.digital_marketing') }}</a>
        </li>
        <li>
            <a href="{{ route('set-home', ['slug' => 'home_two']) }}">{{ __('frontend.it_solutions') }}</a>
        </li>
        <li>
            <a href="{{ route('set-home', ['slug' => 'home_three']) }}">{{ __('frontend.mobile_application') }}</a>
        </li>
        <li>
            <a href="{{ route('set-home', ['slug' => 'home_five']) }}">{{ __('frontend.home_five') }}</a>
        </li>
        <li>
            <a href="{{ route('set-home', ['slug' => 'home_six']) }}">{{ __('frontend.home_six') }}</a>
        </li>
        <li>
            <a href="{{ route('set-home', ['slug' => 'home_shop']) }}">{{ __('frontend.shop_modern') }}</a>
        </li>
    </ul>
</li>
@endif
