@props([
    'heading' => null,
    'route' => null,
    'btnText' => null,
    'btnType' => 'create',
    'class' => '',
    'headerClass' => '',
    'footerClass' => '',
])

<div class="card mb-5 shadow rounded-md {{ $class }}">
    @if ($heading || $route)
        <div class="card-header bg-white py-4 {{ $headerClass }}">
            <div class="d-flex align-items-center w-100">
                @if ($heading)
                    <h6 class="demo-card-title m-0 d-flex align-items-center gap-1 text-capitalize">
                        {{ $heading }}
                    </h6>
                @endif

                @if (isset($header_2))
                    {{ $header_2 }}
                @endif

                @if ($route)
                    <div class="ms-auto d-flex gap-2">

                        @if ($btnType == 'edit2')

                            <a href="{{ $route }}" class="btn btn-sm btn-icon btn-label-primary gap-2 d-inline-flex align-items-center">

                                <x-icons.edit />
                            </a>
                        @else
                        <a href="{{ $route }}" class="btn btn-primary gap-2 d-inline-flex align-items-center">

                            @switch($btnType)
                                @case('create')
                                    <x-icons.plus />
                                        {{ $btnText ?? __('admin.add_new') }}
                                    @break
                                @case('edit')
                                    <x-icons.edit />
                                    {{ $btnText ?? __('admin.edit') }}
                                    @break
                                @case('delete')
                                    <x-icons.delete />
                                    {{ $btnText ?? __('admin.delete') }}
                                    @break
                                @case('back')
                                    <x-icons.back />
                                    {{ $btnText ?? __('admin.back') }}
                                @default

                            @endswitch
                        </a>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    @endif

    <div class="card-body py-6">
        {{ $slot }}
    </div>

    @if (isset($footer))
        <div class="card-footer bg-white py-4 {{ $footerClass }}">
            {{ $footer }}
        </div>
    @endif
</div>
