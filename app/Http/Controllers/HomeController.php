<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        // ke halaman harus login
        $this->middleware('auth');
    }


    public function index()
    {
        $sliders = Slider::all();
        $barangs = Barang::all();
        return view('home', compact('barangs','sliders'));
    }


}
