@canany(['blog_category-show', 'blog-show', 'blog_comment-show'])   
<li class="app-sidebar-menu-item has-dropdown">
    <a href="javascript:void(0);" class="menu-link d-flex align-items-center">
        <span class="menu-icon flex-shrink-0">
            <svg width="17" height="15" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 1.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M12 6.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M1 11.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M1 16.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M7.5 5.43V2.57C7.5 1.45 7.05 1 5.92 1H3.07C1.95 1 1.5 1.45 1.5 2.57V5.42C1.5 6.55 1.95 7 3.07 7H5.92C7.05 7 7.5 6.55 7.5 5.43Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </span>
        <span class="menu-title flex-grow-1">{{ __('sidebar.manage_blogs') }}</span>
        <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
            <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </span>
    </a>

    <ul class="app-sidebar-submenu">

        @can('blog_category-show')
        <li class="app-sidebar-menu-item">
            <a href="{{ route('admin.blog-category.index') }}" class="menu-link d-flex align-items-center {{ activeRoute('admin.blog-category.*') }}">
                <span class="menu-title flex-grow-1">{{ __('sidebar.category_list') }}</span>
            </a>
        </li>
        @endcan

        @can('blog-show')
        <li class="app-sidebar-menu-item">
            <a href="{{ route('admin.blog.index') }}" class="menu-link d-flex align-items-center {{ activeRoute('admin.blog.*') }}">
                <span class="menu-title flex-grow-1">{{ __('sidebar.blog_list') }}</span>
            </a>
        </li>
        @endcan

        @can('blog_comment-show')
        <li class="app-sidebar-menu-item">
            <a href="{{ route('admin.blog-comment.index') }}" class="menu-link d-flex align-items-center {{ activeRoute('admin.blog-comment.*') }}">
                <span class="menu-title flex-grow-1">{{ __('sidebar.blog_comments') }}</span>
            </a>
        </li>
        @endcan
    </ul>
</li>

@endcanany