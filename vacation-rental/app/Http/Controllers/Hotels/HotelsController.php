<?php

namespace App\Http\Controllers\Hotels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment\Apartment;
use App\Models\Booking\Booking;

class HotelsController extends Controller
{
    public function rooms($id){
        $getRooms = Apartment::select()->orderBy('id', 'desc')->take(6)->where('hotel_id', $id)->get();

        return view('hotels.rooms', compact('getRooms'));
    }

    public function roomsDetails($id){
        $getRoom = Apartment::find($id);

        return view('hotels.roomsdetails', compact('getRoom'));
    }


    
    public function roomsBooking(Request $request, $id){
        if(date("Y/m/d") < $request->check_in && date("Y/m/d") < $request->check_out){
            if($request->check_in < $request->check_out){
                
            }
            else{
                echo "Invalid Dates";
            }
        }
        else{
            echo "Invalid Dates";
        }
    }
    
}
