<?php

namespace App\Http\Controllers\Hotels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment\Apartment;
use App\Models\Booking\Booking;
use App\Models\Hotel\Hotel;
use Auth;
use DateTime;
use Redirect;
use Session;

class HotelsController extends Controller
{
    public function rooms($id)
    {

        $getRooms = Apartment::select()->orderBy('id', 'desc')->take(6)
            ->where('hotel_id', $id)->get();


        return view('hotels.rooms', compact('getRooms'));
    }


    public function roomsDetails($id)
    {
        $getRoom = Apartment::find($id);

        if (!$getRoom) {
            abort(404, 'Room not found');
        }

        return view('hotels.roomdetails', compact('getRoom'));
    }

    public function roomsBooking(Request $request, $id)
    {

        $room = Apartment::find($id);
        $hotel = Hotel::find($id);

        if (strval(date("n/j/Y")) < strval($request->check_in) and strval(date("n/j/Y")) < strval($request->check_out)) {

            ///contine with logic

            if ($request->check_in < $request->check_out) {


                $datetime1 = new DateTime($request->check_in);
                $datetime2 = new DateTime($request->check_out);
                $interval = $datetime1->diff($datetime2);
                $days = $interval->format('%a'); //now do whatever you like with $days

                ///contine with logic
                $bookRooms = Booking::create([

                    "name" => $request->name,
                    "email" => $request->email,
                    "phone_number" => $request->phone_number,
                    "check_in" => $request->check_in,
                    "check_out" => $request->check_out,
                    "days" => $days,
                    "price" => $days * $room->price,
                    "user_id" =>    Auth::user()->id,
                    "room_name" => $room->name,
                    "hotel_name" => $hotel->name,
                ]);

                $totalPrice = $days * $room->price;
                $price = Session::put('price', $totalPrice);

                $gePrice = Session::get($price);

                return Redirect::route('hotel.pay');
            } else {
                echo "check out date should be greater than check in date";
            }
        } else {
            echo "choose dates in the future, invalid check in or check out dates";
        }
    }

    public function payWithPayPal(){
        return view('hotels.pay');
    }

    public function success(){
        return view('hotels.success');
    }

}
