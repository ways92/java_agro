@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="row mb-5">
                    <div class="col-sm-6">
                        <h2>Produk Detail</h2>
                    </div>
                    <div class="col-sm-6 ">
                        <a href="/home" class="btn btn-secondary float-end"> Kembali</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="/imageBarang/{{ $barang->gambar }}" class="rounded img-fluid">
                            </div>
                            <div class="col-md-6 mt-5">
                                <h2>{{ $barang->name }}</h2>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Stok</td>
                                            <td>:</td>
                                            <td>{{ $barang->stok }}</td>
                                        </tr>
                                        <tr>
                                            <td>Harga</td>
                                            <td>:</td>
                                            <td>Rp. {{ number_format($barang->harga) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Deskripsi</td>
                                            <td>:</td>
                                            <td>{{ $barang->description }}</td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Pesan</td>
                                            <td>:</td>
                                            <td>

                                                <form action="/pesan/{{ $barang->id }}" method="post">
                                                    @csrf
                                                    <input type="number" name="jumlah_pesan" class="form-control"
                                                        required="">
                                                    @error('jumlah_pesan')
                                                        <p class="text-danger">jumlah pesan minimal 1</p>
                                                    @enderror
                                                    <button type="submit" class="mt-3 btn btn-primary">
                                                        <i class="bi bi-bag-plus-fill"></i>
                                                        Masuk Keranjang
                                                    </button>
                                                </form>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
