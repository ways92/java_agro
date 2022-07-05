@extends('admin.layoutAdmin.app')

@section('title', 'Data Slider')

@section('content')

    <div class="">
        <a href="/admin/create-slider" class="btn btn-primary mb-3">Tambah</a>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($sliders as $slider)
                        <tr>

                            <td>{{ $i++ }}</td>
                            <td>{{ $slider->name }}</td>
                            <td>
                                <img src="/imageSlider/{{ $slider->gambar }}" alt="" class="img-fluid" width="100px">
                            </td>
                            <td>
                                <form action="{{ route('delete-slider', $slider->id) }}" method="POST">
                                    <a href="{{ route('edit-slider', $slider->id) }}" type="submit"
                                        class="btn btn-warning">
                                        <i class="bi bi-arrow-up-right-circle-fill"></i>
                                    </a>

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
