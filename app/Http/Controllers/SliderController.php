<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function __construct()
    {
        // ke halaman harus login
        $this->middleware('auth');
    }

    public function slider()
    {
        $sliders = Slider::all();
        return view('admin.slider.slider', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        $request->validate([
           'name'=>'required',
           'gambar'=>'required|mimes:png,jpg,webp,jpeg,svg',

       ]);

      $nm = $request->gambar;
      $nameFile = time().".".$nm->getClientOriginalExtension();

      $barUpload = new Slider;
      $barUpload->name = $request->name;
      $barUpload->gambar = $nameFile;

      $destinationPath = public_path('imageslider/');
      $nm->move( $destinationPath, $nameFile);
      $barUpload->save();

        return redirect('/admin/slider');
    }

    public function destroy($id){
        $slider = Slider::findorfail($id);
        $slider->delete();


        return redirect('/admin/slider');
    }

    public function edit($id)
    {
        $slider = Slider::where('id',$id)->first();
        return view('admin.slider.edit', compact('slider'));
    }

     public function update(Request $request, $id){
        $slider = Slider::findorfail($id);
        $request->validate([
           'name'=>'required',
           'gambar'=>'required|mimes:png,jpg,webp,jpeg,svg',

       ]);

      $nm = $request->gambar;
      $nameFile = time().".".$nm->getClientOriginalExtension();

       $input =[
           'name'=> $request->name,
           'gambar'=>$nameFile,
        ];

      $destinationPath = public_path('imageslider/');
      $nm->move( $destinationPath, $nameFile);
      $slider->update($input);

        return redirect('/admin/slider');
    }
}
