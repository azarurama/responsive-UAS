@extends('layout.app')

@section('title', 'Entry Penjualan')

@section('content')
<div class="card p-5">
    <div class="d-flex">
        <h1>Entry penjualan </h1>
    </div>
    <form action="{{ route('simpan-pesan') }}" method="POST">
        @csrf
        <p>ID Pesan <span class="ps-5">: {{ $lastId }}</span></p>
        <input type="number" name="id_pesan" id="id_pesan" value="{{ $lastId }}" hidden>
        <div class="form-group">
            <label for="id_pelanggan">Pelanggan</label>
            <select name="id_pelanggan" id="id_pelanggan" class="form-control" required>
                <option value="">Pilih pelanggan</option>
                @foreach ($listPelanggan as $item)
                    <option value="{{ $item->id }}">{{ $item->nm_pelanggan }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tgl_pesan">Tanggal Pesan</label>
            <input type="date" name="tgl_pesan" id="tgl_pesan" value="{{ $dateNow }}" class="form-control" required>
        </div>
        <button class="btn btn-primary" type="submit"> save</button>
    </form>
</div>
@endsection
