@extends('layout.app')

@section('title', 'List Kuitansi')

@section('content')
    <div class="card p-5">
        <div class="d-flex">
            <h1>Kuitansi</h1>
            <a href="{{ route('kuitansi.create') }}" class="ms-auto"><button class="btn btn-primary">Add
                    kuitansi</button></a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Id kuitansi</th>
                    <th>Id faktur</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->id_faktur }}</td>
                        <td>{{ $item->tgl_kuitansi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
