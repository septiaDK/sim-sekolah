<?php

namespace App\Http\Controllers;

use App\Models\IdentitasSekolah;
use Illuminate\Http\Request;

class IdentitasSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Profil Sekolah';
        $identitas_sekolah = IdentitasSekolah::get()->first();
        return view('backend.identitas_sekolah.index', compact('title', 'identitas_sekolah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Identitas Sekolah';
        return view('backend.identitas_sekolah.create', compact('title'));
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
        $identitas_sekolah = IdentitasSekolah::create($data);

        toast()->success('Tambah data berhasil.');
        return redirect()->route('identitas_sekolah');
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
        $title = 'Ubah Identitas Sekolah';
        $identitas_sekolah = IdentitasSekolah::get()->first();

        return view('backend.identitas_sekolah.edit', compact('title', 'identitas_sekolah'));
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
        $data = $request->all();

        $identitas_sekolah = IdentitasSekolah::where('id', $id)->first();
        $identitas_sekolah->update($data);

        toast()->success('Update data berhasil.');
        return redirect()->route('identitas_sekolah');
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
