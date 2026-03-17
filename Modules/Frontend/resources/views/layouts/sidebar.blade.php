@canany(['frontend-about_page_show',
        'frontend-about_page_update',
        'frontend-contact_page_show',
        'frontend-contact_page_update',
        'frontend-home_page_show'
        ])

<li class="app-sidebar-menu-heading">
    <span class="text-uppercase">
        <span class="app-sidebar-menu-heading-line"></span>
        {{ __('sidebar.frontend_contents') }}
    </span>
</li>

@endcanany

@canany(['frontend-home_page_show'])
<li class="app-sidebar-menu-item has-dropdown">
    <a href="javascript:void(0);" class="menu-link d-flex align-items-center">
        <span class="menu-icon flex-shrink-0">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 13.5H1.5C1.23478 13.5 0.98043 13.3946 0.792893 13.2071C0.605357 13.0196 0.5 12.7652 0.5 12.5V1.5C0.5 1.23478 0.605357 0.98043 0.792893 0.792893C0.98043 0.605357 1.23478 0.5 1.5 0.5H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M10.5 3.5L12 0.5L13.5 3.5V12C13.5 12.3978 13.342 12.7794 13.0607 13.0607C12.7794 13.342 12.3978 13.5 12 13.5C11.6022 13.5 11.2206 13.342 10.9393 13.0607C10.658 12.7794 10.5 12.3978 10.5 12V3.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M10.5 9.5H13.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M3.5 0.5V13.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M6 4H8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
        </span>
        <span class="menu-title flex-grow-1">
            {{ __('sidebar.home_pages') }}
        </span>
        <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
            <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </span>
    </a>

    <ul class="app-sidebar-submenu">

        @can('frontend-home_page_show')
        <li class="app-sidebar-menu-item">
            <a href="{{ route('admin.home_main.index') }}" class="menu-link d-flex align-items-center {{ activeRoute(['admin.home_main.*']) }}">
                <span class="menu-title flex-grow-1">
                    {{ __('sidebar.main_home') }}
                </span>
            </a>
        </li>
        @endcan

        @can('frontend-home_page_show')
        <li class="app-sidebar-menu-item">
            <a href="{{ route('admin.home_two.index') }}" class="menu-link d-flex align-items-center {{ activeRoute(['admin.home_two.*']) }}">
                <span class="menu-title flex-grow-1">
                    {{ __('sidebar.home_two') }}
                </span>
            </a>
        </li>
        @endcan

        @can('frontend-home_page_show')
        <li class="app-sidebar-menu-item">
            <a href="{{ route('admin.home_three.index') }}" class="menu-link d-flex align-items-center {{ activeRoute(['admin.home_three.*']) }}">
                <span class="menu-title flex-grow-1">
                    {{ __('sidebar.home_three') }}
                </span>
            </a>
        </li>
        @endcan

        @can('frontend-home_page_show')
        <li class="app-sidebar-menu-item">
            <a href="{{ route('admin.home_five.index') }}" class="menu-link d-flex align-items-center {{ activeRoute(['admin.home_five.*']) }}">
                <span class="menu-title flex-grow-1">
                    {{ __('sidebar.home_five') }}
                </span>
            </a>
        </li>
        @endcan

        @can('frontend-home_page_show')
        <li class="app-sidebar-menu-item">
            <a href="{{ route('admin.home_six.index') }}" class="menu-link d-flex align-items-center {{ activeRoute(['admin.home_six.*']) }}">
                <span class="menu-title flex-grow-1">
                    {{ __('sidebar.home_six') }}
                </span>
            </a>
        </li>
        @endcan
    </ul>
</li>
@endcanany

@canany(['frontend-about_page_show', 'frontend-contact_page_show'])
<li class="app-sidebar-menu-item has-dropdown">
    <a href="javascript:void(0);" class="menu-link d-flex align-items-center">
        <span class="menu-icon flex-shrink-0">
            <svg width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7 12.5C6.99948 12.6705 6.9554 12.838 6.87194 12.9866C6.78847 13.1352 6.6684 13.2601 6.52312 13.3492C6.37784 13.4384 6.21217 13.489 6.04186 13.4961C5.87154 13.5032 5.70223 13.4667 5.55 13.39L1.55 11.39C1.38509 11.3069 1.2464 11.1798 1.14932 11.0227C1.05224 10.8656 1.00056 10.6847 1 10.5V0.5L6.45 3.22C6.61644 3.30386 6.75612 3.43257 6.85331 3.59159C6.95049 3.75062 7.0013 3.93364 7 4.12V12.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M1 0.5H10C10.2652 0.5 10.5196 0.605357 10.7071 0.792893C10.8946 0.98043 11 1.23478 11 1.5V10.5C11 10.7652 10.8946 11.0196 10.7071 11.2071C10.5196 11.3946 10.2652 11.5 10 11.5H7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
        </span>
        <span class="menu-title flex-grow-1">
            {{ __('sidebar.site_pages') }}
        </span>
        <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
            <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </span>
    </a>

    <ul class="app-sidebar-submenu">

        @can('frontend-about_page_show')
        <li class="app-sidebar-menu-item">
            <a href="{{ route('admin.services_page.index') }}" class="menu-link d-flex align-items-center {{ activeRoute('admin.services_page.*') }}">
                <span class="menu-title flex-grow-1">
                    {{ __('sidebar.services_page') }}
                </span>
            </a>
        </li>
        @endcan

        @can('frontend-about_page_show')
        <li class="app-sidebar-menu-item">
            <a href="{{ route('admin.about_page.index') }}" class="menu-link d-flex align-items-center {{ activeRoute('admin.about_page.*') }}">
                <span class="menu-title flex-grow-1">
                    {{ __('sidebar.about_page') }}
                </span>
            </a>
        </li>
        @endcan

        @can('frontend-contact_page_show')
        <li class="app-sidebar-menu-item">
            <a href="{{ route('admin.contact-page') }}" class="menu-link d-flex align-items-center {{ activeRoute('admin.contact-page') }}">
                <span class="menu-title flex-grow-1">
                    {{ __('sidebar.contact_page') }}
                </span>
            </a>
        </li>
        @endcan
    </ul>
</li>
@endcanany
