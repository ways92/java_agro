@extends('welcome')

@section('isi')
    <div class="container mt-5 mb-5">
        <div class="row row-cols-1 row-cols-md-3 g-4">

            @foreach ($barangs as $barang)
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="/imageBarang/{{ $barang->gambar }}" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $barang->name }}</h5>
                            <p class="card-text">
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
@endsection
