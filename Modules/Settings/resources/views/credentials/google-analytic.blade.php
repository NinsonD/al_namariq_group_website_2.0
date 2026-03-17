<form action="{{ route('admin.update.google_analytic') }}" method="POST">
    @csrf
    @method('POST')
    <div class="row gy-6">
        <div class="col-md-12">
            <x-input-label for="google_analytic_id" :value="__('attribute.google_analytic_id')" />
            <x-text-input id="google_analytic_id" name="google_analytic_id" :value="$settings->google_analytic_id ?? ''" />  
            <x-input-error field="google_analytic_id" />    
        </div>
        <div class="col-md-12">
            <x-input-switch name="google_analytic_status" :checked="$settings->google_analytic_status ?? false" :label="__('attribute.status')" class="mb-3" />
            <x-input-error field="google_analytic_status" /> 
        </div>

        @can('credentials_settings-google_analytics_update')
        <div class="col-md-12">
            <x-button :text="__('admin.save')" />
        </div>
        @endcan
    </div>
</form>