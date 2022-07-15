<?php

namespace App\Http\Controllers\Apis;

use App\Models\Inventaris;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;



class InventarisController extends Controller
{
	public function index($id)
	{
		$inventaris = Inventaris::find($id);
		return response()->json($inventaris);
	}

	public function cat(Request $r)
	{
		$inventaris = Inventaris::where([
			"id_kategori" => $r->id_kategori/*,
        	"id_ruang" => $r->id_ruang*/
		])->get();

		if (count($inventaris) > 0) {
			$invent = [
				[
					"id" => 0,
					"nama" => "Pilih Inventaris"
				]
			];

			foreach ($inventaris as $i) {
				if ($i->kondisi != 'Rusak') {
					array_push($invent, [
						"id" => $i->id,
						"nama" => ucwords($i->nama . ' (' . $i->kondisi . ')')
					]);
				}
			}
			return response()->json($invent);
		} else {
			return response()->json([
				"id" => "0",
				"nama" => "Data tidak ditemukan"
			]);
		}
	}

	/*public function jenis($id){
    	$jenis = Kategori::orderBy('created_at','DESC')->get();
	    $jenisPush = [
	    	[
	    		"id" => 0,
	    		"nama" => "Pilih Jenis",
	    		"item" => 0,
	    	]
	    ];

		if(count($jenis) > 0){
			foreach ($jenis as $jen) {
				// dd($jen);
	    		$inventaris = InventarisModel::where([
	    			"id_ruang" => $id,
	    			"id_kategori" => $jen->id])->get();
		        array_push($jenisPush, [
		        	"id" => $jen->id,
		        	"nama" => $jen->nama_jenis,
		        	"item" => count($inventaris)]);
			}
			return response()->json($jenisPush);
		}
    }*/
}