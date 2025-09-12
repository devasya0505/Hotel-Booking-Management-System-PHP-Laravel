<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel\Hotel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $hotels = Hotel::select()->orderBy('id', 'desc')->take(3)->get();
        return view('home', compact('hotels'));
    }
}
