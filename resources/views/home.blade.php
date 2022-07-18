@extends('layouts.app')

@section('content')
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @php $i = 1; @endphp
            @foreach ($sliders as $slider)
                <div class="carousel-item {{ $i == '1' ? 'active' : '' }}">
                    @php $i++; @endphp
                    <img src="/imageSlider/{{ $slider->gambar }}" class="d-block w-100" alt="...">
                </div>
            @endforeach

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>



    <div class="container mt-5">

        <div class="row row-cols-1 row-cols-md-4 g-4">

            @foreach ($barangs as $barang)
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="/imageBarang/{{ $barang->gambar }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $barang->name }}</h5>
                            <p class="card-text">
                                <Strong>Harga : </Strong>
                                Rp. {{ number_format($barang->harga) }} /kg
                                <br>
                                <Strong>Stok : </Strong>
                                {{ $barang->stok }} Kg
                                <br>
                                <hr>
                            </p>
                            <a href="pesan/{{ $barang->id }}" class="btn btn-primary">Pesan</a>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>


    {{-- footer --}}
    <footer class="mt-5" style="height:140px; background-color: #111827">
        <div style="height:20px; background-color: #111827"></div>
        <h3 class="text-white text-center">Java Agro Globalindo</h3>
        <p class="text-white text-center mt-5">
            Copyright ©{{ Date('Y') }} Java Agro Globalindo Inc
        </p>
    </footer>
@endsection
