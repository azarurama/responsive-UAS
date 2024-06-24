@extends('layout.app')

@section('title', 'Tambah Produk')

@section('content')
<div class="card p-5">
    <div class="d-flex">
        <h1>Master Produk </h1>
    </div>
    <form action="{{ route('produk.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nm_produk">Nama Produk</label>
            <input type="text" name="nm_produk" class="form-control" placeholder="masukan nama produk" required>
        </div>
        <div class="form-group">
            <label for="satuan">Satuan</label>
            <select name="satuan" id="satuan" class="form-control" required>
                <option value="">pilih satuan</option>
                <option value="kg">kg</option>
                <option value="liter">liter</option>
                <option value="buah">buah</option>
                <option value="box">box</option>
            </select>
        </div>
        <div class="form-group">
            <label for="harga">Harga Satuan</label>
            <input type="number" name="harga" class="form-control" placeholder="masukan harga satuan" required>
        </div>
        <div class="form-group">
            <label for="stock">Stock barang</label>
            <input type="number" name="stock" class="form-control" placeholder="Masukan stock barang" required>
        </div>
        <button class="btn btn-primary" type="submit"> save</button>
    </form>
</div>
@endsection
