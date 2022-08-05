<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Visi Misi';
        // check data visi misi
        $visi_misi = VisiMisi::get()->first();

        return view('backend.visi_misi.index', compact('title', 'visi_misi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Visi Misi';
        return view('backend.visi_misi.create', compact('title'));
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
        // add to visi misi
        $visi_misi = VisiMisi::create($data);

        toast()->success('Tambah data berhasil.');
        return  redirect()->route('visi_misi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Ubah Visi Misi';
        $visi_misi = VisiMisi::where('id', $id)->first();
        return view('backend.visi_misi.edit', compact('title', 'visi_misi'));
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
        $data_visi_misi = $request->all();
        $visi_misi = VisiMisi::where('id', $id)->first();
        $visi_misi->update($data_visi_misi);

        toast()->success('Update data berhasil.');
        return redirect()->route('visi_misi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort(404);
    }
}
