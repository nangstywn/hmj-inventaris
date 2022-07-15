<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use App\Http\Requests;
use App\Models\Kategori;
use App\Models\Inventaris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Kategori::all();
        if (auth()->user()->level != 'user') {
            $inventory = Inventaris::where('id_user', auth()->user()->id)->orderBy('id', 'desc')->paginate(10);
        } elseif (auth()->user()->level == 'user') {
            if (Route::is('ti.index')) {
                $invent = Inventaris::whereHas('user', function ($q) {
                    $q->where('level', '=', 'admin-ti');
                })->get();
                if (!$invent->isEmpty()) {
                    foreach ($invent as $inven) {
                        $id = $inven->user->id;
                    }
                } else {
                    $id = null;
                }
                $inventory = Inventaris::where('id_user', $id)->orderBy('id', 'desc')->paginate(10);
            } elseif (Route::is('si.index')) {
                $invent = Inventaris::whereHas('user', function ($q) {
                    $q->where('level', '=', 'admin-si');
                })->get();
                if (!$invent->isEmpty()) {
                    foreach ($invent as $inven) {
                        $id = $inven->user->id;
                    }
                } else {
                    $id = null;
                }
                $inventory = Inventaris::where('id_user', $id)->orderBy('id', 'desc')->paginate(10);
            } elseif (Route::is('tk.index')) {
                $invent = Inventaris::whereHas('user', function ($q) {
                    $q->where('level', '=', 'admin-tk');
                })->get();
                if (!$invent->isEmpty()) {
                    foreach ($invent as $inven) {
                        $id = $inven->user->id;
                    }
                } else {
                    $id = null;
                }
                $inventory = Inventaris::where('id_user', $id)->orderBy('id', 'desc')->paginate(10);
            } elseif (Route::is('mi.index')) {
                $invent = Inventaris::whereHas('user', function ($q) {
                    $q->where('level', '=', 'admin-mi');
                })->get();
                if (!$invent->isEmpty()) {
                    foreach ($invent as $inven) {
                        $id = $inven->user->id;
                    }
                } else {
                    $id = null;
                }
                $inventory = Inventaris::where('id_user', $id)->orderBy('id', 'desc')->paginate(10);
            } elseif (Route::is('ka.index')) {
                $invent = Inventaris::whereHas('user', function ($q) {
                    $q->where('level', '=', 'admin-ka');
                })->get();
                if (!$invent->isEmpty()) {
                    foreach ($invent as $inven) {
                        $id = $inven->user->id;
                    }
                } else {
                    $id = null;
                }
                $inventory = Inventaris::where('id_user', $id)->orderBy('id', 'desc')->paginate(10);
            }
        }
        return view('inventaris.invent', compact('inventory', 'categories'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Kategori::all();
        $inventory = Inventaris::all(); //->sortBy('nama_kategori', SORT_NATURAL | SORT_FLAG_CASE)->pluck('nama_kategori', 'id');
        return view('inventaris.invent-create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate(
            $request,
            [
                "nama" => "required",
                "jumlah" => "required",
                "satuan" => "required",
                "kondisi" => "required",
                "id_kategori" => "required"
            ]
        );

        //$input = $request->only('nama', 'jumlah', 'satuan', 'kondisi', 'id_kategori','id_user');
        $input['id_user'] = Auth::user()->id;
        $input['nama'] = $request['nama'];
        $input['jumlah'] = $request['jumlah'];
        $input['satuan'] = $request['satuan'];
        $input['kondisi'] = $request['kondisi'];
        $input['id_kategori'] = $request['id_kategori'];
        Inventaris::create($input);
        return back()
            ->with('toast_success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Kategori::all();
        $inventory = Inventaris::find($id);
        return view("inventaris.invent-show", compact('categories', 'inventory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Kategori::all();
        $inventory = Inventaris::findorfail($id);
        return view("inventaris.invent-edit", compact('categories', 'inventory'));
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
        //dd($request->all());
        $input = $request->only('nama', 'jumlah', 'satuan', 'kondisi', 'id_kategori');
        $inventory = Inventaris::find($id);
        $inventory->update($input);

        return back()
            ->with('toast_success', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventory = Inventaris::find($id)->delete();
        return back()->with('toast_success', 'Data Berhasil Dihapus!');
    }

    public function kawalCorona()
    {
        $kawal = file_get_contents('https://data.covid19.go.id/public/api/prov.json');
        $json = json_decode($kawal);
        return view('corona.index', compact('json'));
        // return response()->json($json);
    }
}