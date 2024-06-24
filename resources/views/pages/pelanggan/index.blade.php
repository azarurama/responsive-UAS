@extends('layout.app')

@section('title', 'List Pelanggan')

@section('content')
<div class="card p-5">
    <div class="d-flex">
        <h1>Master Pelanggan </h1>
        <a href="{{ route('pelanggan.create') }}" class="ms-auto"><button class="btn btn-primary">Add pelanggan</button></a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pelanggan</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Email</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>P{{ str_pad($item->id, 4, '0', STR_PAD_LEFT)  }}</td>
                <td>{{ $item->nm_pelanggan }}</td>
                <td>{{ Str::limit($item->alamat, 30, '...') }}</td>
                <td>{{ $item->telepon }}</td>
                <td>{{ $item->email }}</td>
                <td class="d-flex">
                    <a href="{{ route('pelanggan.edit', $item->id) }}" class="ms-2"><button
                            class="btn btn-warning">Edit</button></a>
                    <form action="{{ route('pelanggan.destroy', $item->id) }}" method="POST" class="ms-2">
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
