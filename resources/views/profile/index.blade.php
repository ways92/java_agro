@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="row mb-5">
                    <div class="col-sm-6">
                        <h2><i class="bi bi-person-square"></i> Profile</h2>
                    </div>
                    <div class="col-sm-6 ">
                        <a href="/home" class="btn btn-secondary float-end"> Kembali</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">

                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td width="10">:</td>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td>No HP</td>
                                    <td>:</td>
                                    <td>{{ $user->no_hp }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td>{{ $user->alamat }}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>

            <div class="col-md-12 mt-2">
                <div class="card">
                    <div class="card-body">
                        <h4><i class="bi bi-pencil-square"></i> Edit Profile</h4>
                        <form method="POST" action="/profile">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-right">Nama</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ $user->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-2 col-form-label text-md-right">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ $user->email }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nohp" class="col-md-2 col-form-label text-md-right">No HP</label>

                                <div class="col-md-6">
                                    <input id="nohp" type="number"
                                        class="form-control @error('nohp') is-invalid @enderror" name="nohp"
                                        value="{{ $user->no_hp }}" required autocomplete="nohp" autofocus>

                                    @error('nohp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-md-2 col-form-label text-md-right">Alamat</label>

                                <div class="col-md-6">
                                    <textarea id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                                        required autocomplete="alamat" autofocus cols="30" rows="4">{{ $user->alamat }}</textarea>
                                    @error('alamat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-2 col-form-label text-md-right">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-2 col-form-label text-md-right">Confirm
                                    Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-2">
                                    <button type="submit" class="btn text-white" style="background-color: #111827">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
