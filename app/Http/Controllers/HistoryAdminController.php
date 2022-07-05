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

class HistoryAdminController extends Controller
{
     public function __construct()
    {
        // ke halaman harus login
        $this->middleware('auth');
    }

     public function index()
    {
        // $pesanans = DB::table('pesanans')->join('pesanan_details', 'pesanans.id', '=' ,'pesanan_details.pesanan_id' )->get();
        $pesanans = Pesanan::latest()->get();
        return view('admin.history.riwayat', compact('pesanans'));
    }

    public function detail($id){
        $pesanan = Pesanan::where('id',$id)->first();
        $pesanan_details = PesananDetail::where("pesanan_id",$pesanan->id)->get();


        $user = User::where("id",$pesanan->user_id)->first();

        return view('admin.history.detail', compact('pesanan','pesanan_details','user'));
    }

     public function bayar($id)
    {
        $pesanan = Pesanan::findorfail($id);

        $pesanan->status = 2;
        $pesanan->update();
        return redirect('/admin/history')->withToastSuccess('sukses konfirmasi!');
    }
}
