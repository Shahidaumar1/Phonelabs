<?php

use App\Models\SiteSetting;

if (!function_exists('getheader')) {
    function setting()
    {
       $setting = SiteSetting::first();
        return $setting;
    }
}
