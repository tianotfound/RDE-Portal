<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Picture;

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
        $latestPicture = Picture::latest()->first(); // This will get the most recent picture

        $pictures = Picture::all(); // All pictures for listing
    
        return view('home', compact('pictures', 'latestPicture'));
    }
}
