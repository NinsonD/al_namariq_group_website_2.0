@can('menu-show')
<li class="app-sidebar-menu-item">
    <a href="{{ route('admin.menu.index') }}" class="menu-link d-flex align-items-center {{ activeRoute('admin.menu.*') }}">
        <span class="menu-icon flex-shrink-0">
            <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.5 1H0.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M13.5 6H0.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M13.5 11H0.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
        </span>
        <span class="menu-title flex-grow-1">
            {{ __('sidebar.menu_builder') }}
        </span>
    </a>
</li>
@endcan