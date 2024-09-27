<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function index()
    {
        $data=Staff::all();
        return view('backend.pages.staff.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departs=Department::all();

        return view('backend.pages.staff.create',['departs'=>$departs]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=new Staff;
        $imgPath=$request->file('photo')->store('/public/imgs');
        $data->full_name=$request->full_name;
        $data->department_id=$request->department_id;
        $data->photo=$imgPath;
        $data->bio=$request->bio;
        $data->salary_type=$request->salary_type;
        $data->salary_amt=$request->salary_amt;

        $data->save();
        return redirect('/panel/staff')->with('success','veri eklendi.');
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

        $roomtypes=StaffDepartment::all();
        $data=Staff::find($id);
        return view('backend.pages.staff.edit',['data'=>$data,'roomtypes'=>$roomtypes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data=Staff::find($id);
        $data->room_type_id=$request->room_type_id;
        $data->title=$request->title;
        $data->save();
        return redirect('/panel/staff'.$id.'/edit')->with('başarıyla oluşturuldu.');
    }

    public function destroy(Staff $data,$id)
    {/*
        DB::table('staff')->where('id','=',$id)->delete();
        return redirect()->route('panel.staff.index')->with('silindi!');*/
    }



}
