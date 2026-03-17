<form action="{{ route('admin.update.google_tag') }}" method="POST">
    @csrf
    @method('POST')
    <div class="row gy-6">
        <div class="col-md-12">
            <x-input-label for="google_tagmanager_id" :value="__('attribute.google_tagmanager_id')" />
            <x-text-input id="google_tagmanager_id" name="google_tagmanager_id" :value="$settings->google_tagmanager_id ?? ''" />  
            <x-input-error field="google_tagmanager_id" />    
        </div>
        <div class="col-md-12">
            <x-input-switch name="google_tagmanager_status" :checked="$settings->google_tagmanager_status ?? false" :label="__('attribute.status')" class="mb-3" />
            <x-input-error field="google_tagmanager_status" /> 
        </div>

        @can('credentials_settings-google_tag_manager_update')
            
        <div class="col-md-12">
            <x-button :text="__('admin.save')" />
        </div>
        @endcan
    </div>
</form>