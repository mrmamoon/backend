<?php // Code within app\Helpers\Helper.php
// use App\Models\Brand;
use App\Models\Settings;
use App\Models\headings;

// use App\Models\Blog;
// use App\Models\CMS;
// use App\Models\Menu;
// use App\Models\OurService;



if (!function_exists('getSettings')) {
    function getSettings($key)
    {
        return Settings::where('setting_key',$key)->first()->setting_value;
    }
}

if (!function_exists('getHeading')) {
    function getHeading($key)
    {
        return headings::where('key',$key)->first()->content;
    }
}