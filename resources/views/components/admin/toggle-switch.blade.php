@props([
    'column' => 'status',
    'route' => null,
    'class' => 'toggle-status',
    'status' => false,
    'onStyle' => 'success',
    'offStyle' => 'danger',
    'onLabel' => __('admin.active'),
    'offLabel' => __('admin.inactive'),
    'dataSize' => 'sm',
    'id' => null,
])

<a class="{{ $class }}" data-column="{{ $column }}" href="{{ $route }}">
    <input type="checkbox" 
        @if ($id) id="{{ $id }}" @endif
        {{ $status ? 'checked' : '' }}
        data-toggle="toggle" data-size="{{ $dataSize }}"
        data-offstyle="{{ $offStyle }}" data-onstyle="{{ $onStyle }}"
        data-onlabel="{{ $onLabel }}" data-offlabel="{{ $offLabel }}"
    />
</a>