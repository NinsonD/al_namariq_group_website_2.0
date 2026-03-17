@can('testimonial-show')
<li class="app-sidebar-menu-item">
    <a href="{{ route('admin.testimonial.index') }}" class="menu-link d-flex align-items-center {{ activeRoute('admin.testimonial.*') }}">
        <span class="menu-icon flex-shrink-0">
            <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.5 3L10.5 6L7 1L3.5 6L0.5 3V9.5C0.5 9.89782 0.658035 10.2794 0.93934 10.5607C1.22064 10.842 1.60218 11 2 11H12C12.3978 11 12.7794 10.842 13.0607 10.5607C13.342 10.2794 13.5 9.89782 13.5 9.5V3Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
        </span>
        <span class="menu-title flex-grow-1">{{ __('sidebar.testimonials') }}</span>
    </a>
</li>
@endcan