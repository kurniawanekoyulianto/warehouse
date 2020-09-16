<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Paginator;

class RealController extends Controller
{
    // tampilkan semua data realisasi
    public function index() {
        ini_set('memory_limit','2048M');
        $real = \Paginator::make(DB::select('select * from vw_gd_real'), 10);

        return $real;
        // $real = DB::table('tbl_gd_real_d')
        // ->leftJoin('tbl_gd_real_h', 'tbl_gd_real_d.nomor', '=', 'tbl_gd_real_h.nomor')
        // ->leftJoin('tbl_master_gd_bagian', 'tbl_gd_real_h.gudang', '=', 'tbl_master_gd_bagian.kode_bagian')
        // ->leftJoin('vp_hris_aktif_nonaktif', 'tbl_gd_real_h.mh', '=', 'vp_hris_aktif_non_aktif.nik')
        // ->select('tbl_gd_real_h.tanggal', 'tbl_master_gd_bagian.nama_bagian','vp_hris_aktif_nonaktif.nama_lengkap', 'tbl_gd_real_d.*')->paginate(20000);
        //return view('real', ['real' => $real]);
    }
}
