@extends('admin.layoutAdmin.app')

@section('title', 'Data Slider')

@section('content')

    <div class="container">
        <a href="/admin/slider" class="btn btn-secondary mb-3">Kembali</a>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form action="/admin/store-slider" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="name" placeholder="Nama">
                        @error('name')
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
