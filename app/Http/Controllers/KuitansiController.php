<?php

namespace App\Http\Controllers;

use App\Models\FakturModel;
use App\Models\KuitansiModel;
use Illuminate\Http\Request;

class KuitansiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = KuitansiModel::all();

        return view('pages.kuitansi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $itempesan = KuitansiModel::orderBy('id', 'desc')->first();
        $lastId = 1;

        if ($itempesan != null) {
            $lastId = $itempesan['id'];
            $lastId = $lastId + 1;
        }

        $datafaktur = FakturModel::all();
        $dateNow = date("Y-m-d");

        return view('pages.kuitansi.create', compact('datafaktur', 'lastId', 'dateNow'));
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

        KuitansiModel::create($data);

        return redirect()->route('kuitansi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}