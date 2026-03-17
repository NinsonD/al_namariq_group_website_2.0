 <div class="container container-1750 pb-115">
        <div class="row">
            <div class="col-xl-12">
                <a href="{{ route('blog.details', ['slug' => $blog->slug]) }}">
                    <div class="postbox-details-nevigation-wrap p-relative" >
                        <div class="postbox-details-nevigation-thumb-bg" >
                            <div class="postbox-details-nevigation-thumb" data-background="{{ asset($blog->image) }}">

                            </div>
                        </div>
                        <div class="postbox-details-nevigation-content">
                            <span>{{ __('frontend.next_post') }}</span>
                            <h4 class="postbox-details-nevigation-title">
                                {{ $blog->title }}
                            </h4>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
