<?php

namespace Modules\Settings\Traits;

use Modules\Settings\Models\Setting;
use Illuminate\Support\Facades\Cache;

trait SettingsCacheTrait {
    public function cacheSettings() {
        $setting_info = Setting::get();

        $setting = [];
        foreach ($setting_info as $setting_item) {
            $setting[$setting_item->key] = $setting_item->value;
        }

        $setting = (object) $setting;

        Cache::put('setting', $setting);
    }
}
