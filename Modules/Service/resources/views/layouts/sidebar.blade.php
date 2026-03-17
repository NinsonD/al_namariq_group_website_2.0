@can('services-show')
<li class="app-sidebar-menu-item">
    <a href="{{ route('admin.service.index') }}" class="menu-link d-flex align-items-center {{ activeRoute('admin.service.*') }}">
        <span class="menu-icon flex-shrink-0">
            
            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7.052 10C9.53728 10 11.552 7.98528 11.552 5.5C11.552 3.01472 9.53728 1 7.052 1C4.56672 1 2.552 3.01472 2.552 5.5C2.552 7.98528 4.56672 10 7.052 10Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M7.052 7.5C8.15657 7.5 9.052 6.60457 9.052 5.5C9.052 4.39543 8.15657 3.5 7.052 3.5C5.94743 3.5 5.052 4.39543 5.052 5.5C5.052 6.60457 5.94743 7.5 7.052 7.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M6.18202 9.92L5.30202 13.62C5.28461 13.6903 5.25241 13.7561 5.20758 13.813C5.16275 13.8699 5.10631 13.9166 5.04202 13.95C4.97417 13.9795 4.90099 13.9946 4.82702 13.9946C4.75306 13.9946 4.67988 13.9795 4.61202 13.95L1.29202 12.5C1.22239 12.4671 1.16111 12.4188 1.11279 12.3588C1.06448 12.2988 1.03038 12.2287 1.01306 12.1536C0.99574 12.0786 0.995646 12.0005 1.01279 11.9254C1.02993 11.8503 1.06385 11.7801 1.11202 11.72L3.68202 8.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M8.18201 9.87006L9.08201 13.6201C9.0999 13.6916 9.13339 13.7582 9.18007 13.8153C9.22674 13.8723 9.28546 13.9184 9.35201 13.9501C9.418 13.9799 9.48959 13.9953 9.56201 13.9953C9.63443 13.9953 9.70601 13.9799 9.77201 13.9501L13.072 12.5001C13.1427 12.4675 13.2048 12.419 13.2534 12.3582C13.302 12.2974 13.3358 12.2262 13.352 12.1501C13.371 12.0756 13.3718 11.9977 13.3544 11.9229C13.337 11.8481 13.3019 11.7785 13.252 11.7201L10.572 8.31006" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
        </span>
        <span class="menu-title flex-grow-1">
            {{ __('admin.services') }}
        </span>
    </a>
</li>
@endcan