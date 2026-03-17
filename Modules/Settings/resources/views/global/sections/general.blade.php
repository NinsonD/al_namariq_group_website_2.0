<form action="{{ route('admin.update.general_setting') }}" method="POST">
    @csrf
    @method('POST')
    <div class="row gy-6">
        <div class="col-md-12">
            <x-input-label for="app_name" :value="__('attribute.app_name')" />
            <x-text-input id="app_name" name="app_name" :value="$settings->app_name ?? ''" />
            <x-input-error field="app_name" />
        </div>
        <div class="col-lg-6">
            <x-input-label for="site_address" :value="__('attribute.site_address')" />
            <x-text-input id="site_address" name="site_address" :value="$settings->site_address ?? ''" />
            <x-input-error field="site_address" />
        </div>
        <div class="col-lg-6">
            <x-input-label for="site_address_link" :value="__('attribute.site_address_link')" />
            <x-text-input id="site_address_link" name="site_address_link" :value="$settings->site_address_link ?? ''" />
            <x-input-error field="site_address_link" />
        </div>
        <div class="col-lg-6">
            <x-input-label for="site_email" :value="__('attribute.site_email')" />
            <x-text-input id="site_email" name="site_email" :value="$settings->site_email ?? ''" />
            <x-input-error field="site_email" />
        </div>
        <div class="col-lg-6">
            <x-input-label for="site_phone" :value="__('attribute.site_phone')" />
            <x-text-input id="site_phone" name="site_phone" :value="$settings->site_phone ?? ''" />
            <x-input-error field="site_phone" />
        </div>
        <div class="col-lg-6">
            <x-input-label for="timezone" :value="__('attribute.timezone')" />
            <select name="timezone" id="" class="form-control conca-select2">
                @foreach ($all_timezones as $timezone)
                    <option value="{{ $timezone->name }}" @selected($settings->timezone == $timezone->name)>
                        {{ $timezone->name }}</option>
                @endforeach
            </select>
            <x-input-error field="timezone" />
        </div>
        <div class="col-lg-6">
            <x-input-label for="date_format" :value="__('attribute.date_format')" />
            <select name="date_format" id="" class="form-control conca-select2">
                @foreach (dateFormats() as $key => $format)
                    <option value="{{ $key }}" @selected($settings->date_format == $key)>
                        {{ $format }}
                    </option>
                @endforeach
            </select>
            <x-input-error field="date_format" />
        </div>
        <div class="col-md-12">
            <div class="mt-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="preloader_status" name="preloader_status" @checked($settings->preloader_status ?? false == 1)>
                    <label class="form-check-label" for="preloader_status">
                        {{ __('attribute.preloader_status') }}
                    </label>
                </div>
                <x-input-error field="preloader_status" />
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="backtotop_status" name="backtotop_status" @checked($settings->backtotop_status ?? false == 1)>
                <label class="form-check-label" for="backtotop_status">
                    {{ __('attribute.backtotop_status') }}
                </label>
            </div>
            <x-input-error field="backtotop_status" />
        </div>
        <div class="col-md-12 mb-3">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="magic_cursor_status" name="magic_cursor_status" @checked($settings->magic_cursor_status ?? false == 1)>
                <label class="form-check-label" for="magic_cursor_status">
                    {{ __('attribute.magic_cursor_status') }}
                </label>
            </div>
            <x-input-error field="magic_cursor_status" />
        </div>

        @can('settings-general_update')
        <div class="col-md-12">
            <x-button :text="__('admin.save')" />
        </div>
        @endcan
    </div>
</form>
