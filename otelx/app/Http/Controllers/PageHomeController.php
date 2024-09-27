<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomType;
use App\Models\Service;
use App\Models\Staff;
use Illuminate\Http\Request;

class PageHomeController extends Controller
{
    public function anasayfa(){
        $data=RoomType::all();
        $dt=Staff::all();
        $dat=Service::all();
        return view('frontend.pages.index',['data'=>$data,'dt'=>$dt,'dat'=>$dat]);
    }
    public function  about(){
        return view('frontend.pages.about');
    }
    public function contact(){
        return view('frontend.pages.contact');
    }
    public function rooms(){
        $data=RoomType::all();
        return view('frontend.pages.rooms',['data'=>$data]);
    }
    public function services(){
        $dat=Service::all();
        return view('frontend.pages.services',['dat'=>$dat]);
    }
    public function team(){
        $data=Staff::all();
        return view('frontend.pages.team',['data'=>$data]);
    }

    public function roomdetay($id){
        $id=RoomType::findOrFail($id);
        $data=RoomType::where('id',$id->id)->get();
        return view('frontend.pages.roomdetay',compact('data'));
    }
}
