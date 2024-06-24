@extends('layout.app')

@section('title', 'Per-Pelanggan')

@section('content')
    <div class="card p-5">
        <div class="d-flex">
            <h1>Laporan per pelanggan</h1>
            <a href="{{ route('pelanggan.create') }}" class="ms-auto"><button class="btn btn-primary">Add
                    pelanggan</button></a>
        </div>
        <div class="my-4">
            <form action="{{ route('lap-perpelanggan', $idpelanggan) }}" method="GET">
                @csrf
                <div class="form-group">
                    <label for="id_pelanggan">Pelanggan</label>
                    <select name="id_pelanggan" id="id_pelanggan" class="form-control">
                        <option value="">pilih pelanggan</option>
                        @foreach ($datapelanggan as $item)
                            <option value="{{ $item->id }}">{{ $item->nm_pelanggan }}</option>
                        @endforeach
                    </select>
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
