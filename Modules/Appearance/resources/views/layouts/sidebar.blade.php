

@canany(['appearance-theme-show', 'appearance-theme_colors_show'])
<li class="app-sidebar-menu-heading">
    <span class="text-uppercase">
        <span class="app-sidebar-menu-heading-line"></span>
        {{ __('sidebar.site_contents') }}
    </span>
</li>

<li class="app-sidebar-menu-item has-dropdown">
    <a href="javascript:void(0);" class="menu-link d-flex align-items-center">
        <span class="menu-icon flex-shrink-0">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.0769 15.62C16.3769 19.48 22.0769 16.83 21.6369 18.16C19.1169 25.64 8.9969 23.85 4.6369 19.33C2.62922 17.2789 1.51156 14.5187 1.52654 11.6486C1.54152 8.77846 2.68792 6.03007 4.7169 4.00002C8.9469 -0.18998 16.0769 -0.499979 20.0069 4.00002C27.6369 12.86 15.8369 12.18 16.0769 15.62Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M5.7469 13.31C5.7469 13.7131 5.90705 14.0998 6.1921 14.3848C6.47716 14.6699 6.86377 14.83 7.2669 14.83C7.67003 14.83 8.05665 14.6699 8.34171 14.3848C8.62676 14.0998 8.7869 13.7131 8.7869 13.31C8.7869 12.9069 8.62676 12.5203 8.34171 12.2352C8.05665 11.9502 7.67003 11.79 7.2669 11.79C6.86377 11.79 6.47716 11.9502 6.1921 12.2352C5.90705 12.5203 5.7469 12.9069 5.7469 13.31Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M9.5069 18.14C9.5069 18.5431 9.66705 18.9298 9.9521 19.2148C10.2372 19.4999 10.6238 19.66 11.0269 19.66C11.43 19.66 11.8167 19.4999 12.1017 19.2148C12.3868 18.9298 12.5469 18.5431 12.5469 18.14C12.5469 17.7369 12.3868 17.3503 12.1017 17.0652C11.8167 16.7802 11.43 16.62 11.0269 16.62C10.6238 16.62 10.2372 16.7802 9.9521 17.0652C9.66705 17.3503 9.5069 17.7369 9.5069 18.14Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M13.1469 5.91002C13.1469 6.31315 13.307 6.69977 13.5921 6.98482C13.8772 7.26988 14.2638 7.43002 14.6669 7.43002C15.07 7.43002 15.4567 7.26988 15.7417 6.98482C16.0268 6.69977 16.1869 6.31315 16.1869 5.91002C16.1869 5.50689 16.0268 5.12027 15.7417 4.83522C15.4567 4.55016 15.07 4.39002 14.6669 4.39002C14.2638 4.39002 13.8772 4.55016 13.5921 4.83522C13.307 5.12027 13.1469 5.50689 13.1469 5.91002Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M6.6969 7.52002C6.6969 7.92315 6.85705 8.30977 7.1421 8.59482C7.42716 8.87988 7.81378 9.04002 8.2169 9.04002C8.62003 9.04002 9.00665 8.87988 9.29171 8.59482C9.57676 8.30977 9.7369 7.92315 9.7369 7.52002C9.7369 7.11689 9.57676 6.73027 9.29171 6.44522C9.00665 6.16016 8.62003 6.00002 8.2169 6.00002C7.81378 6.00002 7.42716 6.16016 7.1421 6.44522C6.85705 6.73027 6.6969 7.11689 6.6969 7.52002Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </span>
        <span class="menu-title flex-grow-1">{{ __('sidebar.appreance') }}</span>
        <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
            <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </span>
    </a>

    <ul class="app-sidebar-submenu">

        @can('appearance-theme-show')
        <li class="app-sidebar-menu-item">
            <a href="{{ route('admin.appearance.index') }}" class="menu-link d-flex align-items-center {{ activeRoute('admin.appearance.index') }}">
                <span class="menu-title flex-grow-1">{{ __('sidebar.site_themes') }}</span>
            </a>
        </li>
        @endcan

        @can('appearance-theme_colors_show')
        <li class="app-sidebar-menu-item">
            <a href="{{ route('admin.appearance.colors') }}" class="menu-link d-flex align-items-center {{ activeRoute('admin.appearance.colors') }}">
                <span class="menu-title flex-grow-1">{{ __('sidebar.site_colors')}}</span>
            </a>
        </li>
        @endcan
    </ul>
</li>
@endcanany
