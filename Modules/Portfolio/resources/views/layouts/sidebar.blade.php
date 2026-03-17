@can('portfolio-show')
<li class="app-sidebar-menu-item">
    <a href="{{ route('admin.portfolio.index') }}" class="menu-link d-flex align-items-center {{ activeRoute('admin.portfolio.*') }}">
        <span class="menu-icon flex-shrink-0">
            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 11H13V13C13 13.2652 12.8946 13.5196 12.7071 13.7071C12.5196 13.8946 12.2652 14 12 14H3C2.73478 14 2.48043 13.8946 2.29289 13.7071C2.10536 13.5196 2 13.2652 2 13V11Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M11 7C10.7348 7 10.4804 6.89464 10.2929 6.70711C10.1054 6.51957 10 6.26522 10 6V3.5C10 2.83696 9.73661 2.20107 9.26777 1.73223C8.79893 1.26339 8.16304 1 7.5 1C6.83696 1 6.20107 1.26339 5.73223 1.73223C5.26339 2.20107 5 2.83696 5 3.5V6C5 6.26522 4.89464 6.51957 4.70711 6.70711C4.51957 6.89464 4.26522 7 4 7H3C2.46957 7 1.96086 7.21071 1.58579 7.58579C1.21071 7.96086 1 8.46957 1 9V10C1 10.2652 1.10536 10.5196 1.29289 10.7071C1.48043 10.8946 1.73478 11 2 11H13C13.2652 11 13.5196 10.8946 13.7071 10.7071C13.8946 10.5196 14 10.2652 14 10V9C14 8.46957 13.7893 7.96086 13.4142 7.58579C13.0391 7.21071 12.5304 7 12 7H11Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
        </span>
        <span class="menu-title flex-grow-1">{{ __('admin.portfolio') }}</span>
    </a>
</li>
@endcan