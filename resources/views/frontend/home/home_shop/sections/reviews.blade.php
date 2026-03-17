@php
   $reviews = \Modules\Shop\Models\ProductReview::with('user')->approved()->latest()->get();
@endphp

<!-- testimonial area start -->
<div class="tp-product-testimonial-ptb pb-100">
    <div class="container container-1750">
        <div class="row">
            <div class="col-lg-12">
                <div class="tp-product-testimonial-heading mb-20">
                    <h3 class="tp-product-testimonial-title">{{ $content?->title }}</h3>
                </div>
            </div>
        </div>

        @if ($reviews->isNotEmpty())
        <div class="row">
            <div class="col-lg-12">
                <div class="app-testimonial-wrapper">
                    <div class="app-testimonial-slider d-flex">
                        @foreach ($reviews as $review)
                        <div class="app-testimonial-item tp-product-testimonial-item">
                            <div class="app-testimonial-item-star">
                                 @foreach (range(1, 5) as $i)
                                    @if ($i > $review->rating)
                                       <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                                <path d="M7.21451 0.878193C7.30431 0.6018 7.69534 0.6018 7.78514 0.878193L9.34084 5.66614C9.381 5.78975 9.49619 5.87343 9.62616 5.87343L14.6605 5.87343C14.9511 5.87343 15.0719 6.24532 14.8368 6.41614L10.764 9.37525C10.6588 9.45164 10.6148 9.58706 10.655 9.71066L12.2107 14.4986C12.3005 14.775 11.9841 15.0048 11.749 14.834L7.67616 11.8749C7.57101 11.7985 7.42864 11.7985 7.32349 11.8749L3.25062 14.834C3.01551 15.0048 2.69916 14.775 2.78897 14.4986L4.34467 9.71066C4.38483 9.58706 4.34083 9.45164 4.23568 9.37525L0.162814 6.41614C-0.0723004 6.24532 0.0485323 5.87343 0.339149 5.87343L5.37349 5.87343C5.50346 5.87343 5.61865 5.78975 5.65881 5.66614L7.21451 0.878193Z" fill="#a4a4a4" />
                                            </svg>
                                        </span>
                                    @else
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                                <path d="M7.21451 0.878193C7.30431 0.6018 7.69534 0.6018 7.78514 0.878193L9.34084 5.66614C9.381 5.78975 9.49619 5.87343 9.62616 5.87343L14.6605 5.87343C14.9511 5.87343 15.0719 6.24532 14.8368 6.41614L10.764 9.37525C10.6588 9.45164 10.6148 9.58706 10.655 9.71066L12.2107 14.4986C12.3005 14.775 11.9841 15.0048 11.749 14.834L7.67616 11.8749C7.57101 11.7985 7.42864 11.7985 7.32349 11.8749L3.25062 14.834C3.01551 15.0048 2.69916 14.775 2.78897 14.4986L4.34467 9.71066C4.38483 9.58706 4.34083 9.45164 4.23568 9.37525L0.162814 6.41614C-0.0723004 6.24532 0.0485323 5.87343 0.339149 5.87343L5.37349 5.87343C5.50346 5.87343 5.61865 5.78975 5.65881 5.66614L7.21451 0.878193Z" fill="#CE8065" />
                                            </svg>
                                        </span>
                                    @endif
                                @endforeach

                            </div>
                            <div class="app-testimonial-item-content">
                                <p>
                                    {{ $review->comment }}
                                </p>
                            </div>
                            <div class="tp-product-testimonial-user">
                                @if ($review->user->avatar)
                                <div class="tp-product-testimonial-user-thumb">
                                    <img src="{{ asset($review->user->avatar) }}" alt="{{ $review->user->name }}">
                                </div>
                                @endif
                                <div class="tp-product-testimonial-user-title">
                                    <h4 class="tp-product-testimonial-user-name">{{ $review->user->name }}</h4>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
<!-- testimonial area end -->
