<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Admin;
use App\Models\Hotel\Hotel;
use App\Models\Apartment\Apartment;
use Illuminate\Support\Facades\Redirect;

class AdminsController extends Controller
{
    public function viewLogin()
    {
        return view('admins.login');
    }
    public function checkLogin(Request $request)
    {

        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {

            return redirect()->route('admins.dashboard');
        }
        return redirect()->back()->with(['error' => 'error logging in']);
    }
    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect()->route('index'); // or whatever your main home route is
    }
    public function index()
    {
        $adminsCount = Admin::select()->count();
        $hotelsCount = Hotel::select()->count();
        $roomsCount = Apartment::select()->count();

        return view('admins.index', compact('adminsCount', 'hotelsCount', 'roomsCount'));
    }


    public function allAdmins()
    {
        $admins = Admin::select()->orderBy('id', 'desc')->get();

        return view('admins.alladmins', compact('admins'));
    }

    public function createAdmins()
    {

        return view('admins.createadmins');
    }

    public function storeAdmins(Request $request)
    {
        // Validate the request
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|unique:admins,email',
        //     'password' => 'required|min:6'
        // ]);

        // Create the admin
        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password) // Hash the password
        ]);

        if ($admin) {
            return redirect()->route('admins.all')->with('success', 'Admin created successfully!');
        }

        return back()->with('error', 'Failed to create admin');
    }

    public function allHotels()
    {
        $hotels = Hotel::select()->orderBy('id', 'desc')->get();

        return view('admins.allhotels', compact('hotels'));
    }

    public function createHotels()
    {
        return view('admins.createhotels');
    }


    public function storeHotels(Request $request)
    {



        Request()->validate([
            "name" => "required|max:40",
            "image" => "required|max:888",
            "description" => "required",
            "location" => "required|max:40",
        ]);

        $destinationPath = 'assets/images/';
        $myimage = $request->image->getClientOriginalName();
        $request->image->move(public_path($destinationPath), $myimage);


        $storeHotels = Hotel::create([

            "name" => $request->name,
            "image" => $myimage,
            "description" => $request->description,
            "location" => $request->location,

        ]);

        if ($storeHotels) {

            return Redirect::route('hotels.all')->with(['success' => 'Hotel Created Successfully']);
        }
    }

    public function editHotels($id)
    {

        $hotel = Hotel::find($id);

        return view('admins.edithotels', compact('hotel'));
    }

    public function updateHotels(Request $request, $id)
    {
        Request()->validate([
            "name" => "required|max:40",
            "description" => "required",
            "location" => "required|max:40",
        ]);

        $hotel = Hotel::find($id);

        $hotel->update($request->all());


        if ($hotel) {
            return Redirect::route('hotels.all')->with(['update' => 'Hotel Updated Successfully']);
        }
    }
}
