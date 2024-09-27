<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Room;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Booking::all();
        return view('backend.pages.bookings.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers=Customer::all();
        $room=Room::all();
        return view('backend.pages.bookings.create',['data'=>$customers,'room'=>$room]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate=([
            'customer_id'=>'required',
            'room_id'=>'required',
            'checkin_date'=>'required',
            'checkout_date'=>'required',
            'total_adults'=>'required',

        ]);

        $data=new Booking;
        $data->customer_id=$request->customer_id;
        $data->room_id=$request->room_id;
        $data->checkin_date=$request->checkin_date;
        $data->checkout_date=$request->checkout_date;
        $data->total_adults=$request->total_adults;
        $data->total_children=$request->total_children;
        $data->save();
        if($request->ref=='front'){
            return redirect('/booking')->with('success','Rezervasyon oluşturuldu.');
        }
        return redirect('/panel/bookings')->with('success','veri eklendi.');
    }


    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('bookings')->where('id','=',$id)->delete();
        return redirect()->route('panel.bookings.index')->with('silindi!');
    }
//boş odaları kontrol eden fonksiyon

    function available_rooms(Request $request,$checkin_date){
        $arooms=DB::SELECT("SELECT * FROM rooms WHERE id NOT IN(SELECT room_id FROM bookings WHERE
         '$checkin_date' BETWEEN checkin_date AND checkout_date )");
        return response()->json(['data'=>$arooms]);
    }
    public function front_booking()
    {

        return view('frontend.pages.booking');
    }
}
