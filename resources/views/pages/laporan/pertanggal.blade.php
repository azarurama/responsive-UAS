@extends('layout.app')

@section('title', 'Per-Tanggal')

@section('content')
    <div class="card p-5">
        <div class="d-flex">
            <h1>Laporan pertanggal</h1>
        </div>
        <div class="my-4">
            <form action="{{ route('lap-pertanggal', [$tanggalAwal, $tanggalAkhir]) }}" method="GET">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tanggalAwal">Tanggal awal</label>
                            <input type="date" name="tanggalAwal" id="tanggalAwal" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tanggalAkhir">Tanggal akhir</label>
                            <input type="date" name="tanggalAkhir" id="tanggalAkhir" class="form-control">
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Cari</button>
            </form>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID pesan</th>
                    <th>Tanggal pesan</th>
                    <th>Pelanggan</th>
                    <th>Jumlah produk</th>
                    <th>Total harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>P{{ str_pad($item->id, 4, '0', STR_PAD_LEFT) }}</td>
                        <td>{{ $item->tgl_pesan }}</td>
                        <td>{{ $item->nm_pelanggan }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->total_harga }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
