@can('pricing-show')
<li class="app-sidebar-menu-item">
    <a href="{{ route('admin.pricing.index') }}" class="menu-link d-flex align-items-center {{ activeRoute('admin.pricing.*') }}">
        <span class="menu-icon flex-shrink-0">
            <svg width="17" height="17" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.5 6.23107V4.26953" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M7.53845 11.4612C7.53845 12.442 8.41461 12.7689 9.49999 12.7689C10.5854 12.7689 11.4615 12.7689 11.4615 11.4612C11.4615 9.4997 7.53845 9.4997 7.53845 7.53816C7.53845 6.23047 8.41461 6.23047 9.49999 6.23047C10.5854 6.23047 11.4615 6.72739 11.4615 7.53816" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M9.5 12.7695V14.7311" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M9.5 18C14.1944 18 18 14.1944 18 9.5C18 4.80558 14.1944 1 9.5 1C4.80558 1 1 4.80558 1 9.5C1 14.1944 4.80558 18 9.5 18Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
        </span>
        <span class="menu-title flex-grow-1">{{ __('sidebar.pricing_plan') }}</span>
    </a>
</li>
@endcan