@extends('layout.app')

@section('title', 'Edit Produk')

@section('content')
<div class="card p-5">
    <div class="d-flex">
        <h1>Master Produk </h1>
    </div>
    <form action="{{ route('produk.update', $item->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="nm_produk">Nama Produk</label>
            <input type="text" name="nm_produk" class="form-control" placeholder="masukan nama produk" value="{{ $item->nm_produk }}" required>
        </div>
        <div class="form-group">
            <label for="satuan">Satuan</label>
            <select name="satuan" id="satuan" class="form-control" required>
                <option value="{{ $item->satuan }}">{{ $item->satuan }}</option>
                <option value="kg">kg</option>
                <option value="liter">liter</option>
                <option value="buah">buah</option>
                <option value="box">box</option>
            </select>
        </div>
        <div class="form-group">
            <label for="harga">Harga Satuan</label>
            <input type="number" name="harga" class="form-control" placeholder="masukan harga satuan" value="{{ $item->harga }}" required>
        </div>
        <div class="form-group">
            <label for="stock">Stock barang</label>
            <input type="number" name="stock" class="form-control" placeholder="Masukan stock barang" value="{{ $item->stock }}" required>
        </div>
        <button class="btn btn-primary" type="submit"> save</button>
    </form>
</div>
@endsection
