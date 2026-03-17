@can('social-show')
<li class="app-sidebar-menu-item">
    <a href="{{ route('admin.social.index') }}" class="menu-link d-flex align-items-center {{ activeRoute('admin.social.*') }}">
        <span class="menu-icon flex-shrink-0">
            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3 9.5C4.10457 9.5 5 8.60457 5 7.5C5 6.39543 4.10457 5.5 3 5.5C1.89543 5.5 1 6.39543 1 7.5C1 8.60457 1.89543 9.5 3 9.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M12 5C13.1046 5 14 4.10457 14 3C14 1.89543 13.1046 1 12 1C10.8954 1 10 1.89543 10 3C10 4.10457 10.8954 5 12 5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M12 14C13.1046 14 14 13.1046 14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M4.20999 5.90998L10.06 3.47998" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M4.20999 9.09009L10.06 11.5201" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </span>
        <span class="menu-title flex-grow-1">
            {{ __('sidebar.social_links') }}
        </span>
    </a>
</li>
@endcan