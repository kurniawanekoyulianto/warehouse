<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlokController extends Controller
{
    // Menampilkan semua data blok gudang
    public function index() {
        $blok =  DB::select('SELECT * FROM vw_gudang_blok');
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
            'id_gd_area' => $request->kode_bagian
       ]);

        return redirect('/blok');
    }

    public function update($id) {
        // mengambil data blok berdasarkan id yang dipilih
        // passing data blok yang didapat ke view form-blok.blade.php
        $blok = DB::table('tbl_master_gd_blok')->where('id_gd_blok', $id)->get();
        
        // retrieve data area atau bagian
        $area = DB::table('tbl_master_bagian')->get();
        return view('edit.edit-blok', compact('data', 'area'));
        //return $blok;
    } 

    // hapus data blok
    public function destroy($id) {
        DB::table('tbl_master_gd_blok')->where('id_gd_blok', $id)->delete();
        // Alihkan halaman ke halaman pegawai
        return redirect('/blok');
    }
}