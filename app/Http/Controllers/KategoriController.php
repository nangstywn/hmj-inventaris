<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Kategori;
use App\Models\Inventaris;
use Session;
use Alert;


class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Kategori::orderBy('id', 'desc')->paginate();
        return view('kategori.kategori', compact('categories'));
        // return response()->json($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Kategori::pluck('nama_kategori', 'id')->all();
        return view('kategori.kategori-create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "nama_kategori" => "required"
        ]);
        //$data = $request->only('nama'); 
        $data = ['nama_kategori' => $request->nama_kategori];
        Kategori::create($data);
        Session::flash("status", 1);
        alert()->success('Success', 'Berhasil menambahkan data ' . $request->nama_kategori . '')->persistent($showConfirmBtn = false);
        return redirect()->route('admin-category.index')->with('toast_success', 'Berhasi menambahkan data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Kategori::find($id);
        //$categoriess = Kategori::pluck('nama_kategori', 'id')->all();
        return view("kategori.kategori-show", compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Kategori::find($id);
        //$categoriess = Kategori::pluck('nama_kategori', 'id')->all();
        return view("kategori.kategori-edit", compact('categories'));
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
        $this->validate(
            $request,
            [
                "nama_kategori" => "required"

            ]
        );

        $categories = Kategori::find($id);
        $categories->update($request->all());
        //$data = ['nama_kategori' => $request->nama_kategori];
        //$categories->update($data);

        Session::flash("status", 1);
        return redirect()->route('admin-category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Kategori::findOrFail($id);
        $inventaris = Inventaris::all();
        foreach ($inventaris as $invent) {
            if ($invent->id_kategori == $categories->id) {
                return back()->with('toast_error', 'Gagal menghapus data, <br> ' . $categories->nama_kategori . ' masih memiliki relasi');
            }
        }
        $categories->delete();
        return back()->with('toast_success', 'Data Berhasil Dihapus!');
    }
}