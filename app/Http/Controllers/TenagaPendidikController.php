<?php

namespace App\Http\Controllers;

use App\Http\Requests\TenagaPendidikRequest;
use App\Models\TenagaPendidik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

use File;

class TenagaPendidikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data Tenaga Pendidik dan Staff Karyawan';

        if(request()->ajax()) {
            $query = TenagaPendidik::query();

            return DataTables::of($query)
                    ->addIndexColumn()
                    ->addColumn('status', function($item) {
                        if($item->status == 'kepala_sekolah') {
                            return 'Kepala Sekolah';
                        } else if($item->status == 'guru') {
                            return 'Guru';
                        } else if($item->status == 'staff karyawan') {
                            return 'Staff Karyawan';
                        } else {
                            return '';
                        }
                    })
                    ->addColumn('photo', function($item) {
                        if($item->photo != null) {
                            return '
                            <span class="font-base inline-block text-xs text-red-600">klik foto untuk memperbesar.</span>
                                <a href="'. url(Storage::url($item->photo)) .'" data-lightbox="image-'. $item->id .'">
                                    <img class="object-cover w-16 h-16 rounded" src="'. url(Storage::url($item->photo)) .'" alt="photo profil" loading="lazi">
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
                            href="' . route('tenaga_pendidik.edit', $item->id) . '"
                            style="background-color: rgb(75 85 99); margin-right: 0.6rem; display: inline-block;"
                        >
                            Edit
                        </a>
                        <form action="'. route('tenaga_pendidik.destroy', $item->id) .'" method="POST" style="display: inline-block;">
                        <button class="text-white px-2 py-2 rounded-md focus:outline-none focus:shadow-outline hapus" 
                            data-nama="'. $item->nama .'"
                            style="background-color: rgb(220 38 38);"
                        >
                            Hapus
                        </button>
                        ' . method_field('delete') . csrf_field() . '
                        </form>';
                    })
                    ->rawColumns(['status', 'photo', 'action'])
                    ->make();
        }

        return view('pages.backend.tenaga_pendidik.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Data Tenaga Pendidik dan Staff Karyawan';

        return view('pages.backend.tenaga_pendidik.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TenagaPendidikRequest $request)
    {
        $data = $request->all();

        if(isset($data['photo'])) {
            $data['photo'] = $request->file('photo')->store(
                'assets/tenaga_pendidik', 'public'
            );
        }

        $tenaga_pendidik = TenagaPendidik::create($data);

        return redirect()->route('tenaga_pendidik')->with('success', 'Tambah Data');
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
        $title = 'Ubah Data Tenaga Pendidik dan Staff Karyawan';
        $tenaga_pendidik = TenagaPendidik::where('id', $id)->first();

        return view('pages.backend.tenaga_pendidik.edit', compact('title', 'tenaga_pendidik'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TenagaPendidikRequest $request, $id)
    {
        $data = $request->all();

        // delete old file from storage
        if(isset($data['photo'])) {
            $get_path_link = TenagaPendidik::where('id', $id)->first();
            $path_file = 'storage/'. $get_path_link->photo;

            if(File::exists($path_file)) {
                File::delete($path_file);
            } else {
                File::delete('storage/app/public/'. $get_path_link->photo);
            }
        }

        // store file to storage
        if(isset($data['photo'])) {
            $data['photo'] = $request->file('photo')->store(
                'assets/tenaga_pendidik', 'public'
            );
        }

        $tenaga_pendidik = TenagaPendidik::find($id);
        $tenaga_pendidik->update($data);

        return redirect()->route('tenaga_pendidik')->with('success', 'Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tenaga_pendidik = TenagaPendidik::where('id', $id)->first();
        if($tenaga_pendidik) {

            // delete old file from storage
            if(isset($tenaga_pendidik['photo'])) {
                $get_path_link = TenagaPendidik::where('id', $id)->first();
                $path_file = 'storage/'. $get_path_link->photo;

                if(File::exists($path_file)) {
                    File::delete($path_file);
                } else {
                    File::delete('storage/app/public/'. $get_path_link->photo);
                }
            }

            $tenaga_pendidik->delete();

            return redirect()->route('tenaga_pendidik')->with('success', 'Hapus Data');
        } else {
            return redirect()->route('tenaga_pendidik')->with('error', 'Hapus Data');
        }
    }
}
