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
                                    <h2><i class="bi bi-hourglass-bottom"></i> Riwayat Pemesanan</h2>
                                </div>
                                <div class="col-sm-6 ">
                                    <a href="/home" class="btn btn-secondary float-end"> Kembali</a>
                                </div>
                            </div>
                        </div>


                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Jumlah Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($pesanans as $pesanan)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $pesanan->tanggal }}</td>
                                        <td>
                                            @if ($pesanan->status == 1)
                                                Sudah pesan & belum dibayar
                                            @elseif ($pesanan->status == 2)
                                                Sudah Dibayar
                                            @endif
                                        </td>
                                        <td>{{ number_format($pesanan->jumlah_harga + $pesanan->kode) }}</td>
                                        <td>
                                            <a class="btn btn-info" href="/history/{{ $pesanan->id }}">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tr>
                            </tbody>
                        </table>



                    </div>


                </div>
            </div>

        </div>
    </div>
@endsection
