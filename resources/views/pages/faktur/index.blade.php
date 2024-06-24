@extends('layout.app')

@section('title', 'List Faktur')

@section('content')
<div class="card p-5">
    <div class="d-flex">
        <h1>Faktur</h1>
        <a href="{{ route('faktur.create') }}" class="ms-auto"><button class="btn btn-primary">Add faktur</button></a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Id Faktur</th>
                <th>Id Pesan</th>
                <th>Tanggal</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->id_pesan }}</td>
                <td>{{ $item->tgl_faktur }}</td>
                <td>
                    <a href="{{ route('faktur.show', $item->id_pesan) }}"><button class="btn btn-info">Lihat faktur</button></a>
                </td>
                <td class="d-flex">
                    <form action="{{ route('faktur.destroy', $item->id) }}" method="POST" class="ms-2">
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
