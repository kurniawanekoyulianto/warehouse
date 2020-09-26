<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    // menampilkan semua data barang
    public function index() {
        ini_set('memory_limit','2048M');
        $session_id = session()->get('id_user');
        $sp = DB::select("SELECT sp_insert_master_barang('".$session_id."', 'AA63');");
        $barang =  DB::table('tmp_master_gd_barang')->orderBy('nama_barang', 'asc')->Paginate(1000);

        return view('barang', ['barang' => $barang]);
    }
}