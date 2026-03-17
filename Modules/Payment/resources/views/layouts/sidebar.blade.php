<li class="app-sidebar-menu-item">
    <a href="{{ route('admin.payments.index') }}" class="menu-link d-flex align-items-center {{ activeRoute('admin.payments.*') }}">
        <span class="menu-icon flex-shrink-0">
            <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12.2001 9.79961C12.2001 10.4624 12.7374 10.9996 13.4001 10.9996C14.0628 10.9996 14.6001 10.4624 14.6001 9.79961C14.6001 9.13687 14.0628 8.59961 13.4001 8.59961C12.7374 8.59961 12.2001 9.13687 12.2001 9.79961Z" stroke="currentColor" stroke-width="1.5" />
            <path d="M7.4 4.2H12.2C14.4627 4.2 15.5941 4.2 16.2971 4.90294C17 5.60589 17 6.73726 17 9V10.6C17 12.8627 17 13.9941 16.2971 14.6971C15.5941 15.4 14.4627 15.4 12.2 15.4H7.4C4.38301 15.4 2.87452 15.4 1.93726 14.4627C1 13.5255 1 12.017 1 9V7.4C1 4.38301 1 2.87452 1.93726 1.93726C2.87452 1 4.38301 1 7.4 1H10.6C11.344 1 11.716 1 12.0212 1.08178C12.8494 1.3037 13.4963 1.95061 13.7182 2.77883C13.8 3.08403 13.8 3.45602 13.8 4.2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
            </svg>
        </span>
        <span class="menu-title flex-grow-1">
            {{ __('sidebar.payment_methods') }}
        </span>
    </a>
</li>
