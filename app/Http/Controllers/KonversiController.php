<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KonversiController extends Controller
{
    public function index(){
        $konversi = DB::table('tbl_master_gd_konversi')
        ->join('tbl_master_gd_barang', 'tbl_master_gd_konversi.kode', '=', 'tbl_master_gd_barang.kode_barang')
        ->select('tbl_master_gd_konversi.*', 'tbl_master_gd_barang.nama_barang')->paginate(25000);
        return view('konversi', ['konversi' => $konversi]);
        //return $konversi;
    }
}