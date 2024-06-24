@extends('layout.app')

@section('title', 'Detail Faktur')

@section('content')
    <div class="card p-5">
        <div class="d-flex">
            <h1>Detail faktur</h1>
        </div>
        <div class="my-4">
            <table style="width: 100%">
                <tbody>
                    <tr>
                        <td>Id pesan</td>
                        <td>: {{ $dataPelanggan->id_pesan }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal pesan</td>
                        <td>: {{ $dataPelanggan->tgl_pesan }}</td>
                    </tr>
                    <tr>
                        <td>Id pelanggan</td>
                        <td>: P{{ str_pad($dataPelanggan->id_pelanggan, 4, '0', STR_PAD_LEFT) }}</td>
                    </tr>
                    <tr>
                        <td>Nama pelanggan</td>
                        <td>: {{ $dataPelanggan->nm_pelanggan }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Id produk</th>
                    <th>Nama produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>B{{ str_pad($item->id, 4, '0', STR_PAD_LEFT) }}</td>
                        <td>{{ $item->nm_produk }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->harga }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
