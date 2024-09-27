<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    public function index()
    {
        $roomtypes=Roomtype::all();
        $data=Room::all();
        return view('backend.pages.room.index',['data'=>$data,'roomtypes'=>$roomtypes],);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roomtypes=Roomtype::all();

        return view('backend.pages.room.create',['roomtypes'=>$roomtypes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=new Room;
        $data->title=$request->title;
        $data->room_type_id=$request->room_type_id;
        $data->save();
        return redirect('/panel/room')->with('success','veri eklendi.');
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

        $roomtypes=Roomtype::all();
        $data=Room::find($id);
        return view('backend.pages.room.edit',['data'=>$data,'roomtypes'=>$roomtypes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data=Room::find($id);
        $data->room_type_id=$request->room_type_id;
        $data->title=$request->title;
        $data->save();
        return redirect('/panel/room/'.$id.'/edit')->with('başarıyla oluşturuldu.');
    }

    public function destroy(Room $data,$id)
    {
        DB::table('rooms')->where('id','=',$id)->delete();
        return redirect()->route('panel.room.index')->with('silindi!');
    }




}
