<form action="{{ route('admin.update.maintenance_mode') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')

    <div class="alert alert-warning d-flex gap-3 flex-sm-nowrap flex-wrap" role="alert">
        <div class="flex-shrink-1">
            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.5 4.46148V7.92302M16 8.5C16 12.6421 12.6421 16 8.5 16C4.35786 16 1 12.6421 1 8.5C1 4.35786 4.35786 1 8.5 1C12.6421 1 16 4.35786 16 8.5ZM9.07693 11.3846C9.07693 11.7032 8.81864 11.9615 8.50001 11.9615C8.18138 11.9615 7.92309 11.7032 7.92309 11.3846C7.92309 11.0659 8.18138 10.8077 8.50001 10.8077C8.81864 10.8077 9.07693 11.0659 9.07693 11.3846Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
        </div>
        <div class="">
            <h4 class="alert-heading">
                {{ __('admin.warning') }}
            </h4>
            <p class="mb-0">
                {{ __('admin.maintenance_mode_warning') }}
            </p>
        </div>
    </div>

    <div class="mb-4">
        <x-image-uploader name="maintenance_image" :label="__('attribute.image')" :value="$settings->maintenance_image" />
        <x-input-error field="maintenance_image" />
    </div>

    <div class="row gy-6">
        <div class="col-md-12">
            <x-input-label for="maintenance_title" :value="__('attribute.maintenance_title')" />
            <x-text-input id="maintenance_title" name="maintenance_title" :value="$settings->maintenance_title ?? ''" />
            <x-input-error field="maintenance_title" />
        </div>
        <div class="col-md-12">
            <x-input-label for="maintenance_description" :value="__('attribute.maintenance_description')" />
            <textarea  id="maintenance_description" name="maintenance_description" rows="7" class="form-control tinymce">{{ $settings->maintenance_description }}</textarea>
            <x-input-error field="maintenance_description" />
        </div>
        <div class="col-md-12">
            <div class="mb-6">
                <x-input-switch name="maintenance_status" :label="__('attribute.status')" :checked="$settings->maintenance_status" />
                <x-input-error field="maintenance_status" />
            </div>
        </div>

        @can('settings-maintenance_settings_update')
        <div class="col-md-12">
            <x-button :text="__('admin.save')" />
        </div>
        @endcan

    </div>
</form>

