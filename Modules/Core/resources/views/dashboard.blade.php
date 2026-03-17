@extends('core::layout.app')

@section('content')

@php
    $lang = getDefaultLocale() ?? 'en';
@endphp

<div class="pb-12">
    <div class="row g-4 mb-8">
        <div class="col-xl-6 col-lg-6">
            <div class="dashboard-welcome-card position-relative">
                <span class="dashboard-welcome-card-title text-white d-block mb-3 h3">{{ __('admin.welcome_msg') }} {{ auth()->user()->name }}</span>
                <p class="mb-0">
                    {{ __('admin.welcome_msg_description') }}
                </p>

                <div class="dashboard-welcome-card-icon">
                    <svg width="121" height="121" viewBox="0 0 121 121" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M78.0166 -0.172852C80.394 -0.052115 82.2841 1.91389 82.2842 4.32129C82.2842 6.72876 80.3941 8.69469 78.0166 8.81543L77.7842 8.82129H34.75V112.179H69.1416L69.373 112.185C71.7508 112.305 73.6415 114.271 73.6416 116.679C73.6415 119.086 71.7507 121.052 69.373 121.173L69.1416 121.179H12.9629C9.47735 121.179 6.1346 119.794 3.66992 117.329C1.20521 114.864 -0.179687 111.521 -0.179688 108.035V12.9639C-0.179573 9.47832 1.20526 6.13556 3.66992 3.6709C6.13461 1.20625 9.47732 -0.178637 12.9629 -0.178711H77.7842L78.0166 -0.172852ZM12.9629 8.82129C11.8643 8.82136 10.811 9.25833 10.0342 10.0352C9.25734 10.812 8.82043 11.8653 8.82031 12.9639V108.035C8.82031 109.134 9.25729 110.188 10.0342 110.965C10.811 111.742 11.8643 112.179 12.9629 112.179H25.75V8.82129H12.9629Z" fill="white" fill-opacity="0.1" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M103.714 -0.178711C105.418 -0.178711 106.977 0.784233 107.739 2.30859L120.703 28.2373L120.813 28.4746C121.054 29.0346 121.179 29.6388 121.179 30.25V103.714L121.173 104.147C121.062 108.622 119.236 112.891 116.063 116.063C112.891 119.236 108.622 121.062 104.147 121.173L103.714 121.179C99.0823 121.179 94.6403 119.338 91.3652 116.063C88.1924 112.891 86.3668 108.622 86.2559 104.147L86.25 103.714V30.25C86.25 29.5515 86.4122 28.8621 86.7246 28.2373L99.6895 2.30859L99.8418 2.0293C100.647 0.667754 102.116 -0.178563 103.714 -0.178711ZM95.25 103.714L95.2607 104.134C95.3645 106.226 96.2414 108.211 97.7295 109.699C99.3167 111.286 101.469 112.179 103.714 112.179L104.134 112.168C106.226 112.064 108.211 111.187 109.699 109.699C111.287 108.112 112.179 105.959 112.179 103.714V86.6074H95.25V103.714ZM95.25 31.3125V77.6074H112.179V31.3125L103.714 14.3838L95.25 31.3125Z" fill="white" fill-opacity="0.1" />
                        <path d="M69.373 30.0771C71.7505 30.1978 73.6415 32.1638 73.6416 34.5713C73.6416 36.9788 71.7506 38.9448 69.373 39.0654L69.1416 39.0713H51.8555C49.3702 39.0713 47.3555 37.0566 47.3555 34.5713C47.3556 32.0861 49.3702 30.0713 51.8555 30.0713H69.1416L69.373 30.0771Z" fill="white" fill-opacity="0.1" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-xl-6 col-sm-6 col-lg-6">
             <x-dashboard-card :title="__('admin.total_revenue')" :value="getSiteDefaultCurrency($totalRevenue)">
                <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="50" height="50" rx="25" fill="#278664" />
                <path d="M40 25C40 33.2843 33.2843 40 25 40C16.7157 40 10 33.2843 10 25C10 16.7157 16.7157 10 25 10C33.2843 10 40 16.7157 40 25Z" stroke="white" stroke-width="2" />
                <path d="M28.125 22.1917C28.125 22.744 28.5727 23.1917 29.125 23.1917C29.6773 23.1917 30.125 22.744 30.125 22.1917H29.125H28.125ZM21.5 27.809C21.5 27.2567 21.0523 26.809 20.5 26.809C19.9477 26.809 19.5 27.2567 19.5 27.809H20.5H21.5ZM26 17.5C26 16.9477 25.5523 16.5 25 16.5C24.4477 16.5 24 16.9477 24 17.5L25 17.5L26 17.5ZM24 32.5C24 33.0523 24.4477 33.5 25 33.5C25.5523 33.5 26 33.0523 26 32.5H25H24ZM25 24.7843V23.7843C23.5638 23.7843 22.7762 23.5561 22.3688 23.2834C22.0471 23.0681 21.875 22.7686 21.875 22.1917H20.875H19.875C19.875 23.2852 20.2654 24.2821 21.2562 24.9454C22.1613 25.5514 23.4362 25.7843 25 25.7843V24.7843ZM20.875 22.1917H21.875C21.875 21.7516 22.1162 21.2687 22.6745 20.8593C23.2322 20.4504 24.0512 20.167 25 20.167V19.167V18.167C23.6707 18.167 22.4271 18.5607 21.4919 19.2465C20.5572 19.9318 19.875 20.9613 19.875 22.1917H20.875ZM25 19.167V20.167C25.9488 20.167 26.7678 20.4504 27.3255 20.8593C27.8838 21.2687 28.125 21.7516 28.125 22.1917H29.125H30.125C30.125 20.9613 29.4428 19.9318 28.5081 19.2465C27.5729 18.5607 26.3293 18.167 25 18.167V19.167ZM29.5 27.809H28.5C28.5 28.51 28.2055 28.9528 27.6694 29.2728C27.0726 29.6291 26.1525 29.8337 25 29.8337V30.8337V31.8337C26.3328 31.8337 27.6627 31.6061 28.6945 30.9901C29.7871 30.3379 30.5 29.2684 30.5 27.809H29.5ZM25 30.8337V29.8337C23.9289 29.8337 23.0041 29.5401 22.3759 29.1178C21.7414 28.6913 21.5 28.2097 21.5 27.809H20.5H19.5C19.5 29.0788 20.266 30.1094 21.2602 30.7777C22.2606 31.4501 23.5858 31.8337 25 31.8337V30.8337ZM25 24.7843V25.7843C26.4442 25.7843 27.3289 26.0001 27.8311 26.3256C28.2424 26.5921 28.5 26.9974 28.5 27.809H29.5H30.5C30.5 26.46 30.0076 25.3529 28.9189 24.6473C27.9211 24.0005 26.5558 23.7843 25 23.7843V24.7843ZM25 19.167L26 19.167L26 17.5L25 17.5L24 17.5L24 19.167L25 19.167ZM25 30.8337H24V32.5H25H26V30.8337H25Z" fill="white" />
                </svg>
            </x-dashboard-card>
        </div>
        <div class="col-xxl-3 col-xl-6 col-sm-6 col-lg-6">
            <x-dashboard-card :title="__('admin.total_products')" :value="$productsCount">
                <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="50" height="50" rx="25" fill="#EB4965" />
                    <path d="M13.3 23.3999V29.8999C13.3 33.5769 13.3 35.4153 14.4423 36.5576C15.5846 37.6999 17.423 37.6999 21.1 37.6999H28.9C32.5769 37.6999 34.4154 37.6999 35.5577 36.5576C36.7 35.4153 36.7 33.5769 36.7 29.8999V23.3999" stroke="white" stroke-width="2" stroke-linecap="round" />
                    <path d="M28.9 31.8501C28.0107 32.6395 26.5948 33.1501 25 33.1501C23.4052 33.1501 21.9893 32.6395 21.1 31.8501" stroke="white" stroke-width="2" stroke-linecap="round" />
                    <path d="M13.1856 16.5556L12.2337 16.2492L12.2337 16.2492L13.1856 16.5556ZM12.2967 19.3171L13.2487 19.6235L13.2487 19.6235L12.2967 19.3171ZM36.8144 16.5556L35.8625 16.862L35.8625 16.862L36.8144 16.5556ZM37.7033 19.3171L38.6552 19.0107L38.6552 19.0107L37.7033 19.3171ZM21.9711 22.4375C21.583 22.0445 20.9499 22.0405 20.5569 22.4285C20.1639 22.8165 20.1598 23.4497 20.5478 23.8427L21.2594 23.1401L21.9711 22.4375ZM29.4523 22.4368C29.0644 22.0437 28.4312 22.0395 28.0381 22.4275C27.645 22.8154 27.6409 23.4486 28.0288 23.8417L28.7406 23.1392L29.4523 22.4368ZM12.4879 22.191L13.2986 21.6055L13.2986 21.6055L12.4879 22.191ZM23.5587 21.0509C23.6973 20.5163 23.3762 19.9706 22.8416 19.832C22.307 19.6934 21.7613 20.0145 21.6227 20.5491L22.5907 20.8L23.5587 21.0509ZM31.0389 21.0509C31.1775 20.5163 30.8565 19.9706 30.3218 19.832C29.7872 19.6934 29.2415 20.0145 29.1029 20.5491L30.0709 20.8L31.0389 21.0509ZM37.5121 22.191L36.7014 21.6055L36.7014 21.6055L37.5121 22.191ZM37.9655 21.0687L36.9775 20.9145L36.9775 20.9145L37.9655 21.0687ZM12.0345 21.0687L11.0464 21.2229L11.0464 21.2229L12.0345 21.0687ZM14.6716 13.4908L14.0734 12.6894L14.0734 12.6894L14.6716 13.4908ZM13.1856 16.5556L12.2337 16.2492L11.3448 19.0107L12.2967 19.3171L13.2487 19.6235L14.1375 16.862L13.1856 16.5556ZM36.8144 16.5556L35.8625 16.862L36.7514 19.6235L37.7033 19.3171L38.6552 19.0107L37.7663 16.2492L36.8144 16.5556ZM17.9491 13V14H32.0509V13V12H17.9491V13ZM24.9991 24.7V23.7C23.8114 23.7 22.7405 23.2169 21.9711 22.4375L21.2594 23.1401L20.5478 23.8427C21.6792 24.9886 23.2571 25.7 24.9991 25.7V24.7ZM32.4811 24.7V23.7C31.2931 23.7 30.2219 23.2166 29.4523 22.4368L28.7406 23.1392L28.0288 23.8417C29.1602 24.9882 30.7385 25.7 32.4811 25.7V24.7ZM17.5189 24.7V23.7C15.922 23.7 14.1867 22.8351 13.2986 21.6055L12.4879 22.191L11.6773 22.7766C12.9616 24.5548 15.3152 25.7 17.5189 25.7V24.7ZM22.5907 20.8L21.6227 20.5491C21.154 22.3574 19.4966 23.7 17.5189 23.7V24.7V25.7C20.4214 25.7 22.8647 23.7282 23.5587 21.0509L22.5907 20.8ZM30.0709 20.8L29.1029 20.5491C28.6342 22.3574 26.9769 23.7 24.9991 23.7V24.7V25.7C27.9016 25.7 30.345 23.7282 31.0389 21.0509L30.0709 20.8ZM37.5121 22.191L36.7014 21.6055C35.8133 22.8351 34.078 23.7 32.4811 23.7V24.7V25.7C34.6848 25.7 37.0384 24.5548 38.3227 22.7766L37.5121 22.191ZM37.7033 19.3171L36.7514 19.6235C36.9946 20.3794 37.0353 20.5445 36.9775 20.9145L37.9655 21.0687L38.9536 21.2229C39.0927 20.3313 38.8928 19.7492 38.6552 19.0107L37.7033 19.3171ZM37.5121 22.191L38.3227 22.7766C38.4326 22.6244 38.5841 22.4203 38.7044 22.1498C38.8262 21.8758 38.8978 21.5807 38.9536 21.2229L37.9655 21.0687L36.9775 20.9145C36.9349 21.1875 36.8981 21.2897 36.8769 21.3373C36.8542 21.3883 36.8282 21.43 36.7014 21.6055L37.5121 22.191ZM36.8144 16.5556L37.7663 16.2492C37.4971 15.4127 37.2714 14.7068 37.023 14.154C36.7651 13.5798 36.4429 13.0748 35.9266 12.6894L35.3284 13.4908L34.7302 14.2921C34.8714 14.3975 35.016 14.567 35.1986 14.9735C35.3909 15.4014 35.5794 15.9825 35.8625 16.862L36.8144 16.5556ZM32.0509 13V14C32.9481 14 33.534 14.0016 33.9807 14.0544C34.3996 14.104 34.592 14.1889 34.7302 14.2921L35.3284 13.4908L35.9266 12.6894C35.4074 12.3018 34.8343 12.1414 34.2155 12.0683C33.6245 11.9984 32.9004 12 32.0509 12V13ZM12.2967 19.3171L11.3448 19.0107C11.1072 19.7492 10.9073 20.3313 11.0464 21.2229L12.0345 21.0687L13.0225 20.9145C12.9647 20.5445 13.0054 20.3794 13.2487 19.6235L12.2967 19.3171ZM12.4879 22.191L13.2986 21.6055C13.1718 21.43 13.1458 21.3883 13.1231 21.3373C13.1019 21.2897 13.0651 21.1875 13.0225 20.9145L12.0345 21.0687L11.0464 21.2229C11.1022 21.5807 11.1738 21.8758 11.2956 22.1498C11.4159 22.4203 11.5674 22.6244 11.6773 22.7766L12.4879 22.191ZM13.1856 16.5556L14.1375 16.862C14.4206 15.9825 14.6091 15.4014 14.8014 14.9735C14.984 14.567 15.1286 14.3975 15.2698 14.2921L14.6716 13.4908L14.0734 12.6894C13.5571 13.0748 13.2349 13.5798 12.977 14.154C12.7286 14.7068 12.5029 15.4127 12.2337 16.2492L13.1856 16.5556ZM17.9491 13V12C17.0996 12 16.3755 11.9984 15.7845 12.0683C15.1657 12.1414 14.5926 12.3018 14.0734 12.6894L14.6716 13.4908L15.2698 14.2921C15.408 14.1889 15.6004 14.104 16.0193 14.0544C16.466 14.0016 17.0519 14 17.9491 14V13Z" fill="white" />
                </svg>
            </x-dashboard-card>
        </div>
        <div class="col-xxl-3 col-xl-6 col-sm-6 col-lg-6">
            <x-dashboard-card :title="__('admin.total_orders')" :value="$totalOrder">
                <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="50" height="50" rx="25" fill="#1289A7" />
                <path d="M15 33.8072V20.5678C15 17.0003 15 15.2166 16.0983 14.1083C17.1967 13 18.9645 13 22.5 13H27.5C31.0355 13 32.8033 13 33.9017 14.1083C35 15.2166 35 17.0003 35 20.5678V33.8072C35 35.6968 35 36.6416 34.4226 37.0135C33.4789 37.6213 32.0201 36.3468 31.2864 35.8841C30.6802 35.5018 30.3771 35.3106 30.0407 35.2996C29.6772 35.2876 29.3687 35.471 28.7136 35.8841L26.325 37.3905C25.6807 37.7968 25.3585 38 25 38C24.6415 38 24.3193 37.7968 23.675 37.3905L21.2864 35.8841C20.6802 35.5018 20.3771 35.3106 20.0407 35.2996C19.6771 35.2876 19.3687 35.471 18.7136 35.8841C17.9799 36.3468 16.5211 37.6213 15.5774 37.0135C15 36.6416 15 35.6968 15 33.8072Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M23.75 24.25H20" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M27.5 19.25H20" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </x-dashboard-card>
        </div>
        <div class="col-xxl-3 col-xl-6 col-sm-6 col-lg-6">
            <x-dashboard-card :title="__('admin.pending_orders')" :value="$pendingOrder">
                <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="50" height="50" rx="25" fill="#F79301" />
                <path d="M31.3636 18.4545C31.3636 20.1423 30.6932 21.7609 29.4998 22.9543C28.3064 24.1477 26.6877 24.8182 25 24.8182C23.3123 24.8182 21.6936 24.1477 20.5002 22.9543C19.3068 21.7609 18.6364 20.1423 18.6364 18.4545V13H31.3636V18.4545Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M31.3636 31.1818C31.3636 29.494 30.6932 27.8754 29.4998 26.682C28.3064 25.4886 26.6877 24.8181 25 24.8181C23.3123 24.8181 21.6936 25.4886 20.5002 26.682C19.3068 27.8754 18.6364 29.494 18.6364 31.1818V36.6363H31.3636V31.1818Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M15 13H35" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M15 36.6365H35" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </x-dashboard-card>
        </div>
        <div class="col-xxl-3 col-xl-6 col-sm-6 col-lg-6">
            <x-dashboard-card :title="__('admin.draft_orders')" :value="$draftOrders">
                <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="50" height="50" rx="25" fill="#DE458D" />
                <path d="M14.8462 21.3843H35.1539V34.3077C35.1539 34.7973 34.9594 35.2669 34.6132 35.6132C34.2669 35.9594 33.7974 36.1539 33.3077 36.1539H16.6923C16.2027 36.1539 15.7331 35.9594 15.3869 35.6132C15.0407 35.2669 14.8462 34.7973 14.8462 34.3077V21.3843V21.3843Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M37 19.5386V15.8462C37 14.8266 36.1734 14 35.1538 14L14.8462 14C13.8266 14 13 14.8266 13 15.8462V19.5386C13 20.5582 13.8266 21.3848 14.8462 21.3848H35.1538C36.1734 21.3848 37 20.5582 37 19.5386Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M22.2308 26.9236H27.7692" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </x-dashboard-card>
        </div>
        <div class="col-xxl-3 col-xl-6 col-sm-6 col-lg-6">
            <x-dashboard-card :title="__('admin.refund_requests')" :value="$refundRequests">
                <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="50" height="50" rx="25" fill="#706FD3" />
                <path d="M20.4284 10L15.0713 15.3573L20.4284 20.7146" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M14 26.6067C14 28.8318 14.6598 31.007 15.896 32.8571C17.1321 34.7072 18.8891 36.1491 20.9448 37.0006C23.0005 37.8521 25.2625 38.0749 27.4448 37.6408C29.627 37.2068 31.6316 36.1353 33.2049 34.5619C34.7783 32.9885 35.8497 30.9839 36.2838 28.8016C36.7179 26.6192 36.4951 24.3572 35.6436 22.3014C34.7922 20.2457 33.3502 18.4887 31.5002 17.2525C29.6501 16.0163 27.475 15.3564 25.25 15.3564H15.0714" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M25.6999 21.6996V18.9995" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M22.9999 28.9004C22.9999 30.2504 24.2059 30.7004 25.6999 30.7004C27.1939 30.7004 28.3999 30.7004 28.3999 28.9004C28.3999 26.2003 22.9999 26.2003 22.9999 23.5002C22.9999 21.7002 24.2059 21.7002 25.6999 21.7002C27.1939 21.7002 28.3999 22.3842 28.3999 23.5002" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M25.6999 30.6997V33.3998" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </x-dashboard-card>
        </div>


    </div>

    @if ($settings?->enable_shop)
    <div class="row">
        <div class="col-12">
            <x-card>
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="card-title text-primary">{{ __('admin.earnings_in') }}  {{ \Carbon\Carbon::create()->month($month)->format('F') }} , {{ $year }}</h5>
                    </div>
                    <div class="col-md-6">
                        <form method="GET" action="{{ route('admin.dashboard') }}" class="">
                            <div class="row g-2 justify-content-end">
                                <div class="col-md-3">
                                    <select name="year" class="form-select earnings-year">
                                        @if ($availableYears->isEmpty())
                                            <option value="{{ now()->year }}" selected>{{ now()->year }}</option>
                                        @else
                                            @foreach($availableYears as $y)
                                                <option value="{{ $y }}" {{ $year == $y ? 'selected' : '' }}>{{ $y }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select name="month" class="form-select earnings-month">
                                        @for($m=1; $m<=12; $m++)
                                            <option value="{{ $m }}" {{ $month == $m ? 'selected' : '' }}>
                                                {{ \Carbon\Carbon::create()->month($m)->format('F') }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div id="orderAnalytics"></div>
            </x-card>
        </div>
    </div>
    @endif


    <div class="mt-5">
        <div class="row row-cols-xxl-{{ $settings?->enable_shop ? 3 : 2 }} row-cols-md-2 row-cols-1  gy-6 mb-6">

            @if ($settings?->enable_shop)
                @can('product-show')
                <div class="col">
                    <div class="card shadow-custom rounded-custom">
                        <div class="card-body p-6">
                            <div class="d-flex align-items-center justify-content-between gap-4 mb-8 border-bottom pb-4">
                                <h5 class="fw-semibold mb-0">
                                    {{ __('admin.recent_products') }}
                                </h5>
                                <a href="{{ route('admin.product.index')}}" class="common-link-btn text-custom-secondary d-inline-flex align-items-center gap-1">
                                    {{ __('admin.view_all') }}
                                    <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16 5.9999H1M11.9998 1L16.2927 5.29289C16.626 5.62623 16.7927 5.79289 16.7927 6C16.7927 6.20711 16.626 6.37377 16.2927 6.70711L11.9998 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </a>
                            </div>

                            @if ($latestProducts->isNotEmpty())
                            <div class="d-flex flex-column gap-4">
                                @foreach ($latestProducts as $product)

                                <div class="profile-team-item d-flex align-items-center">
                                    <div class="avatar avatar-md avatar-border rounded-circle me-3">
                                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                                    </div>
                                    <div class="profile-team-info flex-grow-1">
                                        <h6 class="mb-0">
                                            {{ $product->getTranslation($lang)->title }}
                                        </h6>
                                    </div>

                                    @can('product-edit')
                                        <a href="{{ route('admin.product.edit', ['product' => $product->id]) }}"  class="btn btn-xs btn-icon btn-label-primary">
                                            <x-icons.edit />
                                        </a>
                                    @endcan
                                </div>
                                @endforeach
                            </div>
                            @else
                                <x-data-not-found />
                            @endif
                        </div>
                    </div>
                </div>
                @endcan
            @endif

            @can('blog-show')
            <div class="col">
                <div class="card shadow-custom rounded-custom">
                    <div class="card-body p-6">
                        <div class="d-flex align-items-center justify-content-between gap-4 mb-8 border-bottom pb-4">
                            <h5 class="fw-semibold mb-0">
                                {{ __('admin.recent_posts') }}
                            </h5>
                            <a href="{{ route('admin.blog.index')}}" class="common-link-btn text-custom-secondary d-inline-flex align-items-center gap-1">
                                {{ __('admin.view_all') }}
                                <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16 5.9999H1M11.9998 1L16.2927 5.29289C16.626 5.62623 16.7927 5.79289 16.7927 6C16.7927 6.20711 16.626 6.37377 16.2927 6.70711L11.9998 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>
                        </div>

                        @if ($latestPosts->isNotEmpty())
                        <div class="d-flex flex-column gap-4">
                            @foreach ($latestPosts as $post)
                            <div class="profile-team-item d-flex align-items-center">
                                <div class="avatar avatar-md avatar-border rounded-circle me-3">
                                    <img src="{{ asset($post->image) }}" alt="{{ $post->name }}" class="object-fit-cover w-100 h-100">
                                </div>
                                <div class="profile-team-info flex-grow-1">
                                    <h6 class="mb-0">
                                        {{ Str::limit($post->getTranslation($lang)->title, 40) }}
                                    </h6>
                                </div>

                                @can('blog-edit')
                                    <a href="{{ route('admin.blog.edit', ['blog' => $post->id]) }}"  class="btn btn-xs btn-icon btn-label-primary">
                                        <x-icons.edit />
                                    </a>
                                @endcan
                            </div>
                            @endforeach
                        </div>
                        @else
                            <x-data-not-found />
                        @endif
                    </div>
                </div>
            </div>
            @endcan


            @can('user-show')
                <div class="col">
                    <div class="card shadow-custom rounded-custom">
                        <div class="card-body p-6">
                            <div class="d-flex align-items-center justify-content-between gap-4 mb-8 border-bottom pb-4">
                                <h5 class="fw-semibold mb-0">
                                    {{ __('admin.latest_users') }}
                                </h5>
                                <a href="{{ route('admin.user.index')}}" class="common-link-btn text-custom-secondary d-inline-flex align-items-center gap-1">
                                    {{ __('admin.view_all') }}
                                    <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16 5.9999H1M11.9998 1L16.2927 5.29289C16.626 5.62623 16.7927 5.79289 16.7927 6C16.7927 6.20711 16.626 6.37377 16.2927 6.70711L11.9998 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </a>
                            </div>

                            @if ($latestUsers->isNotEmpty())
                            <div class="d-flex flex-column gap-4">
                                @foreach ($latestUsers as $user)

                                @php
                                    $userAvatar = $user->avatar ? asset($user->avatar) : asset('admin/img/default-avatar.jpg');
                                @endphp

                                <div class="profile-team-item d-flex align-items-center">
                                    <div class="avatar avatar-md avatar-border rounded-circle me-3">
                                        <img src="{{ $userAvatar }}" alt="{{ $user->name }}">
                                    </div>
                                    <div class="profile-team-info flex-grow-1">
                                        <h6 class="mb-0">
                                            {{ $user->name }}
                                        </h6>
                                        <span class="text-custom-body fs-3">
                                            {{ $user->designation }}
                                        </span>
                                    </div>

                                    <a href="{{ route('admin.user.edit', ['user' => $user->id]) }}"  class="btn btn-xs btn-icon btn-outline-primary rounded-pill">
                                        <svg width="15" height="11" viewBox="0 0 15 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.7036 4.92924C13.9012 5.20635 14 5.3449 14 5.55C14 5.7551 13.9012 5.89365 13.7036 6.17076C12.8156 7.41586 10.548 10.1 7.5 10.1C4.45201 10.1 2.18436 7.41586 1.29643 6.17076C1.09881 5.89365 1 5.7551 1 5.55C1 5.3449 1.09881 5.20635 1.29643 4.92924C2.18436 3.68414 4.45201 1 7.5 1C10.548 1 12.8156 3.68414 13.7036 4.92924Z" stroke="currentColor" stroke-width="1.5" />
                                            <path d="M9.4498 5.55C9.4498 4.47305 8.57676 3.6 7.4998 3.6C6.42285 3.6 5.5498 4.47305 5.5498 5.55C5.5498 6.62696 6.42285 7.5 7.4998 7.5C8.57676 7.5 9.4498 6.62696 9.4498 5.55Z" stroke="currentColor" stroke-width="1.5" />
                                        </svg>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                            @else
                                <x-data-not-found />
                            @endif
                        </div>
                    </div>
                </div>
            @endcan
        </div>

        @if ($settings?->enable_shop)
            @can('order-show')
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-custom rounded-custom">
                        <div class="card-body p-6">
                            <div class="d-flex align-items-center justify-content-between gap-4 mb-8 border-bottom pb-4">
                                <h5 class="fw-semibold mb-0">
                                    {{ __('admin.latest_orders') }}
                                </h5>
                                <a href="{{ route('admin.orders.index')}}" class="common-link-btn text-custom-secondary d-inline-flex align-items-center gap-1">
                                    {{ __('admin.view_all') }}
                                    <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16 5.9999H1M11.9998 1L16.2927 5.29289C16.626 5.62623 16.7927 5.79289 16.7927 6C16.7927 6.20711 16.626 6.37377 16.2927 6.70711L11.9998 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </a>
                            </div>

                            @if ($latestOrders->isNotEmpty())
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" class="fw-medium d-flex align-items-center">{{ __('admin.order_id') }}</th>
                                            <th scope="col" class="fw-medium">{{ __('admin.customer') }}</th>
                                            <th scope="col" class="fw-medium">{{ __('admin.date') }}</th>
                                            <th scope="col" class="fw-medium">{{ __('admin.amount') }}</th>
                                            <th scope="col" class="fw-medium">{{ __('admin.payment') }}</th>
                                            <th scope="col" class="fw-medium">{{ __('admin.status') }}</th>
                                            <th scope="col" class="fw-medium">{{ __('admin.action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($latestOrders as $order)
                                        <tr>
                                            <td width="15%">
                                                <div class="d-flex align-items-center">
                                                    <span class="text-primary fw-medium">
                                                        <a href="{{ route('admin.orders.edit', ['order' => $order->id]) }}">
                                                            #{{ $order->order_no }}
                                                        </a>
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    @if (!empty($order->user->avatar))
                                                    <img class="rounded-md" src="{{ asset($order->user->avatar) }}" width="40" height="40" alt="{{ $order->user->name }}">
                                                    @endif
                                                    <div class="ms-3">
                                                        <h6 class="mb-0 text-custom-body">
                                                            <a href="{{ route('admin.user.edit', ['user' => $order->user->id]) }}">{{ $order->user->name }}</a>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="text-custom-body">{{ pureDate($order->created_at) }}</span></td>
                                            <td><span class="text-custom-body">{{ themeCurrency($order->amount) }}</span></td>
                                            <td>
                                                @switch($order->payment_status)
                                                    @case('pending')
                                                        <div class="d-flex align-items-center text-warning">
                                                            <span class="badge badge-dot bg-warning me-1"></span> {{ __('admin.pending') }}
                                                        </div>
                                                        @break
                                                    @case('success')
                                                        <div class="d-flex align-items-center text-success">
                                                            <span class="badge badge-dot bg-success me-1"></span> {{ __('admin.success') }}
                                                        </div>
                                                        @break
                                                    @case('rejected')
                                                        <div class="d-flex align-items-center text-danger">
                                                            <span class="badge badge-dot bg-danger me-1"></span> {{ __('admin.rejected') }}
                                                        </div>
                                                        @break
                                                    @case('refund')
                                                        <div class="d-flex align-items-center text-info">
                                                            <span class="badge badge-dot bg-info me-1"></span> {{ __('admin.refund') }}
                                                        </div>
                                                        @break
                                                    @default
                                                        <div class="d-flex align-items-center text-primary">
                                                            <span class="badge badge-dot bg-primary me-1"></span> {{ __('admin.pending') }}
                                                        </div>
                                                @endswitch

                                            </td>
                                            <td>
                                                @switch($order->order_status)
                                                    @case('draft')
                                                        <span class="badge badge-label-secondary">{{ __('admin.draft') }}</span>
                                                        @break
                                                    @case('pending')
                                                        <span class="badge badge-label-warning me-1">{{ __('admin.pending') }}</span>
                                                        @break
                                                    @case('processing')
                                                        <span class="badge badge-label-info me-1">{{ __('admin.processing') }}</span>
                                                        @break
                                                    @case('success')
                                                        <span class="badge badge-label-success me-1">{{ __('admin.success') }}</span>
                                                        @break
                                                    @case('refund')
                                                        <span class="badge badge-label-danger me-1">{{ __('admin.refund') }}</span>
                                                        @break
                                                    @case('rejected')
                                                        <span class="badge badge-label-danger me-1">{{ __('admin.rejected') }}</span>
                                                        @break
                                                    @default
                                                    <span class="badge badge-label-secondary">{{ __('admin.draft') }}</span>

                                                @endswitch

                                            </td>
                                            <td>

                                                @can('order-edit')
                                                <x-table.edit :route="route('admin.orders.edit', ['order' => $order->id])" />
                                                @endcan

                                                @can('order-delete')
                                                <x-table.delete :route="route('admin.orders.destroy', ['order' => $order->id])" />
                                                @endcan

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                            @else
                                <x-data-not-found />
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endcan
        @endif

    </div>
</div>

@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/apexcharts/apexcharts.css') }}">
@endpush

@push('js')
<script src="{{ asset('admin/assets/vendor/libs/apexcharts/apexcharts.js') }}"></script>
<script>
    'use strict';

    if($('#orderAnalytics').length){
        const currencySymbol = "{{ getSiteDefaultCurrencyDetails()['symbol'] }}";

        // Visitor Analytics Chart
        var options = {
            series: [{
                name: "{{ __('admin.orders') }}",
                data: @json($orderCounts)
            }, {
                name: "{{ __('admin.revenue') }}",
                data: @json($orderAmounts)
            }],
            chart: {
                height: 320,
                type: 'area'
            },
            colors: ["#735dff", "#ff5a29"],
            dataLabels: { enabled: false },
            stroke: { curve: 'smooth', width: 2 },
            grid: { borderColor: '#f2f5f7' },
            xaxis: {
                type: 'datetime',
                categories: @json($dates),
                labels: {
                    show: true,
                    datetimeUTC: false,
                    style: {
                        colors: "#8c9097",
                        fontSize: '11px',
                        fontWeight: 600,
                    },
                }
            },
            legend: {
                show: true,
                position: "bottom",
                offsetY: 8,
                markers: { size: 4, radius: 12 }
            },
            yaxis: {
                labels: {
                    show: true,
                    style: {
                        colors: "#8c9097",
                        fontSize: '11px',
                        fontWeight: 600,
                    },
                }
            },
           tooltip: {
                x: { format: 'dd MMM' },
                y: {
                    formatter: function (val, opts) {
                        if (opts.seriesIndex === 1) {
                            return currencySymbol + val.toLocaleString();
                        }
                        return val;
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#orderAnalytics"), options);
        chart.render();

        $('.earnings-month, .earnings-year').on('change', function(){
            $(this).closest('form').submit();
        })
    }

</script>
@endpush
