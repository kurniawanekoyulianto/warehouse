<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlongController extends Controller
{
    // Menampilkan semua data plong gudang 
    public function index() {
        $plong = DB::select('select * from vw_master_gd_plong');
        return view('plong', ['plong' => $plong]);
    }

    // Route ke form input plong 
    public function create() {
        // retrieve data tingkat
        $tingkat =  DB::select('SELECT * FROM vw_master_gd_tingkat');
        return view('form.form-plong', ['tingkat' => $tingkat]);
    }

    // Insert data ke database
    public function store(Request $request) {
        // pengkodean plong

        // generate qrcode
        $tgl = string(date('ymdHi')).'001';

        DB::table('tbl_master_gd_plong')->insert([
             'nomor_gd_plong' => $request->nomor_gd_plong,
             'nama_gd_plong' => $request->nama_gd_plong,
             'id_gd_tingkat' => $request->tingkat,
             'qrcode' => $request->qrcode
        ]);
 
         //return redirect('/plong');
         return $tgl;
     }
}
