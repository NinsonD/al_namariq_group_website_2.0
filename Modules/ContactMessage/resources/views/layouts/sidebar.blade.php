@can('contact_message-show')
<li class="app-sidebar-menu-item">
    <a href="{{ route('admin.contact-message.index') }}" class="menu-link d-flex align-items-center {{ activeRoute('admin.contact-message.*') }}">
        <span class="menu-icon flex-shrink-0">
            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 8C4.27614 8 4.5 7.77614 4.5 7.5C4.5 7.22386 4.27614 7 4 7C3.72386 7 3.5 7.22386 3.5 7.5C3.5 7.77614 3.72386 8 4 8Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M7.25 8C7.52614 8 7.75 7.77614 7.75 7.5C7.75 7.22386 7.52614 7 7.25 7C6.97386 7 6.75 7.22386 6.75 7.5C6.75 7.77614 6.97386 8 7.25 8Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M10.5 8C10.7761 8 11 7.77614 11 7.5C11 7.22386 10.7761 7 10.5 7C10.2239 7 10 7.22386 10 7.5C10 7.77614 10.2239 8 10.5 8Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M7.5 1C6.32424 1.00037 5.1706 1.31964 4.16194 1.92381C3.15329 2.52799 2.3274 3.39444 1.77223 4.43088C1.21707 5.46732 0.953431 6.63493 1.00939 7.80936C1.06535 8.98378 1.43881 10.121 2.09 11.1L1 14L4.65 13.34C5.52891 13.7695 6.49342 13.9951 7.47165 13.9999C8.44987 14.0048 9.41657 13.7888 10.2997 13.368C11.1828 12.9472 11.9596 12.3325 12.5721 11.5698C13.1846 10.807 13.617 9.91586 13.8371 8.96271C14.0573 8.00957 14.0594 7.01903 13.8434 6.06493C13.6275 5.11083 13.1989 4.21779 12.5898 3.45237C11.9806 2.68694 11.2065 2.06889 10.3253 1.64427C9.44399 1.21965 8.47824 0.999424 7.5 1V1Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </span>
        <span class="menu-title flex-grow-1">{{ __('sidebar.contact_messages') }}</span>
    </a>
</li>
@endcan