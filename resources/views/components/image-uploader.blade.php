@php
    $demo_img = asset('admin/img/no-image.png');
    $filePath = public_path($value);
    $img = (!empty($value) && file_exists($filePath)) ? asset($value) : $demo_img;

     $defaultSize = $defaultSize ? ' default-size' : '';
@endphp
<x-input-label :value="$label" class="mb-2" />
<div class="conca-image-upload-container mb-3">

    <div class="mb-3 img-thumbnail-wrapper">
        <img class="conca-img-thumbnail {{ $defaultSize }}" src="{{ $img }}" alt="{{ $label }}" data-default="{{!empty($value) ? asset($value) : $demo_img}}">
    </div>

    <input id="{{$name}}" name="{{$name}}" class="image-input" accept="image/*" type="file"  hidden>

    <button class="conca-image-upload-btn btn btn-sm btn-label-primary">{{$btnText}}</button>
    <button class="conca-image-reset-btn btn btn-sm btn-label-danger d-none">{{$resetText}}</button>
</div>
