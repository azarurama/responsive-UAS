@extends('layout.app')

@section('title', 'Tambah Pelanggan')

@section('content')
<div class="card p-5">
    <div class="d-flex">
        <h1>Master Pelanggan </h1>
    </div>
    <form action="{{ route('pelanggan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nm_pelanggan">Nama Pelanggan</label>
            <input type="text" name="nm_pelanggan" class="form-control" placeholder="masukan nama pelanggan" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" placeholder="masukan email" required>
        </div>
        <div class="form-group">
            <label for="telepon">Telepon</label>
            <input type="number" name="telepon" class="form-control" placeholder="masukan telepon" required>
        </div>
        <button class="btn btn-primary" type="submit"> save</button>
    </form>
</div>
@endsection
