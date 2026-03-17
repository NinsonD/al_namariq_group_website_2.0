<form action="{{ route('admin.update.cookie_consent') }}" method="POST">
    @csrf
    @method('POST')

    <div class="row gy-6">
        <div class="col-lg-6 col-12">
            <x-input-label for="cookie_border" :value="__('attribute.cookie_border')" />
            <select name="cookie_border" id="cookie_border" class="form-control conca-select2">
                <option value="none" @selected($settings->cookie_border == 'none')>{{ __('admin.none') }}</option>
                <option value="thin" @selected($settings->cookie_border == 'thin')>{{ __('admin.thin') }}</option>
                <option value="normal" @selected($settings->cookie_border == 'normal')>{{ __('admin.normal') }}</option>
                <option value="thick" @selected($settings->cookie_border == 'thick')>{{ __('admin.thick') }}</option>
            </select> 
            <x-input-error field="cookie_border" />
        </div>
        <div class="col-lg-6 col-12">
            <x-input-label for="cookie_corners" :value="__('attribute.cookie_corners')" />
            <select name="cookie_corners" id="cookie_corners" class="form-control conca-select2">
                <option value="none" @selected($settings->cookie_corners == 'none')>{{ __('admin.none') }}</option>
                <option value="small" @selected($settings->cookie_corners == 'small')>{{ __('admin.small') }}</option>
                <option value="normal" @selected($settings->cookie_corners == 'normal')>{{ __('admin.normal') }}</option>
                <option value="large" @selected($settings->cookie_corners == 'large')>{{ __('admin.large') }}</option>
            </select> 
            <x-input-error field="cookie_corners" />
        </div>
        <div class="col-lg-6 col-12">
            <x-input-label for="cookie_background_color_input" :value="__('attribute.cookie_background_color')" />
            <x-text-input type="text" hidden id="cookie_background_color_input" name="cookie_background_color" :value="old('cookie_background_color', $settings->cookie_background_color ?? '')" />
            <div id="cookie_background_color" class="pickr-classic"></div>
            <x-input-error field="cookie_background_color" />
        </div>
        <div class="col-lg-6 col-12">
            <x-input-label for="cookie_text_color_input" :value="__('attribute.cookie_text_color')" />
            <x-text-input type="text" hidden id="cookie_text_color_input" name="cookie_text_color" :value="old('cookie_text_color', $settings->cookie_text_color ?? '')" />
            <div id="cookie_text_color" class="pickr-classic"></div>
            <x-input-error field="cookie_text_color" />
        </div>
        <div class="col-lg-6 col-12">
            <x-input-label for="cookie_border_color_input" :value="__('attribute.cookie_border_color')" />
            <x-text-input type="text" hidden id="cookie_border_color_input" name="cookie_border_color" :value="old('cookie_border_color', $settings->cookie_border_color ?? '')" />
            <div id="cookie_border_color" class="pickr-classic"></div>
            <x-input-error field="cookie_border_color" />
        </div>
        <div class="col-lg-6 col-12">
            <x-input-label for="cookie_btn_bg_color_input" :value="__('attribute.cookie_btn_bg_color')" />
            <x-text-input type="text" hidden id="cookie_btn_bg_color_input" name="cookie_btn_bg_color" :value="old('cookie_btn_bg_color', $settings->cookie_btn_bg_color ?? '')" />
            <div id="cookie_btn_bg_color" class="pickr-classic"></div>
            <x-input-error field="cookie_btn_bg_color" />
        </div>
        <div class="col-lg-6 col-12">
            <x-input-label for="cookie_btn_text_color_input" :value="__('attribute.cookie_btn_text_color')" />
            <x-text-input type="text" hidden id="cookie_btn_text_color_input" name="cookie_btn_text_color" :value="old('cookie_btn_text_color', $settings->cookie_btn_text_color ?? '')" />
            <div id="cookie_btn_text_color" class="pickr-classic"></div>
            <x-input-error field="cookie_btn_text_color" />
        </div>
        <div class="col-lg-6 col-12">
            <x-input-label for="cookie_link" :value="__('attribute.cookie_link')" />
            <x-text-input id="cookie_link" name="cookie_link" :value="old('cookie_link', $settings->cookie_link ?? '')" />  
            <x-input-error field="cookie_link" />
        </div>
        <div class="col-lg-6 col-12">
            <x-input-label for="cookie_link_text" :value="__('attribute.cookie_link_text')" />
            <x-text-input id="cookie_link_text" name="cookie_link_text" :value="old('cookie_link_text', $settings->cookie_link_text ?? '')" />
            <x-input-error field="cookie_link_text" /> 
        </div>
        <div class="col-lg-6 col-12">
            <x-input-label for="cookie_btn_text" :value="__('attribute.btn_text')" />
            <x-text-input id="cookie_btn_text" name="cookie_btn_text" :value="old('cookie_btn_text', $settings->cookie_btn_text ?? '')" />
            <x-input-error field="cookie_btn_text" />  
        </div>
        <div class="col-12">
            <x-input-label for="cookie_messages" :value="__('attribute.cookie_message')" />
            <x-textarea id="cookie_messages" rows="6" name="cookie_message" :value="old('cookie_message', $settings->cookie_message ?? '')"/>
            <x-input-error field="cookie_message" />
        </div>
        <div class="col-md-12">
            <div class="mb-6">
                <x-input-switch name="cookie_status" :label="__('attribute.status')" :checked="$settings->cookie_status ?? false" />
                <x-input-error field="cookie_status" />
            </div>
        </div>

        @can('settings-cookie_update')
        <div class="col-md-12">
            <x-button :text="__('admin.save')" />
        </div>
        @endcan
    </div>
</form>