<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailPinjam;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class PinjamController extends Controller
{
    public function pinjam($id_detail)
    {
        //dd($request->$id_detail);
        if (Notification::where('id_detail', $id_detail)
            ->update(['read_at' => date('Y-m-d H:i:s')])
        ) {
            dump(DetailPinjam::find($id_detail));
        }
    }
    public function readOrder(Request $r)
    {
        if ($r->ajax()) {
            //dd($request->$r);
            //$noti = Notification::read();
            $noti = Notification::with('detail')
                ->whereHas('detail', function ($query) {
                    $query->whereHas('inventaris', function ($query) {
                        $query->whereHas('user', function ($query) {
                            $query->where('level', Auth::user()->level);
                        });
                    });
                })->orderBy('id', 'desc')->get();

            return view('peminjaman.notif', compact('noti'));
        }
    }
}