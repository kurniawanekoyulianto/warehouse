<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengeluaranController extends Controller
{
    public function index() {
        $keperluan = DB::select('SELECT * FROM vw_master_gd_keperluan_out');
        $satuan = DB::select('SELECT * FROM vw_master_gd_satuan');
        $bagian = DB::table('tbl_master_gd_bagian')->get();
        $plong = DB::select('SELECT * FROM vw_master_gd_plong');
        return view('form.form-pengeluaran', [
            'keperluan' => $keperluan,
            'satuan' => $satuan,
            'bagian' => $bagian,
            'plong' => $plong,
        ]);
    }

    public function searchItem($qrcode){
        // get data from tbl_gd_barcode
        $qrcode = DB::select("SELECT * FROM vw_gd_data_qrcode WHERE qrcode = '".$qrcode."'");
        $stokqr = DB::select("SELECT * FROM vw_gd_cekstok_qrcode WHERE qrcode = '".$qrcode."'");
        $keperluan = DB::select('SELECT * FROM vw_master_gd_keperluan_out');
        $satuan = DB::select('SELECT * FROM vw_master_gd_satuan');
        $bagian = DB::table('tbl_master_gd_bagian')->get();
        $plong = DB::select('SELECT * FROM vw_master_gd_plong');
        return view('form.form-pengeluaran', [
            'brg' => $qrcode,
            'stokqr' => $stokqr,
            'keperluan' => $keperluan,
            'satuan' => $satuan,
            'bagian' => $bagian,
            'plong' => $plong,
        ]);
    }

    // fungsi untuk membuat pagination datatable
    public function paginateArray($data, $perPage = 500){
        $page = Paginator::resolveCurrentPage();
        $total = count($data);
        $results = array_slice($data, ($page - 1) * $perPage, $perPage);

        return new LengthAwarePaginator($results, $total, $perPage, $page, [
            'path' => Paginator::resolveCurrentPath(),
        ]);
    }
}