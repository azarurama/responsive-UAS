@extends('layout.app')

@section('title', 'Entry Penjualan')

@section('content')
    <div class="card p-5">
        <div class="d-flex">
            <h1>Entry penjualan </h1>
        </div>
        <form action="{{ route('simpan-detil') }}" method="POST">
            @csrf
            <p>ID Pesan <span class="ps-5">: {{ $id_pesan }}</span></p>
            <input type="number" name="id_pesan" id="id_pesan" value="{{ $id_pesan }}" hidden>
            <div class="form-group">
                <label for="id_produk">Nama produk</label>
                <select name="id_produk" id="id_produk" class="form-control" required>
                    <option value="">Pilih produk</option>
                    @foreach ($produk as $item)
                        <option value="{{ $item->id }}">{{ $item->nm_produk }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah barang</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control"
                    placeholder="Masukan jumlah barang yang dibeli" required>
            </div>
            <button class="btn btn-primary" type="submit"> save</button>
        </form>
    </div>
    <div class="card p-3 mt-4">
        <table class="table">
            <thead>
                <tr>
                    <th>Id produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listpesanan as $item)
                    <tr>
                        <td>{{ $item->id_produk }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->harga }}</td>
                        <td>
                            <form action="{{ route('delete-detil', $item->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
