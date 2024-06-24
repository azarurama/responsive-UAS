@extends('layout.app')

@section('title', 'Tambah Kuitansi')

@section('content')
<div class="card p-5">
    <div class="d-flex">
        <h1>Add kuitansi</h1>
    </div>
    <form action="{{ route('kuitansi.store') }}" method="POST">
        @csrf
        <p>ID Kuitansi <span>: {{ $lastId }}</span></p>
        <div class="form-group">
            <label for="id_faktur">Id Pesan</label>
            <select name="id_faktur" id="id_faktur" class="form-control" required>
                <option value="">Pilih id faktur</option>
                @foreach ($datafaktur as $item)
                    <option value="{{ $item->id }}">{{ $item->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tgl_kuitansi">Tanggal kuitansi</label>
            <input type="date" name="tgl_kuitansi" id="tgl_kuitansi" class="form-control" value="{{ $dateNow }}" required>
        </div>
        <button class="btn btn-primary" type="submit"> save</button>
    </form>
</div>
@endsection
