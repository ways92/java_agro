<?php

namespace App\Http\Controllers;

use App\User;
use App\Barang;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    public function index(){

        $sliders = Slider::all();
        return view('beranda', compact('sliders'));
    }

     public function produk(){

        $sliders = Slider::all();
        $barangs = Barang::all();
        return view('produk', compact('barangs', 'sliders'));
    }
     public function tentang(){

        $sliders = Slider::all();
        $barangs = Barang::all();
        return view('tentang', compact('barangs', 'sliders'));
    }
}
