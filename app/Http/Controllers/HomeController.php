<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\DetailPinjam;
use App\Models\Peminjaman;
use Illuminate\Database\Eloquent\Builder;
use DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $menunggu = DetailPinjam::join('peminjaman', 'peminjaman.id', '=', 'id_peminjaman')
            ->where('peminjaman.status_pinjam', 'Menunggu')->whereHas('inventaris', function ($q) {
                $q->whereHas('user', function ($q) {
                    $q->where('level', Auth::user()->level);
                });
            })->get()->count();
        $dipinjam = DetailPinjam::join('peminjaman', 'peminjaman.id', '=', 'id_peminjaman')
            ->where('peminjaman.status_pinjam', 'Dipinjam')->whereHas('inventaris', function ($q) {
                $q->whereHas('user', function ($q) {
                    $q->where('level', Auth::user()->level);
                });
            })->get()->count();
        $ditolak = DetailPinjam::join('peminjaman', 'peminjaman.id', '=', 'id_peminjaman')
            ->where('peminjaman.status_pinjam', 'Ditolak')->whereHas('inventaris', function ($q) {
                $q->whereHas('user', function ($q) {
                    $q->where('level', Auth::user()->level);
                });
            })->get()->count();
        $dikembalikan = DetailPinjam::join('peminjaman', 'peminjaman.id', '=', 'id_peminjaman')
            ->where('peminjaman.status_pinjam', 'Dikembalikan')->whereHas('inventaris', function ($q) {
                $q->whereHas('user', function ($q) {
                    $q->where('level', Auth::user()->level);
                });
            })->get()->count();
        $bermasalah = DetailPinjam::join('peminjaman', 'peminjaman.id', '=', 'id_peminjaman')
            ->where('peminjaman.status_pinjam', 'Bermasalah')->whereHas('inventaris', function ($q) {
                $q->whereHas('user', function ($q) {
                    $q->where('level', Auth::user()->level);
                });
            })->get()->count();
        $selesai = DetailPinjam::join('peminjaman', 'peminjaman.id', '=', 'id_peminjaman')
            ->where('peminjaman.status_pinjam', 'Selesai')->whereHas('inventaris', function ($q) {
                $q->whereHas('user', function ($q) {
                    $q->where('level', Auth::user()->level);
                });
            })->get()->count();
        return view('user.admin', compact('menunggu', 'dipinjam', 'ditolak', 'dikembalikan', 'bermasalah', 'selesai'));
        /*if(auth()->user()->level=='admin'){
        return view('user.admin');
        }*/
        //return view('user.user');
    }
}