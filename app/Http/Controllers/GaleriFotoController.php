<?php

namespace App\Http\Controllers;

use App\Http\Requests\GaleriRequest;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

use File;

class GaleriFotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data Galeri Foto';

        if(request()->ajax()) {
            $query = Galeri::where('jenis', 'foto')->get();

            return DataTables::of($query)
                    ->addIndexColumn()
                    ->addColumn('photo', function($item) {
                        if($item->path_link != null) {
                            return '
                            <span class="font-base inline-block text-xs text-red-600">klik foto untuk memperbesar.</span>
                                <a href="'. url(Storage::url($item->path_link)) .'" data-lightbox="image-'. $item->id .'">
                                    <img class="object-cover w-16 h-16 rounded" src="'. url(Storage::url($item->path_link)) .'" alt="photo profil" loading="lazi">
                                </a>
                            ';
                        } else {
                            return '
                                <svg class="object-cover w-full h-full rounded text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            ';
                        }
                    })
                    ->addColumn('action', function($item){
                        return '
                        <a class="text-white px-2 py-2 rounded-md focus:outline-none focus:shadow-outline" 
                            href="' . route('galeri_video.edit', $item->id) . '"
                            style="background-color: rgb(75 85 99); margin-right: 0.6rem; display: inline-block;"
                        >
                            Edit
                        </a>
                        <form action="'. route('galeri_video.destroy', $item->id) .'" method="POST" style="display: inline-block;">
                        <button class="text-white px-2 py-2 rounded-md focus:outline-none focus:shadow-outline hapus" 
                            data-nama="'. $item->judul .'"
                            style="background-color: rgb(220 38 38);"
                        >
                            Hapus
                        </button>
                        ' . method_field('delete') . csrf_field() . '
                        </form>';
                    })
                    ->rawColumns(['photo', 'action'])
                    ->make();
        }

        return view('pages.backend.galeri_foto.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Galeri Foto';
        return view('pages.backend.galeri_foto.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GaleriRequest $request)
    {
        $data = $request->all();

        if(isset($data['path_link'])) {
            $data['path_link'] = $request->file('path_link')->store(
                'assets/galeri', 'public'
            );
        }

        $galeri_foto = Galeri::create($data);

        return redirect()->route('galeri_foto')->with('success', 'Tambah Data');
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
        $title = 'Ubah Data Galeri Foto';
        $galeri_foto = Galeri::where('id', $id)->first();

        return view('pages.backend.galeri_foto.edit', compact('title', 'galeri_foto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GaleriRequest $request, $id)
    {
        $data = $request->all();

        // delete old file from storage
        if(isset($data['path_link'])) {
            $get_path_link = Galeri::where('id', $id)->first();
            $path_file = 'storage/'. $get_path_link->path_link;

            if(File::exists($path_file)) {
                File::delete($path_file);
            } else {
                File::delete('storage/app/public/'. $get_path_link->path_link);
            }
        }

        // store file to storage
        if(isset($data['path_link'])) {
            $data['path_link'] = $request->file('path_link')->store(
                'assets/galeri', 'public'
            );
        }

        $galeri_foto = Galeri::find($id);
        $galeri_foto->update($data);

        return redirect()->route('galeri_foto')->with('success', 'Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galeri_foto = Galeri::where('id', $id)->first();
        if($galeri_foto) {

            // delete old file from storage
            if(isset($galeri_foto['path_link'])) {
                $get_path_link = Galeri::where('id', $id)->first();
                $path_file = 'storage/'. $get_path_link->path_link;

                if(File::exists($path_file)) {
                    File::delete($path_file);
                } else {
                    File::delete('storage/app/public/'. $get_path_link->path_link);
                }
            }

            $galeri_foto->delete();

            return redirect()->route('galeri_foto')->with('success', 'Hapus Data');
        } else {
            return redirect()->route('galeri_foto')->with('error', 'Hapus Data');
        }
    }
}
