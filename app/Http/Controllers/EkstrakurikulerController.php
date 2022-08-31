<?php

namespace App\Http\Controllers;

use App\Http\Requests\EkstrakurikulerRequest;
use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EkstrakurikulerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data Ekstrakurikuler';

        if(request()->ajax()) {
            $query = Ekstrakurikuler::query();

            return DataTables::of($query)
                    ->addIndexColumn()
                    ->addColumn('action', function($item){
                        return '
                        <a class="text-white px-2 py-2 rounded-md focus:outline-none focus:shadow-outline" 
                            href="' . route('ekstrakurikuler.edit', $item->id) . '"
                            style="background-color: rgb(75 85 99); margin-right: 0.6rem; display: inline-block;"
                        >
                            Edit
                        </a>
                        <form action="'. route('ekstrakurikuler.destroy', $item->id) .'" method="POST" style="display: inline-block;">
                        <button class="text-white px-2 py-2 rounded-md focus:outline-none focus:shadow-outline hapus" 
                            data-nama="'. $item->nama .'"
                            style="background-color: rgb(220 38 38);"
                        >
                            Hapus
                        </button>
                        ' . method_field('delete') . csrf_field() . '
                        </form>';
                    })
                    ->rawColumns(['action'])
                    ->make();
        }

        return view('pages.backend.ekstrakurikuler.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Data Ekstrakurikuler';

        return view('pages.backend.ekstrakurikuler.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EkstrakurikulerRequest $request)
    {
        $data = $request->all();

        $ekstra = Ekstrakurikuler::create($data);

        return redirect()->route('ekstrakurikuler')->with('success', 'Tambah Data');
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
        $title = 'Ubah Data Ekstrakurikuler';
        $ekstra = Ekstrakurikuler::where('id', $id)->first();

        return view('pages.backend.ekstrakurikuler.edit', compact('title', 'ekstra'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EkstrakurikulerRequest $request, $id)
    {
        $data = $request->all();
        $ekstra = Ekstrakurikuler::find($id);
        $ekstra->update($data);

        return redirect()->route('ekstrakurikuler')->with('success', 'Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ekstra = Ekstrakurikuler::where('id', $id)->first();
        if($ekstra) {
            $ekstra->delete();

            return redirect()->route('ekstrakurikuler')->with('success', 'Hapus Data');;
        } else {
            return redirect()->route('ekstrakurikuler')->with('error', 'Hapus Data');;
        }
    }
}
