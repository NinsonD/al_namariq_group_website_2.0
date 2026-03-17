@props([
    'steps' => [],
    'title' => __('admin.installer'),
    'cardTitle' => '',
    'cardText' => '',
    'center' => false,
])

<div class="installer-layout" data-bg-image="{{ asset('admin/installer/background.jpg') }}">
        <div class="container-installer">
            <div class="installer-wrapper py-13 min-vh-100 d-flex flex-column align-items-center justify-content-center">
                <div class="installer-header mb-6">
                    <h3 class="font-outfit installer-heading">{{ $title }}</h3>
                </div>

                @if (count($steps) > 0)  
                <div class="installer-progress w-100 mb-10">
                    <div class="installer-progress-step d-flex">
                        @foreach ($steps as $key => $step)
                            <div class="step text-center {{ session()->has($key) ? 'active' : '' }}">
                                <span>
                                    @if (session()->has($key))
                                        <img src="{{ asset('admin/installer/check.svg') }}" alt="{{ $step['title'] }}">
                                    @else
                                        {{ array_search($key, array_keys($steps)) + 1 }}
                                    @endif
                                </span>
                                <div class="step-text">{{ $step['title'] }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif

                

                <div class="installer-card w-100 {{ $center ? 'text-center' : '' }}">
                    <h4 class="installer-card-header">{{ $cardTitle ?? '' }}</h4>
                    <p class="installer-card-text">{{ $cardText ?? '' }}</p>

                    <div class="installer-card-body">
                        {{ $card ?? '' }}

                        @isset($footer)
                            <div class="installer-card-footer text-center">
                                {{ $footer }}
                            </div>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>