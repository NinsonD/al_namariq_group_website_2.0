<form action="{{ route('admin.update.google_recaptcha') }}" method="POST">
    @csrf
    @method('POST')
    <div class="row gy-6">
        <div class="col-md-12">
            <x-input-label for="recaptcha_site_key" :value="__('attribute.recaptcha_site_key')" />
            <x-text-input id="recaptcha_site_key" name="recaptcha_site_key" :value="$settings->recaptcha_site_key ?? ''" />  
            <x-input-error field="recaptcha_site_key" />    
        </div>
        <div class="col-md-12">
            <x-input-label for="recaptcha_secret_key" :value="__('attribute.recaptcha_secret_key')" />
            <x-text-input id="recaptcha_secret_key" name="recaptcha_secret_key" :value="$settings->recaptcha_secret_key ?? ''" />
            <x-input-error field="recaptcha_secret_key" /> 
        </div>
        <div class="col-md-12">
            <x-input-switch name="recaptcha_status" :checked="$settings->recaptcha_status" :label="__('attribute.status')" class="mb-3" />
            <x-input-error field="recaptcha_status" /> 
        </div>

        @can('credentials_settings-google_recaptcha_update')
        <div class="col-md-12">
            <x-button :text="__('admin.save')" />
        </div>
        @endcan
        
    </div>
</form>