<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    // menampilkan semua data barang
    public function index() {
        ini_set('memory_limit','2048M');
        $barang =  DB::table('tbl_master_gd_barang')->orderBy('nama_barang', 'asc')->Paginate(25000);
        //$barang =  DB::table('tbl_master_gd_barang')->get();
        //$chunk = $barang->chunk(50000);
        //return view('barang', ['barang' => $chunk]);
        return view('barang', ['barang' => $barang]);
    }
}