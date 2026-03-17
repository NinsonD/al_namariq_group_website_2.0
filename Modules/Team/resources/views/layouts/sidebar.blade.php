@can('team-show')
<li class="app-sidebar-menu-item">
    <a href="{{ route('admin.team.index') }}" class="menu-link d-flex align-items-center {{ activeRoute('admin.team.*') }}">
        <span class="menu-icon flex-shrink-0">
            <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.5 5.5C6.74264 5.5 7.75 4.49264 7.75 3.25C7.75 2.00736 6.74264 1 5.5 1C4.25736 1 3.25 2.00736 3.25 3.25C3.25 4.49264 4.25736 5.5 5.5 5.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M10 13H1V12C1 10.8065 1.47411 9.66193 2.31802 8.81802C3.16193 7.97411 4.30653 7.5 5.5 7.5C6.69347 7.5 7.83807 7.97411 8.68198 8.81802C9.52589 9.66193 10 10.8065 10 12V13Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M9.5 1C10.0967 1 10.669 1.23705 11.091 1.65901C11.5129 2.08097 11.75 2.65326 11.75 3.25C11.75 3.84674 11.5129 4.41903 11.091 4.84099C10.669 5.26295 10.0967 5.5 9.5 5.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M11.1 7.68994C11.9518 8.01399 12.6852 8.58905 13.203 9.33903C13.7209 10.089 13.9988 10.9786 14 11.8899V12.9999H12.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
        </span>
        <span class="menu-title flex-grow-1">{{ __('sidebar.team') }}</span>
    </a>
</li>
@endcan