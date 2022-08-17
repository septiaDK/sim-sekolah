<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileDownloadRequest;
use App\Models\FileDownload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

use File;
class FileDownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data File Download';

        if(request()->ajax()) {
            $query = FileDownload::query();

            return DataTables::of($query)
                    ->addIndexColumn()
                    ->addColumn('path_link', function($item){
                        return '
                        <form method="get" action="'. url(Storage::url($item->path_link)) .'">
                            <button type="submit" class="text-blue-500">
                                Download File
                            </button>
                        </form>';
                    })
                    ->addColumn('action', function($item){
                        return '
                        <a class="text-white px-2 py-2 rounded-md focus:outline-none focus:shadow-outline" 
                            href="' . route('file_download.edit', $item->id) . '"
                            style="background-color: rgb(75 85 99); margin-right: 0.6rem; display: inline-block;"
                        >
                            Edit
                        </a>
                        <form action="'. route('file_download.destroy', $item->id) .'" method="POST" style="display: inline-block;">
                        <button class="text-white px-2 py-2 rounded-md focus:outline-none focus:shadow-outline hapus" 
                            data-nama="'. $item->nama .'"
                            style="background-color: rgb(220 38 38);"
                        >
                            Hapus
                        </button>
                        ' . method_field('delete') . csrf_field() . '
                        </form>';
                    })
                    ->rawColumns(['path_link', 'action'])
                    ->make();
        }

        return view('pages.backend.file_download.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Data File Download';

        return view('pages.backend.file_download.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FileDownloadRequest $request)
    {
        $data = $request->all();

        if(isset($data['path_link'])) {
            $data['path_link'] = $request->file('path_link')->store(
                'assets/file_download', 'public'
            );
        }

        $file_download = FileDownload::create($data);

        toast()->success('Tambah data berhasil.');
        return redirect()->route('file_download');
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
        $title = 'Ubah Data File Download';
        $file_download = FileDownload::where('id', $id)->first();

        return view('pages.backend.file_download.edit', compact('title', 'file_download'));
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
        if(isset($data['path_link'])) {
            $get_path_link = FileDownload::where('id', $id)->first();
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
                'assets/file_download', 'public'
            );
        }

        $file_download = FileDownload::find($id);
        $file_download->update($data);

        toast()->success('Update data berhasil.');
        return redirect()->route('file_download');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file_download = FileDownload::where('id', $id)->first();
        if($file_download) {

            // delete old file from storage
            if(isset($file_download['path_link'])) {
                $get_path_link = FileDownload::where('id', $id)->first();
                $path_file = 'storage/'. $get_path_link->path_link;

                if(File::exists($path_file)) {
                    File::delete($path_file);
                } else {
                    File::delete('storage/app/public/'. $get_path_link->path_link);
                }
            }

            $file_download->delete();

            toast()->success('Hapus data berhasil.');
            return redirect()->route('file_download');
        } else {
            toast()->error('Hapus data gagal');
            return redirect()->route('file_download');
        }
    }
}
