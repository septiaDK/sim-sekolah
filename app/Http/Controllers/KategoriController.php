<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Data Kategori';
        $keyword = $request->get('keyword') ? $request->get('keyword') : '';

        if($keyword) {
            $kategoris = Kategori::where('nama', 'LIKE', "%$keyword%")->orderBy('nama', 'asc')->paginate(10);
        } else {
            $kategoris = Kategori::orderBy('nama', 'asc')->paginate(10);
        }
        return view('backend.kategori.index', compact('title', 'kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Data Kategori';
        return view('backend.kategori.create', compact('title'));
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
        
        // add to table kategori
        $kategori = Kategori::create($data);

        toast()->success('Tambah data berhasil.');
        return redirect()->route('kategori');
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
        $title = 'Ubah Data Kategori';
        $kategori = Kategori::where('id', $id)->first();
        return view('backend.kategori.edit', compact('title', 'kategori'));
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
        $data_kategori = $request->all();
        $kategori = Kategori::where('id', $id)->first();
        $kategori->update($data_kategori);

        toast()->success('Ubah data berhasil.');
        return redirect()->route('kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::where('id', $id)->first();
        if($kategori) {
            $kategori->delete();

            toast()->success('Hapus data berhasil.');
            return redirect()->route('kategori');
        } else {
            toast()->error('Hapus data gagal!');
            return redirect()->route('kategori');
        }
    }
}
