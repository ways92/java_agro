<?php

namespace App\Http\Controllers;
use App\User;
use App\Barang;
use App\Pesanan;
use Carbon\Carbon;
use App\PesananDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
     public function __construct()
    {
        // ke halaman harus login
        $this->middleware('auth');
    }

     public function index()
    {
        $pesanans = Pesanan::where('user_id' , Auth::user()->id)->where('status', '!=',0)->get();
        return view('history.index', compact('pesanans'));
    }

    public function detail($id){

    // $pesanan_details = DB::table('pesanans')
    // ->join('users', 'pesanans.user_id', '=', 'users.id')
    // ->join('pesanan_details', 'pesanans.id', '=', 'pesanan_details.pesanan_id')
    // // ->where('users.id', '=', 5)
    // ->first();

    $pesanan = Pesanan::where('id',$id)->first();
    $pesanan_details = PesananDetail::where("pesanan_id",$pesanan->id)->get();

        return view('history.detail', compact('pesanan','pesanan_details'));
    }
}
