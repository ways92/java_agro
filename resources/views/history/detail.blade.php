@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-body">

                    <div class="col-md-12">
                        <div class="col-md-12">
                            <div class="row mb-5">
                                <div class="col-sm-6">
                                    <h2><i class="bi bi-ticket-detailed-fill"></i> Detail Pemesanan</h2>
                                </div>
                                <div class="col-sm-6 ">
                                    <a href="/history" class="btn btn-secondary float-end"> Kembali</a>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-body">
                                <h2>Sukses Check Out</h2>
                                <p class="fs-5">Selanjutnya untuk pembayaran silahkan transfer Ke <strong>Bank
                                        BCA Nomer
                                        Rekening : 90909090</strong> dengan nominal
                                    <strong>Rp. {{ number_format($pesanan->jumlah_harga + $pesanan->kode) }}</strong>
                                </p>
                            </div>
                        </div>


                        @if (!empty($pesanan->jumlah_harga))
                            <p class="text-right">
                                <strong>
                                    Tanggal Pesanan : {{ $pesanan->tanggal }}
                                </strong>
                            </p>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Gambar</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Total Harga</th>

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

                                        </tr>
                                    @endforeach



                                    <tr>
                                        <td colspan="5" class="text-right"><strong>Harga :</strong></td>
                                        <td>
                                            <strong>
                                                Rp. {{ number_format($pesanan->jumlah_harga) }}
                                            </strong>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-right"><strong>Kode Unik :</strong></td>
                                        <td>
                                            <strong>
                                                Rp. {{ number_format($pesanan->kode) }}
                                            </strong>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-right"><strong>Total Bayar :</strong></td>
                                        <td>
                                            <strong>
                                                Rp. {{ number_format($pesanan->jumlah_harga + $pesanan->kode) }}
                                            </strong>
                                        </td>

                                    </tr>


                                </tbody>
                            </table>
                        @endif

                    </div>


                </div>
            </div>

        </div>
    </div>
@endsection
