<?php

namespace App\Http\Controllers;

use App\Models\FakturModel;
use App\Models\PesanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FakturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = FakturModel::all();

        return view('pages.faktur.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $itempesan = FakturModel::orderBy('id', 'desc')->first();
        $lastId = 1;

        if ($itempesan != null) {
            $lastId = $itempesan['id'];
            $lastId = $lastId + 1;
        }

        $datapesan = PesanModel::all();
        $dateNow = date("Y-m-d");

        return view('pages.faktur.create', compact('datapesan', 'lastId', 'dateNow'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        FakturModel::create($data);

        return redirect()->route('faktur.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataPelanggan = DB::table('faktur')
            ->join('pesan', 'faktur.id_pesan', '=', 'pesan.id')
            ->join('detil_pesan', 'pesan.id', '=', 'detil_pesan.id_pesan')
            ->join('pelanggan', 'pesan.id_pelanggan', '=', 'pelanggan.id')
            ->select(DB::raw('pesan.id as id_pesan'), 'pesan.tgl_pesan', DB::raw('pelanggan.id AS id_pelanggan'), 'pelanggan.nm_pelanggan')
            ->where('faktur.id_pesan', $id)
            ->groupBy('pesan.id', 'pesan.tgl_pesan', 'pelanggan.id', 'pelanggan.nm_pelanggan')
            ->first();

        $data = DB::table('faktur')
            ->join('pesan', 'faktur.id_pesan', '=', 'pesan.id')
            ->join('detil_pesan', 'pesan.id', '=', 'detil_pesan.id_pesan')
            ->join('pelanggan', 'pesan.id_pelanggan', '=', 'pelanggan.id')
            ->join('produk', 'detil_pesan.id_produk', '=', 'produk.id')
            ->select('produk.id', 'produk.nm_produk', DB::raw('sum(detil_pesan.jumlah) as jumlah'), DB::raw('sum(detil_pesan.harga) as harga'))
            ->where('faktur.id_pesan', $id)
            ->groupBy('produk.id', 'produk.nm_produk')
            ->get()
            ->toArray();

        // dd($dataPelanggan, $data);

        return view('pages.faktur.show', compact('data', 'dataPelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = FakturModel::findOrFail($id);

        $item->delete();

        return redirect()->route('faktur.index');
    }
}