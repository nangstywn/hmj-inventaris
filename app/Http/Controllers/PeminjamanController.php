<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Inventaris;
use App\Models\Peminjaman;
use App\Models\Kategori;
use App\Models\DetailPinjam;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use DB;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //dd($request->all());
        if (auth()->user()->level == 'user') {
            // $detail = DetailPinjam::whereHas('inventaris', function($query) {
            //         $query->where('id_user', 'id')->whereHas('user', function ($query) {
            //         $query->where('level', 'admin-si');
            //         });
            //         })->get();

            if (Route::is('ti.pinjam.index')) {
                //$level = DetailPinjam::find(1)->inventaris->user->level;
                $detail = DetailPinjam::with('inventaris')->with('peminjaman')
                    ->whereHas('inventaris', function ($query) {
                        $query->whereHas('user', function ($query) {
                            $query->where('level', 'admin-ti');
                        });
                    })
                    ->whereHas('peminjaman', function ($q) {
                        $q->where('id_user', '=', auth()->user()->id);
                    })->orderBy('id', 'desc')->get();
            } elseif (Route::is('si.pinjam.index')) {
                //$level = DetailPinjam::find(1)->inventaris->user->level;
                $detail = DetailPinjam::with('inventaris')->with('peminjaman')
                    ->whereHas('inventaris', function ($query) {
                        $query->whereHas('user', function ($query) {
                            $query->where('level', 'admin-si');
                        });
                    })
                    ->whereHas('peminjaman', function ($q) {
                        $q->where('id_user', '=', auth()->user()->id);
                    })->orderBy('id', 'desc')->get();
            } elseif (Route::is('tk.pinjam.index')) {
                //$level = DetailPinjam::find(1)->inventaris->user->level;
                $detail = DetailPinjam::with('inventaris')->with('peminjaman')
                    ->whereHas('inventaris', function ($query) {
                        $query->whereHas('user', function ($query) {
                            $query->where('level', 'admin-tk');
                        });
                    })
                    ->whereHas('peminjaman', function ($q) {
                        $q->where('id_user', '=', auth()->user()->id);
                    })->orderBy('id', 'desc')->get();
            } elseif (Route::is('mi.pinjam.index')) {
                //$level = DetailPinjam::find(1)->inventaris->user->level;
                $detail = DetailPinjam::with('inventaris')->with('peminjaman')
                    ->whereHas('inventaris', function ($query) {
                        $query->whereHas('user', function ($query) {
                            $query->where('level', 'admin-mi');
                        });
                    })
                    ->whereHas('peminjaman', function ($q) {
                        $q->where('id_user', '=', auth()->user()->id);
                    })->orderBy('id', 'desc')->get();
            } elseif (Route::is('ka.pinjam.index')) {
                //$level = DetailPinjam::find(1)->inventaris->user->level;
                $detail = DetailPinjam::with('inventaris')->with('peminjaman')
                    ->whereHas('inventaris', function ($query) {
                        $query->whereHas('user', function ($query) {
                            $query->where('level', 'admin-ka');
                        });
                    })
                    ->whereHas('peminjaman', function ($q) {
                        $q->where('id_user', '=', auth()->user()->id);
                    })->orderBy('id', 'desc')->get();
            }
            // $detail = DetailPinjam::with(['peminjaman.inventaris' => $cb])->whereHas('peminjaman', function($query) use ($cb) {
            //     $query->where('id_user', auth()->user()->id)->whereHas('inventaris', function($q){
            //         $q->where('level', $cb);
            //     });
            // })->get();


        } elseif (auth()->user()->level != 'user') {
            if (Route::is('ti.pinjam.index')) {
                //$level = DetailPinjam::find(1)->inventaris->user->level;
                $detail = DetailPinjam::with('inventaris')->with('peminjaman')
                    ->whereHas('inventaris', function ($query) {
                        $query->whereHas('user', function ($query) {
                            $query->where('level', 'admin-ti');
                        });
                    })
                    ->orderBy('id', 'desc')->get();
            } elseif (Route::is('si.pinjam.index')) {
                //$level = DetailPinjam::find(1)->inventaris->user->level;
                $detail = DetailPinjam::with('inventaris')->with('peminjaman')
                    ->whereHas('inventaris', function ($query) {
                        $query->whereHas('user', function ($query) {
                            $query->where('level', 'admin-si');
                        });
                    })
                    ->orderBy('id', 'desc')->get();
            } elseif (Route::is('tk.pinjam.index')) {
                //$level = DetailPinjam::find(1)->inventaris->user->level;
                $detail = DetailPinjam::with('inventaris')->with('peminjaman')
                    ->whereHas('inventaris', function ($query) {
                        $query->whereHas('user', function ($query) {
                            $query->where('level', 'admin-tk');
                        });
                    })
                    ->orderBy('id', 'desc')->get();
            } elseif (Route::is('mi.pinjam.index')) {
                //$level = DetailPinjam::find(1)->inventaris->user->level;
                $detail = DetailPinjam::with('inventaris')->with('peminjaman')
                    ->whereHas('inventaris', function ($query) {
                        $query->whereHas('user', function ($query) {
                            $query->where('level', 'admin-mi');
                        });
                    })
                    ->orderBy('id', 'desc')->get();
            } elseif (Route::is('ka.pinjam.index')) {
                //$level = DetailPinjam::find(1)->inventaris->user->level;
                $detail = DetailPinjam::with('inventaris')->with('peminjaman')
                    ->whereHas('inventaris', function ($query) {
                        $query->whereHas('user', function ($query) {
                            $query->where('level', 'admin-ka');
                        });
                    })
                    ->orderBy('id', 'desc')->get();
            }
        }
        return view('peminjaman.peminjaman', compact('detail'));
    }


    // $filter = $request->filter;
    // if($request->method() == 'GET'){
    //     if($filter != null){
    //         if($filter == 1){
    //         $detail = DetailPinjam::join('peminjaman', 'peminjaman.id', '=', 'id_peminjaman')
    //         ->where('peminjaman.status_pinjam','Menunggu')
    //         ->get('*');
    //         }elseif($filter == 2){
    //         $detail = DetailPinjam::join('peminjaman', 'peminjaman.id', '=', 'id_peminjaman')
    //         ->where('peminjaman.status_pinjam','Dipinjam')
    //         ->get('*');
    //         }elseif($filter == 3){
    //         $detail = DetailPinjam::join('peminjaman', 'peminjaman.id', '=', 'id_peminjaman')
    //         ->where('peminjaman.status_pinjam','Ditolak')
    //         ->get('*');
    //         }elseif($filter == 4){
    //         $detail = DetailPinjam::join('peminjaman', 'peminjaman.id', '=', 'id_peminjaman')
    //         ->where('peminjaman.status_pinjam','Dikembalikan')
    //         ->get('*');
    //         }elseif($filter == 5){
    //         $detail = DetailPinjam::join('peminjaman', 'peminjaman.id', '=', 'id_peminjaman')
    //         ->where('peminjaman.status_pinjam','Selesai')
    //         ->get('*');
    //         }elseif($filter == 7){
    //         $detail = DetailPinjam::join('peminjaman', 'peminjaman.id', '=', 'id_peminjaman')
    //         ->where('peminjaman.status_pinjam','Bermasalah')
    //         ->get('*');
    //         }elseif($filter == 6){
    //         $detail = DetailPinjam::orderBy('id', 'desc')->get();
    //         }else{
    //         $detail = DetailPinjam::orderBy('created_at','desc');
    //     }
    //     }else if($filter == null){
    //         if(auth()->user()->level=='user'){
    //         $detail = DetailPinjam::orderBy('id', 'desc')->get();
    //         }else{
    //         $detail = DetailPinjam::join('peminjaman', 'peminjaman.id', '=', 'id_peminjaman')
    //         ->where('peminjaman.status_pinjam','Menunggu')
    //         ->orWhere('peminjaman.status_pinjam', 'Dikembalikan')
    //         ->get('*');
    //         }
    //         }

    // }else{
    //     if(auth()->user()->level=='user'){
    //         $detail = DetailPinjam::join('peminjaman', 'peminjaman.id', '=', 'id_peminjaman')
    //         ->where('peminjaman.status_pinjam','Dipinjam')
    //         ->get('*');
    //         }else{
    //         $detail = DetailPinjam::join('peminjaman', 'peminjaman.id', '=', 'id_peminjaman')
    //         ->where('peminjaman.status_pinjam','Menunggu')
    //         ->get('*');
    //         }
    // }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $peminjaman = Peminjaman::all();
        return view('peminjaman.tanggal-create', compact('peminjaman'));
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
        //DB::beginTransaction();
        //$requestData = $request->all();
        //Peminjaman::create($requestData);
        $peminjaman = new Peminjaman([
            "tgl_pinjam" => date('Y-m-d H:i:s', time()),
            "tgl_kembali" => $request->tgl_kembali,
            "batas_kembali" => date('Y-m-d H:i:s', time() + (60 * 60 * 24 * 7)),
            "status_pinjam" => 'Menunggu',
            //"id_inventaris" => $request->id_inventaris,
            "id_user" => auth()->user()->id,
            "created_at" => date('Y-m-d H:i:s', time()),
            "updated_at" => date('Y-m-d H:i:s', time()),
            //"jumlah" => $request->jumlah

        ]);
        if ($peminjaman->save()) {
            return redirect()
                ->route('transaksi.create', $peminjaman->id);
        } else {
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        $peminjaman = Peminjaman::find($id);
        $detail = DetailPinjam::where(["id_peminjaman" => $peminjaman->id])->get();

        if ($peminjaman->status == 0 or $peminjaman->status == 3) {
            foreach ($detail as $row) {
                $inventaris = InventarisModel::find($row->id_inventaris);

                if ($peminjaman->status_pinjam == 0) {
                    $inventaris->jumlah += $row->jumlah;
                    $inventaris->save();
                }

                $row->delete();
            }

            if ($peminjaman->delete()) {
                DB::commit();
                return redirect()
                    ->back()
                    ->with('success', 'Peminjaman berhasil dihapus');
            } else {
                DB::rollBack();
                return redirect()
                    ->back()
                    ->with('error', 'Peminjaman gagal dihapus');
            }
        } else {
            return redirect()
                ->back()
                ->with('error', 'Peminjaman gagal dihapus, Karena Proses Pengembalian masih belum berakhir');
        }
    }
    //Acc Peminjaman
    public function acceptPinjam($id)
    {
        DB::beginTransaction();
        $peminjaman = Peminjaman::find($id);
        if ($peminjaman->status_pinjam == 'Menunggu') {
            $peminjaman->status_pinjam = 'Dipinjam';

            if ($peminjaman->save()) {
                DB::commit();
                return redirect()
                    ->back()
                    ->with('success', 'Status peminjaman berhasil diubah menjadi "Telah Di Accept Pinjam".');
            } else {
                DB::rollBack();
                return redirect()
                    ->back()
                    ->with('error', 'Status peminjaman gagal diubah.');
            }
        }
    }
    //tolak Pinjam
    public function tolakPinjam($id)
    {
        DB::beginTransaction();
        $peminjaman = Peminjaman::find($id);
        $detail = DetailPinjam::where(['id_peminjaman' => $peminjaman->id])->get();
        if ($peminjaman->status_pinjam == 'Menunggu') {
            $peminjaman->status_pinjam = 'Ditolak';
            /**
             * Pengembalian Barang
             */
            foreach ($detail as $row) {
                $inventaris = Inventaris::find($row->id_inventaris);
                $inventaris->jumlah += $row->jumlah;
                if (!$inventaris->save()) {
                    DB::rollBack();
                    return redirect()
                        ->back()
                        ->with('error', 'Status peminjaman gagal diubah.');
                }
            }

            if ($peminjaman->save()) {
                DB::commit();
                return redirect()
                    ->back()
                    ->with('success', 'Status peminjaman berhasil diubah menjadi "Ditolak".');
            } else {
                DB::rollBack();
                return redirect()
                    ->back()
                    ->with('error', 'Status peminjaman gagal diubah.');
            }
        }
    }
    //request Kembali
    public function requestKembali($id)
    {
        //dd($request->all());
        DB::beginTransaction();
        $peminjaman = Peminjaman::find($id);

        $detail = DetailPinjam::where(['id_peminjaman' => $peminjaman->id])->get();
        if ($peminjaman->status_pinjam == 'Dipinjam') {
            $peminjaman->status_pinjam = 'Dikembalikan';
            //$peminjaman->tgl_kembali = 'Menunggu Konfirmasi';

            if ($peminjaman->save()) {
                $this->sendNotification();
                DB::commit();
                return redirect()
                    ->back()
                    ->with('success', 'Status peminjaman berhasil diubah menjadi "Dikembalikan".');
            } else {
                DB::rollBack();
                return redirect()
                    ->back()
                    ->with('error', 'Status peminjaman gagal diubah.');
            }
        }
    }

    public function sendNotification()
    {
        $firebaseToken = User::whereNotNull('api_token')->pluck('api_token')->all();

        $SERVER_API_KEY = 'AAAAAsRYaes:APA91bFIPtFdWk7p-TwrNCQjYeT6RHdmQyXw2woycCeyFg8B6dRtl0Q8sgZwSqOBAbX9hqrLWyWDKhVmKJevmPABrQ921Xu0VzGUK7gYMF0IjjZyFJ-zME2TAr-rQYDPbg7Nl1Yb8RZf';

        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => "Pengambalian Buku",
                "body" => "Buku telah dikembalikan",
                "content_available" => true,
                "priority" => "high",
            ]
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        return curl_exec($ch);
    }
    //acc Kembali
    public function kembali($id)
    {
        DB::beginTransaction();
        $peminjaman = Peminjaman::find($id);

        $detail = DetailPinjam::where(['id_peminjaman' => $peminjaman->id])->get();

        if ($peminjaman->status_pinjam == 'Dikembalikan') {
            $peminjaman->status_pinjam = 'Selesai';
            $peminjaman->tgl_kembali = date('Y-m-d', time());

            /**
             * Pengembalian Barang
             */
            foreach ($detail as $row) {
                $inventaris = Inventaris::find($row->id_inventaris);
                $inventaris->jumlah += $row->jumlah;
                if (!$inventaris->save()) {
                    DB::rollBack();
                    return redirect()
                        ->back()
                        ->with('error', 'Status peminjaman gagal diubah.');
                }
            }

            if ($peminjaman->save()) {
                DB::commit();
                return redirect()
                    ->back()
                    ->with('success', 'Status peminjaman berhasil diubah menjadi "Selesai".');
            } else {
                DB::rollBack();
                return redirect()
                    ->back()
                    ->with('error', 'Status peminjaman gagal diubah.');
            }
        }
    }
    //tolak Kembali
    public function tolakKembali($id)
    {
        DB::beginTransaction();
        $peminjaman = Peminjaman::find($id);

        $detail = DetailPinjam::where(['id_peminjaman' => $peminjaman->id])->get();

        if ($peminjaman->status_pinjam == 'Dikembalikan') {
            $peminjaman->status_pinjam = 'Bermasalah';
            //$peminjaman->tgl_kembali = date('Y-m-d',time());

            /**
             * Pengembalian Barang
             */
            if ($peminjaman->save()) {
                DB::commit();
                return redirect()
                    ->back()
                    ->with('success', 'Status peminjaman berhasil diubah menjadi "Bermasalah".');
            } else {
                DB::rollBack();
                return redirect()
                    ->back()
                    ->with('error', 'Status peminjaman gagal diubah.');
            }
        }
    }
}
