<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostinganRequest;
use App\Models\Kategori;
use App\Models\Postingan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

use File;

class PostinganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Daftar Postingan';

        if(request()->ajax()) {
            $query = Postingan::query();

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
                            href="' . route('postingan.edit', $item->id) . '"
                            style="background-color: rgb(75 85 99); margin-right: 0.6rem; display: inline-block;"
                        >
                            Edit
                        </a>
                        <form action="'. route('postingan.destroy', $item->id) .'" method="POST" style="display: inline-block;">
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

        return view('pages.backend.postingan.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Data Postingan';
        $categories = Kategori::all();

        return view('pages.backend.postingan.create', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostinganRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        if(isset($data['cover'])) {
            $data['cover'] = $request->file('cover')->store(
                'assets/postingan', 'public'
            );
        }

        $postingan = Postingan::create($data);
        $postingan->categories()->attach($request->get("kategori_id"));


        return redirect()->route('postingan')->with('success', 'Tambah Data');
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
        $title = 'Ubah Data Postingan';
        $postingan = Postingan::where('id', $id)->first();
        $categories = Kategori::all();

        return view('pages.backend.postingan.edit', compact('title', 'postingan', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostinganRequest $request, $id)
    {
        $data = $request->all();

        // delete old file from storage
        if(isset($data['cover'])) {
            $get_path_link = Postingan::where('id', $id)->first();
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
                'assets/postingan', 'public'
            );
        }

        $postingan = Postingan::find($id);
        $postingan->update($data);
        $postingan->categories()->sync($request->get("kategori_id"));

        return redirect()->route('postingan')->with('success', 'Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postingan = Postingan::where('id', $id)->first();
        if($postingan) {

            // delete old file from storage
            if(isset($postingan['cover'])) {
                $get_path_link = Postingan::where('id', $id)->first();
                $path_file = 'storage/'. $get_path_link->cover;

                if(File::exists($path_file)) {
                    File::delete($path_file);
                } else {
                    File::delete('storage/app/public/'. $get_path_link->cover);
                }
            }

            $postingan->categories()->detach();
            $postingan->delete();
            return redirect()->route('postingan')->with('success', 'Hapus Data');;
        } else {
            return redirect()->route('postingan')->with('error', 'Hapus Data');;
        }
    }
}
