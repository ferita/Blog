<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function edit() 
    {
    	$this->authorize('update', Setting::class);
    	
    	$settingsModel = Setting::firstOrFail();

		return view('admin.layouts.primary-reverse', [
            'page' => 'admin.parts.settings',
            'site_name' => $settingsModel->site_name,
            'company_name' => $settingsModel->company_name,
            'company_description' => $settingsModel->company_description,
            'company_address' => $settingsModel->company_address,
            'company_phone' => $settingsModel->company_phone,
            'company_email' => $settingsModel->company_email,
            'manager_email' => $settingsModel->manager_email,
            'site_url' => $settingsModel->site_url,
        ]);  
    }

    public function update (Request $request)
    {
        $this->authorize('update', Setting::class);
        $settingsModel = Setting::firstOrFail();
        $settingsModel->site_name = $request->site_name;
        $settingsModel->company_name = $request->company_name;
        $settingsModel->company_description = $request->company_description;
        $settingsModel->company_address = $request->company_address;
        $settingsModel->company_phone = $request->company_phone;
 		$settingsModel->company_email = $request->company_email;
 		$settingsModel->manager_email = $request->manager_email;
 		$settingsModel->site_url = $request->site_url;
        $settingsModel->save();

        return redirect()->route('admin.settings')->with('success_message', "Информация обновлена");
    }
}
