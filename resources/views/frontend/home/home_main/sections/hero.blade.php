<!-- hero area start -->
<div class="dgm-hero-top pt-20">
   <div class="dgm-hero-ptb grey-bg-2 fix z-index-1 p-relative">
      <div class="dgm-hero-bg" data-background="{{ asset($default_content?->bg_image) }}"></div>
      <div class="dgm-hero-rotate-text">
            <span>{{ __('frontend.award_winning_agency') }}</span>
      </div>
      <div class="dgm-hero-social-box">
            <div class="dgm-hero-social-text">
               <span>{{ __('frontend.follow') }}</span>
            </div>
            <div class="dgm-hero-social">
               @foreach ($social_links as $social)
                  <a href="{{ url($social->link ?? '#') }}">
                     <span>
                        <i class="{{ $social?->icon }}"></i>
                     </span>
                  </a>
               @endforeach
            </div>
      </div>
      <div class="container container-1430">
            <div class="row">
               <div class="col-lg-6">
                  <div class="dgm-hero-content mb-120">
                        <span class="dgm-hero-subtitle tp_fade_anim" data-delay=".3">
                           {!! clean(pureText($content?->subtitle)) !!}
                        </span>
                        <h4 class="dgm-hero-title tp_fade_anim {{ getSiteLocale() }}" data-delay=".5">
                           {!! clean(pureText($content?->title)) !!}
                        </h4>
                        @if (!empty($content?->btn_text))
                        <div class="tp_fade_anim" data-delay=".7">
                           <a class="tp-btn-black-square" href="{{ url($default_content?->btn_url ?? '#') }}">
                              <span>
                                    <span class="text-1">{!! clean(pureText($content?->btn_text)) !!}</span>
                                    <span class="text-2">{!! clean(pureText($content?->btn_text)) !!}</span>
                              </span>
                              <i>
                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M1 11L11 1" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                       <path d="M1 1H11V11" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M1 11L11 1" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                       <path d="M1 1H11V11" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                              </i>
                           </a>
                        </div>
                        @endif
                  </div>
                  <div class="dgm-hero-funfact-wrap">
                        <div class="row">
                           <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6">
                              <div class="dgm-hero-funfact tp_fade_anim mb-40" data-delay=".7" data-fade-from="top" data-ease="bounce">
                                    <span><i data-purecounter-duration="1" data-purecounter-end="{{ $default_content?->counter_number_1 }}" class="purecounter">0</i>{{ $default_content?->counter_unit_1 }}</span>
                                    <p>{!! clean(pureText($content?->counter_title_1)) !!}</p>
                              </div>
                           </div>
                           <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6">
                              <div class="dgm-hero-funfact tp_fade_anim mb-40" data-delay=".9" data-fade-from="top" data-ease="bounce">
                                    <span><i data-purecounter-duration="1" data-purecounter-end="{{ $default_content?->counter_number_2 }}" class="purecounter">0</i>{{ $default_content?->counter_unit_2 }}</span>
                                    <p>{!! clean(pureText($content?->counter_title_2)) !!}</p>
                              </div>
                           </div>
                        </div>
                  </div>
               </div>
            </div>
      </div>

      <div class="dgm-hero-thumb anim-zoomin-wrap">
            <div class="anim-zoomin">
               <img src="{{ asset($default_content?->main_image) }}" alt="{!! clean(pureText($content?->title)) !!}">
            </div>
            @if (!empty($content?->say_hi_title))
            <div class="dgm-hero-text-box" data-background="{{ asset('admin/img/default/home-mian/hero-text-shape.png') }}">
               <img src="{{ asset($default_content?->say_hi_image) }}" alt="{{ $content?->say_hi_title }}">
               <p>{!! clean(pureText($content?->say_hi_title)) !!}</p>
               <a class="dgm-hero-arrow" href="{{ url($default_content?->btn_url ?? '#') }}">
                  <span>
                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M5.23804 17.2178L18.2428 8.11173" stroke="#141414" stroke-width="2" stroke-miterlimit="10" />
                           <path d="M8.62744 5.00098C11.1637 8.6231 16.1444 9.50353 19.7634 6.96947" stroke="#141414" stroke-width="2" stroke-miterlimit="10" />
                           <path d="M19.7642 6.96914C16.1452 9.5032 15.2691 14.4847 17.8053 18.1068" stroke="#141414" stroke-width="2" stroke-miterlimit="10" />
                        </svg>
                  </span>
               </a>
            </div>
            @endif
      </div>

   </div>
</div>
<!-- hero area end -->
