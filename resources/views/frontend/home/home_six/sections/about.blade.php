<!-- about moving area start -->
<div class="des-about-area pb-200">
    <div class="container container-1230">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="des-about-text text-center">
                    <p class="tp_text_invert_3 mb-45">
                        {!! clean(pureText($content?->description)) !!}
                    </p>
                    <a class="tp-btn-border" href="{{ url($default_content?->btn_url ?? '#') }}">
                        {{ $content?->btn_text }}
                        <span>
                            <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 9.99999H15.2222M8.11121 1.11108L17.0001 9.99997L8.11121 18.8889" stroke="currentcolor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- about moving area end -->
