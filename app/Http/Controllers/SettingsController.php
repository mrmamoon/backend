<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index()
    {
        return view('cms.settings.settings');
    }

    public function update(Request $request)
    {

        // $request->validate([
        //     'header_image' => 'required|dimensions:min_width=1970,min_height=222',
        // ]);

        foreach($request->key as $key => $value){

            if($key == 'site_logo_header'){
                $setting = Settings::where('setting_key',$key)->first();
                Storage::disk('cms')->delete('', $setting->setting_value);
                $imageName = Storage::disk('cms')->putFile('', $value);
                $setting->setting_value  =   $imageName;
            }elseif($key == 'site_logo_footer'){
                $setting = Settings::where('setting_key',$key)->first();
                // Storage::disk('cms')->delete('', $setting->setting_value);
                $imageName = Storage::disk('cms')->putFile('', $value);
                $setting->setting_value  =   $imageName;
            }elseif($key == 'header_image'){
                $setting = Settings::where('setting_key',$key)->first();
                // Storage::disk('cms')->delete('', $setting->setting_value);   
                $imageName = Storage::disk('cms')->putFile('', $value);
                $setting->setting_value  =   $imageName;
            }else{
                $setting = Settings::where('setting_key',$key)->first();
                $setting->setting_value =   $value;
            }
            $setting->save();
        }

        return redirect()->route('settings');
    }
}
