<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Admin;
use App\Models\Hotel\Hotel;
use App\Models\Apartment\Apartment;

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
    public function index()
    {


        $adminsCount = Admin::select()->count();
        $hotelsCount = Hotel::select()->count();
        $roomsCount = Apartment::select()->count();

        return view('admins.index', compact('adminsCount', 'hotelsCount', 'roomsCount'));
    }

    public function logout()
{
    auth()->guard('admin')->logout();
    return redirect()->route('index'); // or whatever your main home route is
}
}
