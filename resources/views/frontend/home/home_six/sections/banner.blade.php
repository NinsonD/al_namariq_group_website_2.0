@if (!empty($default_content?->main_image))
<div class="des-project-area">
    <div class="des-project-banner">
        <img class="w-100" data-speed=".7" src="{{ asset($default_content?->main_image) }}" alt="{{ $settings?->app_name }}">
    </div>
</div>
@endif
