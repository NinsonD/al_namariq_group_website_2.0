@if ($paginator->hasPages())
<div class="basic-pagination">
    <nav aria-label="navigation">
        <ul class="tp-pagination">

            {{-- Previous Page Link --}}
            @if (!$paginator->onFirstPage())
                <li><a href="{{ $paginator->previousPageUrl() }}"><i class="fa-solid fa-arrow-left"></i></a></li>
            @endif

            @php
                $currentPage = $paginator->currentPage();
                $lastPage = $paginator->lastPage();
                $pages = [];

                // Always show current -2 to current +2
                for ($i = $currentPage - 2; $i <= $currentPage + 2; $i++) {
                    if ($i > 0 && $i <= $lastPage) {
                        $pages[] = $i;
                    }
                }

                // Always show first page
                if (!in_array(1, $pages)) {
                    array_unshift($pages, 1);
                }

                // Always show last page
                if (!in_array($lastPage, $pages)) {
                    $pages[] = $lastPage;
                }

                sort($pages);
            @endphp

            {{-- Display pages with "..." where needed --}}
            @php $previous = 0; @endphp
            @foreach ($pages as $page)
                @if ($previous && $page - $previous > 1)
                    <li class="disabled"><span>...</span></li>
                @endif

                @if ($page == $currentPage)
                    <li class="active"><span>{{ $page }}</span></li>
                @else
                    <li><a href="{{ $paginator->url($page) }}">{{ $page }}</a></li>
                @endif

                @php $previous = $page; @endphp
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}"><i class="fa-solid fa-arrow-right"></i></a></li>
            @endif

        </ul>
    </nav>
</div>
@endif
