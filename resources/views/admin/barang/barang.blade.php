@extends('admin.layoutAdmin.app')

@section('title', 'Data Barang')

@section('content')

    <div class="">
        <a href="/admin/create-barang" class="btn btn-primary mb-3">Tambah</a>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama Barang</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($barangs as $barang)
                        <tr>

                            <td>{{ $i++ }}</td>
                            <td>{{ $barang->name }}</td>
                            <td>{{ $barang->description }}</td>
                            <td>
                                <img src="/imageBarang/{{ $barang->gambar }}" alt="" class="img-fluid" width="100px">
                            </td>
                            <td>{{ $barang->stok }}</td>
                            <td>
                                Rp. {{ number_format($barang->harga) }}
                            </td>
                            <td>

                                <form action="{{ route('delete-barang', $barang->id) }}" method="POST">
                                    <a href="{{ route('edit-barang', $barang->id) }}" type="submit"
                                        class="btn btn-warning">
                                        <i class="bi bi-arrow-up-right-circle-fill"></i>
                                    </a>

                                    {{-- <button href="{{ url('delete-barang', $barang->id) }}" type="submit"
                                    class="btn btn-danger">Hapus</button> --}}
                                    {{-- <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-warning">edit</a> --}}
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
