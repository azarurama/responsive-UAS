<?php

namespace App\Http\Controllers;

use App\Models\PelangganModel;
use App\Models\ProdukModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function tanggal()
    {
        $tanggalAwal = now();
        $tanggalAkhir = now();

        $data = DB::table('pesan')
            ->join('pelanggan', 'pesan.id_pelanggan', '=', 'pelanggan.id')
            ->join('detil_pesan', 'pesan.id', '=', 'detil_pesan.id_pesan')
            ->select('pesan.id', 'pesan.tgl_pesan', 'pelanggan.nm_pelanggan', DB::raw('sum(detil_pesan.jumlah) AS jumlah'), DB::raw('sum(detil_pesan.harga) as total_harga'))
            ->whereBetween('pesan.tgl_pesan', [$tanggalAwal, $tanggalAkhir])
            ->groupBy('pesan.id', 'pesan.tgl_pesan', 'pelanggan.nm_pelanggan')
            ->get()
            ->toArray();

        return view('pages.laporan.pertanggal', compact('data', 'tanggalAwal', 'tanggalAkhir'));
    }
    public function laporanPertanggal(Request $request, $tanggalAwal, $tanggalAkhir)
    {
        $tanggalAwal = $request->tanggalAwal;
        $tanggalAkhir = $request->tanggalAkhir;

        $data = DB::table('pesan')
            ->join('pelanggan', 'pesan.id_pelanggan', '=', 'pelanggan.id')
            ->join('detil_pesan', 'pesan.id', '=', 'detil_pesan.id_pesan')
            ->select('pesan.id', 'pesan.tgl_pesan', 'pelanggan.nm_pelanggan', DB::raw('sum(detil_pesan.jumlah) AS jumlah'), DB::raw('sum(detil_pesan.harga) as total_harga'))
            ->whereBetween('pesan.tgl_pesan', [$tanggalAwal, $tanggalAkhir])
            ->groupBy('pesan.id', 'pesan.tgl_pesan', 'pelanggan.nm_pelanggan')
            ->get()
            ->toArray();

        return view('pages.laporan.pertanggal', compact('data', 'tanggalAwal', 'tanggalAkhir'));
    }

    public function pelanggan()
    {
        $idpelanggan = 0;
        $datapelanggan = PelangganModel::all();

        $data = DB::table('pesan')
            ->join('pelanggan', 'pesan.id_pelanggan', '=', 'pelanggan.id')
            ->join('detil_pesan', 'pesan.id', '=', 'detil_pesan.id_pesan')
            ->select('pesan.id', 'pesan.tgl_pesan', 'pelanggan.nm_pelanggan', DB::raw('sum(detil_pesan.jumlah) AS jumlah'), DB::raw('sum(detil_pesan.harga) as total_harga'))
            ->where('pesan.id_pelanggan', $idpelanggan)
            ->groupBy('pelanggan.nm_pelanggan', 'pesan.tgl_pesan', 'pesan.id')
            ->get()
            ->toArray();

        return view('pages.laporan.perpelanggan', compact('data', 'datapelanggan', 'idpelanggan'));
    }

    public function laporanPerpelanggan(Request $request, $idpelanggan)
    {
        $idpelanggan = $request->id_pelanggan;

        $datapelanggan = PelangganModel::all();

        $data = DB::table('pesan')
            ->join('pelanggan', 'pesan.id_pelanggan', '=', 'pelanggan.id')
            ->join('detil_pesan', 'pesan.id', '=', 'detil_pesan.id_pesan')
            ->select('pesan.id', 'pesan.tgl_pesan', 'pelanggan.nm_pelanggan', DB::raw('sum(detil_pesan.jumlah) AS jumlah'), DB::raw('sum(detil_pesan.harga) as total_harga'))
            ->where('pesan.id_pelanggan', $idpelanggan)
            ->groupBy('pesan.tgl_pesan', 'pelanggan.nm_pelanggan', 'pesan.id')
            ->get()
            ->toArray();

        return view('pages.laporan.perpelanggan', compact('data', 'datapelanggan', 'idpelanggan'));
    }

    public function produk()
    {
        $idproduk = 0;
        $dataproduk = ProdukModel::all();

        $data = DB::table('pesan')
            ->join('pelanggan', 'pesan.id_pelanggan', '=', 'pelanggan.id')
            ->join('detil_pesan', 'pesan.id', '=', 'detil_pesan.id_pesan')
            ->join('produk', 'detil_pesan.id_produk', '=', 'produk.id')
            ->select('pesan.id', 'pesan.tgl_pesan', 'pelanggan.nm_pelanggan', DB::raw('sum(detil_pesan.jumlah) AS jumlah'), DB::raw('sum(detil_pesan.harga) as total_harga'))
            ->where('detil_pesan.id_produk', $idproduk)
            ->groupBy('produk.id', 'pelanggan.nm_pelanggan', 'pesan.id', 'pesan.tgl_pesan')
            ->get()
            ->toArray();

        return view('pages.laporan.perproduk', compact('idproduk', 'dataproduk', 'data'));
    }

    public function laporanPerproduk(Request $request, $idproduk)
    {
        $idproduk = $request->id_produk;
        $dataproduk = ProdukModel::all();

        $data = DB::table('pesan')
            ->join('pelanggan', 'pesan.id_pelanggan', '=', 'pelanggan.id')
            ->join('detil_pesan', 'pesan.id', '=', 'detil_pesan.id_pesan')
            ->join('produk', 'detil_pesan.id_produk', '=', 'produk.id')
            ->select('pesan.id', 'pesan.tgl_pesan', 'pelanggan.nm_pelanggan', DB::raw('sum(detil_pesan.jumlah) AS jumlah'), DB::raw('sum(detil_pesan.harga) as total_harga'))
            ->where('detil_pesan.id_produk', $idproduk)
            ->groupBy('produk.id', 'pelanggan.nm_pelanggan', 'pesan.id', 'pesan.tgl_pesan')
            ->get()
            ->toArray();

        return view('pages.laporan.perproduk', compact('idproduk', 'dataproduk', 'data'));
    }
}