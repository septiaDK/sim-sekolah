<?php

namespace App\Http\Controllers;

use App\Http\Requests\GaleriRequest;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class GaleriVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data Galeri Video';

        if(request()->ajax()) {
            $query = Galeri::where('jenis', 'video')->get();

            return DataTables::of($query)
                    ->addIndexColumn()
                    ->addColumn('video', function($item) {
                        if($item->path_link != null) {
                            return '
                            <span class="font-base inline-block text-xs text-red-600">klik video untuk memperbesar.</span>
                            <div class="w-full lg:w-1/2 text-center justify-center flex lg:mb-0 mb-12">
                                <a href="'.url($item->path_link).'" data-lity>
                                    <img id="hero" src="'.asset("/assets/video-placeholder.png").'" alt=""
                                        class="p-5" />
                                </a>
                            </div>
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
                    ->rawColumns(['video', 'action'])
                    ->make();
        }

        return view('pages.backend.galeri_video.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Galeri Video';
        return view('pages.backend.galeri_video.create', compact('title'));
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
        $galeri_foto = Galeri::create($data);

        return redirect()->route('galeri_video')->with('success', 'Tambah Data');
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
        $title = 'Ubah Data Galeri Video';
        $galeri_video = Galeri::where('id', $id)->first();

        return view('pages.backend.galeri_video.edit', compact('title', 'galeri_video'));
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

        $galeri_video = Galeri::find($id);
        $galeri_video->update($data);

        return redirect()->route('galeri_video')->with('success', 'Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galeri_video = Galeri::where('id', $id)->first();
        if($galeri_video) {
            $galeri_video->delete();

            return redirect()->route('galeri_video')->with('success', 'Hapus Data');
        } else {
            return redirect()->route('galeri_video')->with('error', 'Hapus Data');
        }
    }
}