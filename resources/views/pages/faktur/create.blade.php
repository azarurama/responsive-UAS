@extends('layout.app')

@section('title', 'Tambah Faktur')

@section('content')
<div class="card p-5">
    <div class="d-flex">
        <h1>Add faktur</h1>
    </div>
    <form action="{{ route('faktur.store') }}" method="POST">
        @csrf
        <p>ID Faktur <span>: {{ $lastId }}</span></p>
        <div class="form-group">
            <label for="id_pesan">Id Pesan</label>
            <select name="id_pesan" id="id_pesan" class="form-control" required>
                <option value="">Pilih id pesan</option>
                @foreach ($datapesan as $item)
                    <option value="{{ $item->id }}">{{ $item->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tgl_faktur">Tanggal faktur</label>
            <input type="date" name="tgl_faktur" id="tgl_faktur" class="form-control" value="{{ $dateNow }}" required>
        </div>
        <button class="btn btn-primary" type="submit"> save</button>
    </form>
</div>
@endsection
