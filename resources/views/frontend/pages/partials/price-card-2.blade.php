

 <div class="crp-price-item {{ $pricing->is_popular ? 'active' : '' }}">
    <div class="crp-price-head">
        <span>{{ $pricing->title }}</span>
        <div class="d-flex align-items-end flex-wrap mb-15">
            <h4>{{ themeCurrency($pricing->price) }} </h4><i>/ {{ $pricing->expiration }}</i>
        </div>
        <p>{{ $pricing->short_description }}</p>
    </div>
    <div class="crp-price-list">
        {!! clean(pureText($pricing->description)) !!}
    </div>
    <div class="app-price-btn-box">
        <div class="animated-border-box w-100">
            <a class=" {{ $pricing->is_popular ? 'tp-btn-gradient sm ' : ' tp-btn-black-border' }} w-100 text-center" href="{{ url($pricing->btn_url ?? '#') }}">
                {{ $pricing->btn_text }}
            </a>
        </div>
    </div>
</div>
