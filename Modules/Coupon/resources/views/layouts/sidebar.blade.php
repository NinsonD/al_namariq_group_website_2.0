<li class="app-sidebar-menu-item has-dropdown">
    <a href="javascript:void(0);" class="menu-link d-flex align-items-center">
        <span class="menu-icon flex-shrink-0">
            <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1.37147 5.675C1.17263 5.675 0.99119 5.51383 1.00033 5.30316C1.05386 4.0695 1.20385 3.26638 1.62407 2.63107C1.86582 2.26557 2.16612 1.94767 2.51139 1.69174C3.4446 1 4.76111 1 7.39413 1H10.6059C13.2389 1 14.5554 1 15.4886 1.69174C15.8339 1.94767 16.1342 2.26557 16.376 2.63107C16.7961 3.26631 16.9461 4.06932 16.9997 5.30275C17.0088 5.51366 16.8271 5.675 16.6281 5.675C15.5195 5.675 14.6207 6.62639 14.6207 7.8C14.6207 8.97361 15.5195 9.925 16.6281 9.925C16.8271 9.925 17.0088 10.0863 16.9997 10.2973C16.9461 11.5307 16.7961 12.3337 16.376 12.9689C16.1342 13.3344 15.8339 13.6523 15.4886 13.9083C14.5554 14.6 13.2389 14.6 10.6059 14.6H7.39413C4.76111 14.6 3.4446 14.6 2.51139 13.9083C2.16612 13.6523 1.86582 13.3344 1.62407 12.9689C1.20385 12.3336 1.05386 11.5305 1.00033 10.2968C0.99119 10.0862 1.17263 9.925 1.37147 9.925C2.48009 9.925 3.37881 8.97361 3.37881 7.8C3.37881 6.62639 2.48009 5.675 1.37147 5.675Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
            <path d="M7 9.80078L11 5.80078" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M7 5.80078H7.00898M10.991 9.80078H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </span>
        <span class="menu-title flex-grow-1">
            {{ __('sidebar.coupons') }}
        </span>
        <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
            <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </span>
    </a>

    <ul class="app-sidebar-submenu">

        <li class="app-sidebar-menu-item">
            <a href="{{ route('admin.coupons.index') }}" class="menu-link d-flex align-items-center {{ activeRoute('admin.coupons.*') }}">
                <span class="menu-title flex-grow-1">
                    {{ __('sidebar.coupon_list') }}
                </span>
            </a>
        </li>


        <li class="app-sidebar-menu-item">
            <a href="{{ route('admin.coupons-history') }}" class="menu-link d-flex align-items-center {{ activeRoute('admin.coupons-history') }}">
                <span class="menu-title flex-grow-1">
                    {{ __('sidebar.coupon_history') }}
                </span>
            </a>
        </li>
    </ul>
</li>
