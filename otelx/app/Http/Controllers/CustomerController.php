<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Customer::all();
        return view('backend.pages.customer.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('backend.pages.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate=([
            'full_name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'mobile'=>'required',

        ]);
        if($request->hasFile('photo')){
            $imgPath=$request->file('photo')->store('public/imgs');
        }
        else{
            $imgPath=null;
        }

        $data=new Customer;
        $data->full_name=$request->full_name;
        $data->email=$request->email;
        $data->password=sha1($request->password);
        $data->mobile=$request->mobile;
        $data->adres=$request->adres;
        $data->photo=$imgPath;
        $data->save();

        $ref=$request->ref;
        if($ref='front'){
            return redirect('/register')->with('success','kayıt edildi.');
        }

        return redirect('/panel/customer')->with('success','veri eklendi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */

    public function destroy(Customer $data,$id)
    {
        DB::table('customers')->where('id','=',$id)->delete();
        return redirect()->route('panel.customer.index')->with('silindi!');
    }
    function login(){
        return view('frontend.pages.login');
    }
    function logout(){
        session()->forget(['customerlogin','data']);
        return redirect('/login');
    }
    function customer_login(Request $request){

        $email=$request->email;
        $pwd=sha1($request->password);
        $detail=Customer::where(['email'=>$email,'password'=>$pwd])->count();
        if($detail>0){
            $detail=Customer::where(['email'=>$email,'password'=>$pwd])->get();
            session(['customerlogin'=>true,'data'=>$detail]);
            return redirect('/');
        }else{
            return redirect('/login')->with('error','Yanlış email/şifre !!');
        }


    }
    function register(){
        return view('frontend.pages.register');
    }

}
