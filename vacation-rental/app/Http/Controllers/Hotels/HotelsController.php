<?php

namespace App\Http\Controllers\Hotels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment\Apartment;
use App\Models\Booking\Booking;
use App\Models\Hotel\Hotel;
use DateTime;
use Illuminate\Support\Facades\Auth;

class HotelsController extends Controller
{
    public function rooms($id)
    {
        $getRooms = Apartment::select()->orderBy('id', 'desc')->take(6)->where('hotel_id', $id)->get();

        return view('hotels.rooms', compact('getRooms'));
    }

    public function roomsDetails($id)
    {
        $getRoom = Apartment::find($id);

        return view('hotels.roomsdetails', compact('getRoom'));
    }



    public function roomsBooking(Request $request, $id)
    {


        $room = Apartment::find($id);
        $hotel = Hotel::find($id);

        // Convert current date and request dates to d-m-Y format
        $currentDate = date("d-m-Y");
        $checkIn = date("d-m-Y", strtotime($request->check_in));
        $checkOut = date("d-m-Y", strtotime($request->check_out));

        if ($currentDate < $checkIn && $currentDate < $checkOut) {
            if ($checkIn < $checkOut) {

            $datetime1 = DateTime::createFromFormat('d-m-Y', $checkIn);
            $datetime2 = DateTime::createFromFormat('d-m-Y', $checkOut);
            $interval = $datetime1->diff($datetime2);
            $days = $interval->format('%a'); // Number of days

            $bookRooms = Booking::create([
                "name" => $request->name,
                "email" => $request->email,
                "phone_number" => $request->phone_number,
                "check_in" => $checkIn,
                "check_out" => $checkOut,
                "days" => $days,
                "price" => $days * $room->price,
                "user_id" => Auth::user()->id,
                "room_name" => $room->name,
                "hotel_name" => $hotel->name,
            ]);
            echo "Booked Successfully";
            echo $currentDate . "<br>";
            echo $checkIn . "<br>";
            echo $checkOut . "<br>";
            } else {
            echo "Invalid Dates: Check-In date is GREATER THAN Check-Out date";
            }
        } else {
            echo "DO NOT choose past dates" . "<br>";
            echo $currentDate . "<br>";
            echo $checkIn . "<br>";
            echo $checkOut . "<br>";
        }
    }
}
