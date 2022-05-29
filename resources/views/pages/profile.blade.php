@extends('layouts.admin')

@section('content')
<div class="section-header">
    <h1>Profile</h1>
</div>
<div class="row">
    <div class="col-12">
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ Auth::user()->nama }}" placeholder="Masukkan Nama">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" value="{{ Auth::user()->username }}" placeholder="Masukkan Username">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ Auth::user()->email }}" placeholder="Masukkan Email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Pasword</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Masukkan Konfirmasi Password">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
        </form>
    </div>
</div>
@endsection
