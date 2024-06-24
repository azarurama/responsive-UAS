<?php

namespace App\Http\Controllers;

use App\Models\DetilpesanModel;
use App\Models\PelangganModel;
use App\Models\PesanModel;
use App\Models\ProdukModel;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function entrypenjualan()
    {
        $itempesan = PesanModel::orderBy('id', 'desc')->first();
        $lastId = 1;

        if ($itempesan != null) {
            $lastId = $itempesan['id'];
            $lastId = $lastId + 1;
        }

        $listPelanggan = PelangganModel::all();
        $dateNow = date("Y-m-d");

        return view('pages.penjualan.entrypenjualan', compact('lastId', 'listPelanggan', 'dateNow'));
    }

    public function simpanpesan(Request $request)
    {
        $data = $request->all();

        PesanModel::create($data);

        return redirect()->route('entry-detil-pesan', $data['id_pesan'])->with([
            'id_pesan' => $data['id_pesan']
        ]);
    }

    public function entrydetilpesan($id_pesan)
    {
        $listpesanan = DetilpesanModel::where('id_pesan', $id_pesan)->get();
        $produk = ProdukModel::all();

        return view('pages.penjualan.entrydetil', compact('id_pesan', 'produk', 'listpesanan'));
    }

    public function simpandetil(Request $request)
    {
        $produk = ProdukModel::all();
        $dataDetil = $request->all();
        $itemProduk = [];
        $itemProduk = ProdukModel::findOrFail($dataDetil['id_produk']);

        $totalHarga = $dataDetil['jumlah'] * $itemProduk['harga'];

        DetilpesanModel::create([
            'id_pesan' => $dataDetil['id_pesan'],
            'id_produk' => $dataDetil['id_produk'],
            'jumlah' => $dataDetil['jumlah'],
            'harga' => $totalHarga
        ]);

        $stock = $itemProduk['stock'] - $dataDetil['jumlah'];

        $itemProduk->update(['stock' => $stock]);

        return redirect()->route('entry-detil-pesan', $dataDetil['id_pesan'])->with([
            'produk' => $produk,
        ]);
    }

    public function deleteDetilpesan($id)
    {
        $itemDetil = DetilpesanModel::findOrFail($id);

        $itemProduk = ProdukModel::where('id', $itemDetil['id_produk'])->first();

        $stock = $itemProduk['stock'] + $itemDetil['jumlah'];
        $itemProduk->update(['stock' => $stock]);

        $itemDetil->delete();

        return redirect()->route('entry-detil-pesan', $itemDetil['id_pesan']);
    }
}