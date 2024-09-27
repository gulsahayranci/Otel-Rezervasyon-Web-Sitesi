<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    public function index(){
        $setting=SiteSetting::where('id',1)->first();
        return view('backend.pages.setting.index',compact('setting'));
    }
    public function update(Request $request,$id=1){

        SiteSetting::updateorCreate(['id'=>$id],
            [
                'adres_link' => $request->adres_link,
                'adres'=>$request->adres,
                'telefon'=>$request->telefon,
                'mail'=>$request->mail,
            ]);
        return back()->withSuccess('Başarıyla güncellendi.');

    }
}
