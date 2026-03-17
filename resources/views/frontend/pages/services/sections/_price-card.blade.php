 <div class="crp-price-item active">
    <div class="crp-price-head">
        <span>{{ $price->title }}</span>
        <div class="d-flex align-items-end flex-wrap mb-15">
            <h4>{{ themeCurrency($pricing->price) }} </h4><i>/ {{ $pricing->expiration }}</i>
        </div>
        <p>
            {{ $price->short_description }}
        </p>
    </div>
    <div class="crp-price-list">
       {!! clean(pureText($price->description)) !!}
    </div>
    <div class="app-price-btn-box">
        <div class="animated-border-box radius-style-2 w-100">
            <a class="tp-btn-gradient sm w-100 text-center" href="{{ url($price->btn_url ?? '#') }}">
                {{ $price->btn_text }}
            </a>
        </div>
    </div>
</div>
