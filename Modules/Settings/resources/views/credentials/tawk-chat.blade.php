<form action="{{ route('admin.update.twak_chat') }}" method="POST">
    @csrf
    @method('POST')
    <div class="row gy-6">
        <div class="col-md-12">
            <x-input-label for="tawk_property_id" :value="__('attribute.tawk_property_id')" />
            <x-text-input id="tawk_property_id" name="tawk_property_id" :value="$settings->tawk_property_id ?? ''" />  
            <x-input-error field="tawk_property_id" />    
        </div>
        <div class="col-md-12">
            <x-input-label for="tawk_widget_id" :value="__('attribute.tawk_widget_id')" />
            <x-text-input id="tawk_widget_id" name="tawk_widget_id" :value="$settings->tawk_widget_id ?? ''" />  
            <x-input-error field="tawk_widget_id" />    
        </div>
        <div class="col-md-12">
            <x-input-switch name="tawk_status" :checked="$settings->tawk_status ?? false" :label="__('attribute.status')" class="mb-3" />
            <x-input-error field="tawk_status" /> 
        </div>

        @can('credentials_settings-tawk_chat_update')
        <div class="col-md-12">
            <x-button :text="__('admin.save')" />
        </div>
        @endcan
    </div>
</form>