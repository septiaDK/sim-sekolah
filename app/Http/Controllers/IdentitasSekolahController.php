<?php

namespace App\Http\Controllers;

use App\Http\Requests\IdentitasSekolahRequest;
use App\Models\IdentitasSekolah;
use Illuminate\Http\Request;

use File;

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

        return view('pages.backend.identitas_sekolah.index', compact('title', 'identitas_sekolah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Identitas Sekolah';
        return view('pages.backend.identitas_sekolah.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IdentitasSekolahRequest $request)
    {
        $data = $request->all();
        // store file to storage
        if(isset($data['struktur_organisasi'])) {
            $data['struktur_organisasi'] = $request->file('struktur_organisasi')->store(
                'assets/struktur_organisasi', 'public'
            );
        }

        $identitas_sekolah = IdentitasSekolah::create($data);

        return redirect()->route('identitas_sekolah')->with('success', 'Tambah Data');
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

        return view('pages.backend.identitas_sekolah.edit', compact('title', 'identitas_sekolah'));
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

        // delete old file from storage
        if(isset($data['struktur_organisasi'])) {
            $get_path_link = IdentitasSekolah::where('id', $id)->first();
            $path_file = 'storage/'. $get_path_link->struktur_organisasi;

            if(File::exists($path_file)) {
                File::delete($path_file);
            } else {
                File::delete('storage/app/public/'. $get_path_link->struktur_organisasi);
            }
        }

        // store file to storage
        if(isset($data['struktur_organisasi'])) {
            $data['struktur_organisasi'] = $request->file('struktur_organisasi')->store(
                'assets/struktur_organisasi', 'public'
            );
        }

        $identitas_sekolah = IdentitasSekolah::find($id);
        $identitas_sekolah->update($data);

        return redirect()->route('identitas_sekolah')->with('success', 'Update Data');
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
