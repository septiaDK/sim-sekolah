<?php

namespace App\Http\Controllers;

use App\Http\Requests\JurusanRequest;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

use File;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data Jurusan';

        if(request()->ajax()) {
            $query = Jurusan::query();

            return DataTables::of($query)
                    ->addIndexColumn()
                    ->addColumn('cover', function($item) {
                        if($item->cover != null) {
                            return '
                            <span class="font-base inline-block text-xs text-red-600">klik foto untuk memperbesar.</span>
                                <a href="'. url(Storage::url($item->cover)) .'" data-lightbox="image-'. $item->id .'">
                                    <img class="object-cover w-16 h-16 rounded" src="'. url(Storage::url($item->cover)) .'" alt="photo profil" loading="lazi">
                                </a>
                            ';
                        } else {
                            return '
                                <svg class="object-cover w-16 h-16 rounded text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            ';
                        }
                    })
                    ->addColumn('action', function($item){
                        return '
                        <a class="text-white px-2 py-2 rounded-md focus:outline-none focus:shadow-outline" 
                            href="' . route('jurusan.edit', $item->id) . '"
                            style="background-color: rgb(75 85 99); margin-right: 0.6rem; display: inline-block;"
                        >
                            Edit
                        </a>
                        <form action="'. route('jurusan.destroy', $item->id) .'" method="POST" style="display: inline-block;">
                        <button class="text-white px-2 py-2 rounded-md focus:outline-none focus:shadow-outline hapus" 
                            data-nama="'. $item->nama .'"
                            style="background-color: rgb(220 38 38);"
                        >
                            Hapus
                        </button>
                        ' . method_field('delete') . csrf_field() . '
                        </form>';
                    })
                    ->rawColumns(['cover', 'action'])
                    ->make();
        }

        return view('pages.backend.jurusan.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Data Jurusan';

        return view('pages.backend.jurusan.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JurusanRequest $request)
    {
        $data = $request->all();

        if(isset($data['cover'])) {
            $data['cover'] = $request->file('cover')->store(
                'assets/jurusan', 'public'
            );
        }

        $jurusan = Jurusan::create($data);

        return redirect()->route('jurusan')->with('success', 'Tambah Data');
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
        $title = 'Ubah Data Jurusan';
        $jurusan = Jurusan::where('id', $id)->first();

        return view('pages.backend.jurusan.edit', compact('title', 'jurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JurusanRequest $request, $id)
    {
        $data = $request->all();

        // delete old file from storage
        if(isset($data['cover'])) {
            $get_path_link = Jurusan::where('id', $id)->first();
            $path_file = 'storage/'. $get_path_link->cover;

            if(File::exists($path_file)) {
                File::delete($path_file);
            } else {
                File::delete('storage/app/public/'. $get_path_link->cover);
            }
        }

        // store file to storage
        if(isset($data['cover'])) {
            $data['cover'] = $request->file('cover')->store(
                'assets/jurusan', 'public'
            );
        }

        $jurusan = Jurusan::find($id);
        $jurusan->update($data);

        return redirect()->route('jurusan')->with('success', 'Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jurusan = Jurusan::where('id', $id)->first();
        if($jurusan) {

            // delete old file from storage
            if(isset($jurusan['cover'])) {
                $get_path_link = Jurusan::where('id', $id)->first();
                $path_file = 'storage/'. $get_path_link->cover;

                if(File::exists($path_file)) {
                    File::delete($path_file);
                } else {
                    File::delete('storage/app/public/'. $get_path_link->cover);
                }
            }

            $jurusan->delete();

            return redirect()->route('jurusan')->with('success', 'Hapus Data');;
        } else {
            return redirect()->route('jurusan')->with('error', 'Hapus Data');;
        }
    }
}
