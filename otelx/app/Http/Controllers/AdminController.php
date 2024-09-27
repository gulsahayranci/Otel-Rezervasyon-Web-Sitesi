<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function login(){
        return view('backend.login');
    }
    function check_login(Request $request){
            $request->validate([
                'username'=>'required',
                'password'=>'required',

            ]);
            $admin=Admin::where(['username'=>$request->username, 'password'=>sha1($request->password)])->count();
            if($admin>0){
                $adminData=Admin::where(['username'=>$request->username, 'password'=>sha1($request->password)])->get();
                session(['adminData'=>$adminData]);
                return redirect(['admin']);
            }
            else{
                return redirect('/panel/login')->with('msg','Tekrar deneyiniz!');

            }
    }
}
