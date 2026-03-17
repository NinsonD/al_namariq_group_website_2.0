@can('faqs-show')
<li class="app-sidebar-menu-item">
    <a href="{{ route('admin.faqs.index') }}" class="menu-link d-flex align-items-center {{ activeRoute(['admin.faqs.*']) }}">
        <span class="menu-icon flex-shrink-0">
            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7.5 14C11.0899 14 14 11.0899 14 7.5C14 3.91015 11.0899 1 7.5 1C3.91015 1 1 3.91015 1 7.5C1 11.0899 3.91015 14 7.5 14Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M6 6C6 5.70333 6.08797 5.41332 6.2528 5.16665C6.41762 4.91997 6.65189 4.72771 6.92597 4.61418C7.20006 4.50065 7.50166 4.47094 7.79264 4.52882C8.08361 4.5867 8.35088 4.72956 8.56066 4.93934C8.77044 5.14912 8.9133 5.41639 8.97118 5.70737C9.02906 5.99834 8.99935 6.29994 8.88582 6.57403C8.77229 6.84812 8.58003 7.08238 8.33336 7.24721C8.08668 7.41203 7.79667 7.5 7.5 7.5V8.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M7.5 11C7.36193 11 7.25 10.8881 7.25 10.75C7.25 10.6119 7.36193 10.5 7.5 10.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M7.5 11C7.63807 11 7.75 10.8881 7.75 10.75C7.75 10.6119 7.63807 10.5 7.5 10.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
        </span>
        <span class="menu-title flex-grow-1">
            {{ __('sidebar.faqs') }}
        </span>
    </a>
</li>
@endcan