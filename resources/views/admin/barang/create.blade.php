@extends('admin.layoutAdmin.app')

@section('title', 'Data Barang')

@section('content')

    <div class="container">
        <a href="/admin/barang" class="btn btn-secondary mb-3">Kembali</a>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form action="/admin/store-barang" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="name" placeholder="Nama">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Stok</label>
                        <input type="number" class="form-control" name="stok" placeholder="Stok">
                        @error('stok')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Harga</label>
                        <input type="number" class="form-control" name="harga" placeholder="Harga">
                        @error('harga')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea class="form-control" id="" cols="30" rows="5" name="description" placeholder="Deskripsi"></textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div>
                            <label for="">Gambar</label><br>
                            <input type="file" name="gambar">
                        </div>
                        @error('gambar')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection
