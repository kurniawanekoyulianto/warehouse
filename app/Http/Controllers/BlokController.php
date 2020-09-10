<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlokController extends Controller
{
    // Menampilkan semua data blok gudang
    public function index() {
        $blok =  DB::select('SELECT * FROM vw_master_gd_blok');
        return view('blok', ['blok' => $blok]);
    }

    // Route ke form input blok
    public function create() {
        // retrieve data area atau bagian
        $area =  DB::select('SELECT * FROM tbl_master_bagian');
        return view('form.form-blok', ['data' => $area]);
    }

    // Insert data ke database
    public function store(Request $request) {
       DB::table('tbl_master_gd_blok')->insert([
            'nama_gd_blok' => $request->nama_gd_blok,
            'kode_gudang_blok' => $request->kode_gudang_blok,
            'kode_bagian' => $request->kode_bagian
       ]);

        return redirect('/blok');
    }

    // mengambil data yg ingin dirubah
    public function edit($id) {
        // mengambil data blok berdasarkan id yang dipilih
        // passing data blok yang didapat ke view form-blok.blade.php
        $blok = DB::select('SELECT * FROM vw_master_gd_blok WHERE id_gd_blok = '.$id);

        // retrieve data area atau bagian
        $area = DB::table('tbl_master_bagian')->get();
        return view('edit.edit-blok', ['data' => $blok, 'bagian' => $area]);
        //return $blok;
    } 

    // simpan perubahan data blok
    public function update(Request $request){
        // update data blok
        DB::table('tbl_master_gd_blok')->where('id_gd_blok', $request->id_gd_blok)->update([
            'kode_gudang_blok' => $request->kode_gudang_blok,
            'nama_gd_blok' => $request->nama_gd_blok,
            'kode_bagian' => $request->kode_bagian
        ]);
	    // alihkan halaman ke halaman blok
	    return redirect('/blok');
    }

    // hapus data blok
    public function destroy($id) {
        DB::table('tbl_master_gd_blok')->where('id_gd_blok', $id)->delete();
        // Alihkan halaman ke halaman pegawai
        return redirect('/blok');
    }
}