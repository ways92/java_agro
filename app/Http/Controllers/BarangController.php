<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Pesanan;
use App\PesananDetail;
use Illuminate\Http\Request;

class BarangController extends Controller
{

    public function __construct()
    {
        // ke halaman harus login
        $this->middleware('auth');
    }

    public function barang()
    {
        $barangs = Barang::all();
        return view('admin.barang.barang', compact('barangs'));
    }
    public function create()
    {
        return view('admin.barang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
           'name'=>'required',
           'description'=>'required',
           'gambar'=>'required|mimes:png,jpg,webp,jpeg,svg',
           'harga'=>'required',
           'stok'=>'required',
       ]);

      $nm = $request->gambar;
      $nameFile = time().".".$nm->getClientOriginalExtension();

      $barUpload = new Barang;
      $barUpload->name = $request->name;
      $barUpload->description = $request->description;
      $barUpload->harga = $request->harga;
      $barUpload->stok = $request->stok;
      $barUpload->gambar = $nameFile;

      $destinationPath = public_path('imageBarang/');
      $nm->move( $destinationPath, $nameFile);
      $barUpload->save();

        return redirect('/admin/barang');
    }

    public function destroy($id){
        $pesanan_detail = PesananDetail::where('barang_id', $id)->first();

        if(!empty($pesanan_detail->pesanan_id)){
            $pesanan = Pesanan::where('id',$pesanan_detail->pesanan_id)->first();
            $pesanan->jumlah_harga = $pesanan->jumlah_harga-$pesanan_detail->jumlah_harga;
            if($pesanan->jumlah_harga == 0){
                $pesanan->delete();
            }else{
                $pesanan->update();
            }
             $pesanan_detail->delete();
        }

        $barang = Barang::findorfail($id);
        $barang->delete();


        return redirect('/admin/barang');
    }

    public function edit($id)
    {
        $barang = Barang::where('id',$id)->first();
        return view('admin.barang.edit', compact('barang'));
    }

    public function update(Request $request , $id)
    {
        $barang = Barang::findorfail($id);
        $request->validate([
           'name'=>'required',
           'description'=>'required',
           'gambar'=>'required|mimes:png,jpg,webp,jpeg,svg',
           'harga'=>'required',
           'stok'=>'required',
       ]);

       $nm = $request->gambar;
       $nameFile = time().".".$nm->getClientOriginalExtension();

       $input =[
           'name'=> $request->name,
           'description'=>$request->description,
           'gambar'=>$nameFile,
           'harga'=>$request->harga,
           'stok'=>$request->stok,
        ];

      $destinationPath = public_path('imageBarang/');
      $nm->move( $destinationPath, $nameFile);

      $barang->update($input);

        return redirect('/admin/barang');
    }
}
