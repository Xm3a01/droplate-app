<?php

namespace App\Traits;

use App\Models\Setting;


trait SettingTrait {
    public function vat()
    {
        return Setting::first()->vat;
    }
}
