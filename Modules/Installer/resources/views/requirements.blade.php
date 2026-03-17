@extends('installer::layout')

@section('content')

@php
    $steps = \Modules\Installer\Traits\InstallerTrait::getSteps();
@endphp

@section('title', __('installer.check_requirements'))

<x-installer :steps="$steps" :cardTitle="__('installer.check_requirements')" :cardText="__('installer.check_requirements_description')">
    <x-slot:card>

    <div class="mb-10">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-2 gy-4 gx-8">
            @foreach ($checks as $key => $check)
            <div class="col">
                <div class="php-item d-flex align-items-start gap-3">
                    <div class="php-icon">
                        @if ($check['check'])
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 11C21 5.47715 16.5228 1 11 1C5.47715 1 1 5.47715 1 11C1 16.5228 5.47715 21 11 21C16.5228 21 21 16.5228 21 11Z" stroke="#019E06" stroke-width="2" />
                                <path d="M7 11.75C7 11.75 8.6 12.6625 9.4 14C9.4 14 11.8 8.75 15 7" stroke="#019E06" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        @else
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.9303 7.56982L7.57031 13.9298" stroke="#F41E1E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M7.57031 7.56982L13.9303 13.9298" stroke="#F41E1E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M10.75 20.5C16.1348 20.5 20.5 16.1348 20.5 10.75C20.5 5.36522 16.1348 1 10.75 1C5.36522 1 1 5.36522 1 10.75C1 16.1348 5.36522 20.5 10.75 20.5Z" stroke="#F41E1E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        @endif
                    </div>
                    <div class="php-text">
                        {{ __('installer.' . $key) }}
    
                        @if (isset($check['url']) && $check['check'] == false)
                            <a href="{{ $check['url'] }}" target="_blank">(Help)</a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
        
    </x-slot:card>

    <x-slot:footer>
        
        @if (!$success)
        <p class="installer-card-footer-text">Please enable the extensions & give permissions  then click reload button</p>
        <a href="{{  route('installer.requirements')  }}" class="ins-btn">
            <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.9231 10.8462L16.3846 10.2308M16.3846 10.2308L17 12.6923M16.3846 10.2308C15.838 11.7798 14.845 13.1324 13.5308 14.118C12.2167 15.1036 10.6402 15.6782 8.99999 15.7692C7.48382 15.7695 6.00431 15.3031 4.76243 14.4333C3.52054 13.5635 2.57647 12.3326 2.05845 10.9077M4.07692 5.92324L1.61538 6.53863M1.61538 6.53863L1 4.07709M1.61538 6.53863C2.64923 3.70786 5.82463 1 9.00002 1C10.5236 1.00428 12.0085 1.4797 13.2513 2.36108C14.494 3.24246 15.4337 4.48665 15.9416 5.92308" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            Reload
        </a>
        @else
            <a href="{{ route('installer.database') }}" class="ins-btn">Next</a>
        @endif
    </x-slot:footer>
</x-installer>
@endsection