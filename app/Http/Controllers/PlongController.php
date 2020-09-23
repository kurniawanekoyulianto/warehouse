<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
        $code_plong = $request->nama_gd_plong;

        // generate qrcode
        QrCode::size(0)
        ->format('svg')
        ->generate($code_plong, public_path('qrcode/plong/'.$code_plong.'.svg'));

        DB::table('tbl_master_gd_plong')->insert([
             'nama_gd_plong' => $request->nama_gd_plong,
             'id_gd_tingkat' => $request->id_gd_tingkat,
             'qrcode' => $code_plong
        ]);
 
        // alihkan halaman ke halaman plong
	    return redirect('/plong');
    }

    // mengambil data yg ingin dirubah
    public function edit($id) {
        // mengambil data tingkat gudang berdasarkan id yang dipilih
        // passing data tingkat gudang yang didapat ke view form-tingkat.blade.php
        $plong = DB::select('SELECT * FROM vw_master_gd_plong WHERE id_gd_plong = '.$id);

        // retrieve data blok atau blok
        $tingkat = DB::select('SELECT * FROM vw_master_gd_tingkat');
        return view('edit.edit-plong', ['data' => $plong, 'tingkat' => $tingkat]);
    }

    // simpan perubahan data plong
    public function update(Request $request){
        // Get code plong
        $code_plong = $request->nama_gd_plong;

        //generate code plong
        QrCode::size(0)
        ->format('svg')
        ->generate($code_plong, public_path('qrcode/plong/'.$code_plong.'.svg'));
        
        // update data plong
        DB::table('tbl_master_gd_plong')->where('id_gd_plong', $request->id_gd_plong)->update([
            'nama_gd_plong' => $request->nama_gd_plong,
            'id_gd_tingkat' => $request->id_gd_tingkat,
            'qrcode' => $code_plong
        ]);

	    // alihkan halaman ke halaman plong
	    return redirect('/plong');
    }

     // hapus data blok
    public function destroy($id) {
        DB::table('tbl_master_gd_plong')->where('id_gd_plong', $id)->delete();
        // Alihkan halaman ke halaman plong
        return redirect('/plong');
    }
}
