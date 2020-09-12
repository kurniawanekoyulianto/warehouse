<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TingkatController extends Controller
{
    // Menampilkan semua data tingkat 
    public function index() {
        $tingkat = DB::select('select * from vw_master_gd_tingkat');
        return view('tingkat', ['tingkat' => $tingkat]);
    }

    // Route ke form input tingkat 
    public function create() {
        // retrieve data retrieve data blok
        $blok =  DB::select('SELECT * FROM tbl_master_gd_blok');
        return view('form.form-tingkat', ['blok' => $blok]);
    }

    // Insert data ke database
    public function store(Request $request) {
        DB::table('tbl_master_gd_tingkat')->insert([
            'kode_gudang_tingkat' => $request->kode_gudang_tingkat,
            'nama_gd_tingkat' => $request->nama_gd_tingkat,
            'id_gd_blok' => $request->id_gd_blok,
        ]);
 
         return redirect('/tingkat');
    }

    // mengambil data yg ingin dirubah
    public function edit($id) {
        // mengambil data tingkat gudang berdasarkan id yang dipilih
        // passing data tingkat gudang yang didapat ke view form-tingkat.blade.php
        $tingkat = DB::select('SELECT * FROM vw_master_gd_tingkat WHERE id_gd_tingkat = '.$id);

        // retrieve data blok atau blok
        $blok = DB::table('tbl_master_gd_blok')->get();
        return view('edit.edit-tingkat', ['data' => $tingkat, 'blok' => $blok]);
    }

    // simpan perubahan data tingkat
    public function update(Request $request){
        // update data tingkat
        DB::table('tbl_master_gd_tingkat')->where('id_gd_tingkat', $request->id_gd_tingkat)->update([
            'kode_gudang_tingkat' => $request->kode_gudang_tingkat,
            'nama_gd_tingkat' => $request->nama_gd_tingkat,
            'id_gd_blok' => $request->id_gd_blok
        ]);
	    // alihkan halaman ke halaman tingkat
	    return redirect('/tingkat');
    }

    // hapus data blok
    public function destroy($id) {
        DB::table('tbl_master_gd_tingkat')->where('id_gd_tingkat', $id)->delete();
        // Alihkan halaman ke halaman tingkat
        return redirect('/tingkat');
    }
}
