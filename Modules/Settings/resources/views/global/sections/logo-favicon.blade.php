<form action="{{ route('admin.update.logo_setting') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="row gy-6">
        <div class="col-lg-6 col-12">
            <x-image-uploader name="logo" :label="__('attribute.logo')" :value="$settings->logo" />
            <x-input-error field="logo" />
        </div>
        <div class="col-lg-6 col-12">
            <x-image-uploader name="logo_white" :label="__('attribute.logo_white')" :value="$settings->logo_white" />
            <x-input-error field="logo_white" />
        </div>
        <div class="col-lg-6 col-12">
            <x-image-uploader name="logo_shop" :label="__('attribute.logo_shop')" :value="$settings->logo_shop" />
            <x-input-error field="logo_shop" />
        </div>
        <div class="col-lg-6 col-12">
            <x-image-uploader name="favicon" :label="__('attribute.favicon')" :value="$settings->favicon" />
            <x-input-error field="favicon" />
        </div>

        @can('settings-logo_update')
        <div class="col-md-12">
            <x-button :text="__('admin.save')" />
        </div>
        @endcan
    </div>
</form>
