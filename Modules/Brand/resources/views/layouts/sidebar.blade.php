@can('brands-show')
<li class="app-sidebar-menu-item">
    <a href="{{ route('admin.brand.index') }}" class="menu-link d-flex align-items-center {{ activeRoute('admin.brand.*') }}">
        <span class="menu-icon flex-shrink-0">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.7688 2.23073L11.5719 6.42765M2.23125 2.23073L6.42817 6.42765M2.23125 15.7696L6.42817 11.5727M15.7688 15.7696L11.5719 11.5727M17 9C17 13.4183 13.4183 17 9 17C4.58172 17 1 13.4183 1 9C1 4.58172 4.58172 1 9 1C13.4183 1 17 4.58172 17 9ZM12.6303 9.0003C12.6303 11.0055 11.0047 12.6311 8.99952 12.6311C6.9943 12.6311 5.36875 11.0055 5.36875 9.0003C5.36875 6.99508 6.9943 5.36953 8.99952 5.36953C11.0047 5.36953 12.6303 6.99508 12.6303 9.0003Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </span>
        <span class="menu-title flex-grow-1">{{ __('sidebar.brands') }}</span>
    </a>
</li>
@endcan