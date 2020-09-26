<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// untuk pagination
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class PengeluaranController extends Controller
{
    // tampilkan semua data view transaksi
    public function index() {
        ini_set('memory_limit','2048M');
        $pmbp = $this->paginateArray(
            DB::select('select * from vw_gd_transaksi_pmbp')
        );

        return view('pengeluaran', ['pmbp' => $pmbp]);
    }

    public function nomorpmbp($nomor, $kode){
        $nomorpmbp = DB::select("SELECT * FROM vw_gd_transaksi_pmbp WHERE nomor = '".$nomor."'");
        $selectdata = DB::select("SELECT * FROM vw_gd_transaksi_pmbp WHERE nomor = '".$nomor."' AND kode = '".$kode."'");
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