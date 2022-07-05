@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="card">
                <div class="card-body">

                    <div class="col-md-12">
                        <div class="col-md-12">
                            <div class="row mb-5">
                                <div class="col-sm-6">
                                    <h2><i class="bi bi-person-square"></i> Check Out</h2>
                                </div>
                                <div class="col-sm-6 ">
                                    <a href="/home" class="btn btn-secondary float-end"> Kembali</a>
                                </div>
                            </div>
                        </div>



                        @if (!empty($pesanan->jumlah_harga))
                            {{-- @if (!empty($barang->name)) --}}
                            <p class="text-right"> Tanggal Pesanan : {{ $pesanan->tanggal }}</p>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Gambar</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Total Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($pesanan_details as $pesanan_detail)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $pesanan_detail->barang->name }}</td>
                                            <td>
                                                <img src="/imageBarang/{{ $pesanan_detail->barang->gambar }}"
                                                    style="width: 100px">
                                            </td>
                                            <td>{{ $pesanan_detail->jumlah }} Kg</td>
                                            <td>Rp. {{ number_format($pesanan_detail->barang->harga) }}</td>
                                            <td>Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>
                                            <td>
                                                <form action="/check-out/{{ $pesanan_detail->id }}" method="post">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <button class="btn btn-danger"
                                                        onclick="return confirm('Yakin menghapus data ?')">
                                                        <i class="bi bi-trash2-fill"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach


                                    @if (!empty($pesanan_detail))
                                        <tr>
                                            <td colspan="4" class="text-right"><strong>Harga</strong></td>
                                            <td>
                                                <strong>
                                                    Rp. {{ number_format($pesanan->jumlah_harga) }}
                                                </strong>
                                            </td>
                                            <td>
                                                @csrf
                                                <a href="/konfirmasi-check-out" class="btn btn-warning"
                                                    onclick="return confirm('Yakin mau check out ?')">
                                                    <i class="bi bi-bag-check-fill"></i>
                                                    Check Out
                                                </a>
                                            </td>
                                            <td>

                                            </td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                        @endif

                    </div>


                </div>
            </div>

        </div>
    </div>
@endsection
