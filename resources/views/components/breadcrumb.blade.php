@props([
    'id' => null,
    'title' => cache('settings.app_name') ?? config('app.name'),
])
<div class="tp-breadcrumb-area tp-breadcrumb-ptb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-12">
                <div class="tp-breadcrumb-content text-center">
                    <h3 class="tp-breadcrumb-title">{{ $title }}</h3>
                    <div class="tp-breadcrumb-list mb-35">
                        <span>
                            <a href="{{ url('/') }}">
                                {{ __('frontend.home') }}
                            </a>
                        </span>
                        <span class="dvdr"><i>|</i></span>
                        <span>{{ $title }}</span>
                    </div>
                    @if (isset($id) && !empty($id))
                    <div class="tp-breadcrumb-scrolldown smooth">
                        <a href="#{{ $id }}">
                            <span>
                                <svg width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 1L8 8L15 1" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
