<!-- header area start -->
<div id="header-sticky" class="tp-header-area tp-header-ptb tp-header-blur sticky-white-bg header-transparent tp-header-3-style">
   <div class="container container-1750">
         <div class="row align-items-center">
            <div class="col-xl-1 col-lg-5 col-5">
               <div class="tp-header-logo">
                     <a href="{{ route('home') }}">
                        <img width="120" src="{{ asset($settings->logo) }}" alt="{{ $settings->app_name }}">
                     </a>
               </div>
            </div>
            <div class="col-xl-11 col-lg-7 col-7">
               <div class="tp-header-box d-flex align-items-center justify-content-end justify-content-xl-between">
                     <div class="tp-header-menu tp-header-dropdown dropdown-white-bg d-none d-xl-flex">
                        <nav class="tp-mobile-menu-active">
                           <ul>
                              @include('frontend.layouts.all-home-pages')
                              @include('frontend.layouts.menu-items', ['menu_data' => $main_menu])
                           </ul>
                        </nav>
                     </div>

                     <div class="ss-header-right d-flex align-items-center justify-content-end gap-3">

                        <div class="tp-header-btn d-none d-md-flex">
                           <a class="tp-btn-yellow-green green-solid" href="{{ route('contact') }}">
                              <i>
                                    <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M16 2.5C16 1.675 15.325 1 14.5 1H2.5C1.675 1 1 1.675 1 2.5M16 2.5V11.5C16 12.325 15.325 13 14.5 13H2.5C1.675 13 1 12.325 1 11.5V2.5M16 2.5L8.5 7.75L1 2.5" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                              </i>
                              <span>
                                    <span class="text-1">{{ __('frontend.send_a_message') }}</span>
                                    <span class="text-2">{{ __('frontend.send_a_message') }}</span>
                              </span>
                           </a>
                        </div>

                        <div class="tp-header-bar ml-15 ">
                           <button class="tp-offcanvas-open-btn">
                              <i></i>
                              <i></i>
                              <i></i>
                           </button>
                        </div>
                     </div>
               </div>
            </div>
         </div>
   </div>
</div>
<!-- header area end -->
