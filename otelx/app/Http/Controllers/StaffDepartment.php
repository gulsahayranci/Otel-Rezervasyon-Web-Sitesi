<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffDepartment extends Controller
{

    public function index()
    {
        $data=Department::all();
        return view('backend.pages.department.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=new Department();
        $data->title=$request->title;
        $data->detail=$request->detail;
        $data->save();
        return redirect('/panel/department')->with('success','veri eklendi.');
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


        $data=Department::find($id);
        return view('backend.pages.department.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data=Department::find($id);
        $data->title=$request->title;
        $data->detail=$request->detail;
        $data->save();
        return redirect('/panel/department'.$id.'/edit')->with('başarıyla oluşturuldu.');
    }

    public function destroy(Department $data,$id)
    {
        DB::table('departments')->where('id','=',$id)->delete();
        return redirect()->route('panel.department.index')->with('silindi!');
    }



}
