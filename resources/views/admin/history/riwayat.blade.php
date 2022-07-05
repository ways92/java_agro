@extends('admin.layoutAdmin.app')

@section('title', 'Riwayat')

@section('content')

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
                @if ($pesanan->status == 2 || $pesanan->status == 1)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $pesanan->tanggal }}</td>
                        <td>
                            @if ($pesanan->status == 1)
                                Sudah pesan & belum dibayar
                            @elseif ($pesanan->status == 2)
                                Sudah Dibayar
                            @elseif ($pesanan->status == 0)
                                Belum check out
                            @endif
                        </td>
                        <td>Rp. {{ number_format($pesanan->jumlah_harga + $pesanan->kode) }}</td>

                        <td style="width: 18%">
                            <form action="{{ route('confirm-history', $pesanan->id) }}" method="POST"
                                enctype="multipart/form-data">
                                <a class="btn btn-info mb-1" href="/admin/history/{{ $pesanan->id }}">
                                    <i class="bi bi-info-square-fill"></i>
                                </a>
                                @method('PUT')
                                @csrf
                                <button type="submit"
                                    class="btn btn-success {{ $pesanan->status == '2' ? 'invisible' : '' }}"
                                    onclick="return confirm('Yakin sudah bayar ?')">Konfirmasi
                                    Bayar</button>
                            </form>
                        </td>
                    </tr>
                    </tr>
                @endif
            @endforeach

        </tbody>
    </table>


@endsection
