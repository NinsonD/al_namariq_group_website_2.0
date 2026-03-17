<div class="page-header pb-7">
    @if(isset($title))
        <h2 class="fw-semibold fs-7">{{ $title }}</h2>
    @endif

    @if(isset($breadcrumbs) && is_array($breadcrumbs))
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                @foreach($breadcrumbs as $breadcrumb)
                    @if(!$loop->last)
                        <li class="breadcrumb-item d-flex align-items-center">
                            <a href="{{ $breadcrumb['url'] ?? '#' }}">{{ $breadcrumb['label'] }}</a>
                        </li>
                    @else
                        <li class="breadcrumb-item active d-flex align-items-center" aria-current="page">{{ $breadcrumb['label'] }}</li>
                    @endif
                @endforeach
            </ol>
        </nav>
    @endif
</div>
