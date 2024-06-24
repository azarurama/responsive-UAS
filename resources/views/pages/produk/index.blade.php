@extends('layout.app')

@section('title', 'List Produk')

@section('content')
<div class="card p-5">
    <div class="d-flex">
        <h1>Master Produk </h1>
        <a href="{{ route('produk.create') }}" class="ms-auto"><button class="btn btn-primary">Add produk</button></a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Satuan</th>
                <th>Harga</th>
                <th>Stock</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>B{{ str_pad($item->id, 4, '0', STR_PAD_LEFT)  }}</td>
                <td>{{ $item->nm_produk }}</td>
                <td>{{ $item->satuan }}</td>
                <td>{{ $item->harga }}</td>
                <td>{{ $item->stock }}</td>
                <td class="d-flex">
                    <a href="{{ route('produk.edit', $item->id) }}" class="ms-2"><button
                            class="btn btn-warning">Edit</button></a>
                    <form action="{{ route('produk.destroy', $item->id) }}" method="POST" class="ms-2">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
