<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventaris;
use App\Models\Peminjaman;
use App\Models\Kategori;
use App\Models\DetailPinjam;
use App\Models\Notification;
use App\Models\User;
use DB;


class PeminjamanDetailController extends Controller
{
    public function create($id)
    {
        $categories = Kategori::all();
        $inventory = Inventaris::all();
        $peminjaman = Peminjaman::find($id);

        if ($peminjaman->status_pinjam == 'Menunggu') {
            return view('peminjaman.peminjaman-create', [
                'inventory' => $inventory,
                'peminjaman' => $peminjaman,
                'categories' => $categories
            ]);
        } else {
            return abort(403, 'Cant access dis aksion');
        }
    }
    public function store(Request $request)
    {
        //dd($request->all());
        DB::beginTransaction();

        $peminjaman = Peminjaman::find($request->id_peminjaman);
        $inventaris = Inventaris::find($request->id_inventaris);

        $this->validate($request, [
            "id_peminjaman" => "required|numeric",
            "id_inventaris" => "required|numeric",
            "jumlah" => "required|numeric",
        ]);

        $detail = new DetailPinjam([
            "id_peminjaman" => $request->id_peminjaman,
            "id_inventaris" => $request->id_inventaris,
            "jumlah" => $request->jumlah,
        ]);

        // jika belum dikembalikan
        /*if($request->jumlah <= 0){
            return alert();
        }*/
        if ($peminjaman->status_pinjam == 'Menunggu') {
            $inventaris->jumlah = $inventaris->jumlah - $request->jumlah;


            if ($inventaris->jumlah < 0) {
                return redirect()->route('peminjam.index')->with('error', 'Jumlah Yang anda masukkan terlalu banyak . Please jangan main inspect :(');
            }

            if ($inventaris->save() && $detail->save()) {
                DB::commit();
                $notif = new Notification;
                $notif->id_user = auth()->user()->id;
                $notif->id_detail = $detail->id;
                if ($notif->save()) {
                    $url = route('pinjam.buku', $detail->id);
                    $notif->toMultiDevice(User::all(), 'title', 'body', null, $url);
                }
                if ($inventaris->user->level == 'admin-ti') {
                    return redirect()
                        ->route('ti.pinjam.index')->with('toast_success', '' . $inventaris->nama . ' Berhasil Dipinjam!');
                } elseif ($inventaris->user->level == 'admin-si') {
                    return redirect()
                        ->route('si.pinjam.index')->with('toast_success', '' . $inventaris->nama . ' Berhasil Dipinjam!');
                } elseif ($inventaris->user->level == 'admin-tk') {
                    return redirect()
                        ->route('tk.pinjam.index')->with('toast_success', '' . $inventaris->nama . ' Berhasil Dipinjam!');
                } elseif ($inventaris->user->level == 'admin-mi') {
                    return redirect()
                        ->route('mi.pinjam.index')->with('toast_success', '' . $inventaris->nama . ' Berhasil Dipinjam!');
                } elseif ($inventaris->user->level == 'admin-ka') {
                    return redirect()
                        ->route('ka.pinjam.index')->with('toast_success', '' . $inventaris->nama . ' Berhasil Dipinjam!');
                }
            } else {
                DB::rollBack();
                return redirect()->back
                    ->with('error', 'Detail Pinjam gagal ditambah');
            }
        } else {
            return abort(403, 'Wowowo , ape lapo mas');
        }
    }
}