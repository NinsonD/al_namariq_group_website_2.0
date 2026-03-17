<div class="tp-portfolio-inner-item mb-65">
    <div class="tp-portfolio-inner-thumb">
        <a href="{{ route('portfolios.details', ['slug' => $portfolio->slug]) }}">
            <img src="{{ asset($portfolio->image) }}" alt="{{ $portfolio->title }}">
        </a>
    </div>
    <div class="tp-portfolio-inner-content">
        <h4 class="tp-portfolio-inner-title fs-30">
            <a class="tp-line-white" href="{{ route('portfolios.details', ['slug' => $portfolio->slug]) }}">
                {{ $portfolio->title }}
            </a>
        </h4>
        <span>{{ $portfolio->service }} - {{ $portfolio->year }}</span>
    </div>
</div>
