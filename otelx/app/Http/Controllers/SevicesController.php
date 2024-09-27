<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SevicesController extends Controller
{

    public function index()
    {
        $data=Service::all();
        return view('backend.pages.service.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=new Service();
        $data->title=$request->title;
        $data->detail=$request->detail;
        $data->save();
        return redirect('/panel/service')->with('success','veri eklendi.');
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
    public function edit(string $id)
    {
        $data=Service::find($id);
        return view('backend.pages.service.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data=Service::find($id);
        $data->title=$request->title;
        $data->detail=$request->detail;
        $data->save();
        return redirect('/panel/service'.$id.'/edit')->with('başarıyla oluşturuldu.');
    }

    public function destroy(Service $data,$id)
    {
        DB::table('services')->where('id','=',$id)->delete();
        return redirect()->route('panel.service.index')->with('silindi!');
    }



}
