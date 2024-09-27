<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use App\Models\Roomtypeimage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Roomtype::all();
        return view('backend.pages.roomtype.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('backend.pages.roomtype.edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=new Roomtype;
        if($request->hasFile('photo')) {
            $imgyol = $request->file('photo')->store('public/imgs');
            $data->photo=$imgyol;
        }
        $data->title=$request->title;
        $data->detail=$request->detail;
        $data->price=$request->price;
        $data->save();
        if ($request->hasFile('imgs')) {
            foreach ($request->file('imgs') as $img) {
                $imgPath = $img->store('public/imgs');

                $imgData = new Roomtypeimage;
                $imgData->room_type_id = $data->id;
                $imgData->img_src = $imgPath;
                $imgData->img_alt = $request->title;
                $imgData->save();
            }
        }
        return redirect('/panel/roomtype/')->with('success','veri eklendi.');
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


        $data=Roomtype::find($id);
        return view('backend.pages.roomtype.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data=Roomtype::find($id);
        $data->title=$request->title;
        $data->detail=$request->detail;
        $data->price=$request->price;
        $data->save();
        return redirect('/panel/roomtype'.$id.'/edit')->with('başarıyla oluşturuldu.');
    }

    public function destroy(RoomType $data,$id)
    {
        DB::table('room_types')->where('id','=',$id)->delete();
        return redirect()->route('panel.roomtype.index')->with('silindi!');
    }


}
