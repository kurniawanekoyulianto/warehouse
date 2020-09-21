<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// untuk pagination
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

// simple generate QRCode Larave
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TransaksiController extends Controller
{
    // tampilkan semua data view transaksi
    public function bpb() {
        ini_set('memory_limit','2048M');
        $bpb = $this->paginateArray(
            DB::select('select * from vw_gd_transaksi_bpb')
        );

        return view('bpb', ['bpb' => $bpb]);
    }

    public function nomorbpb($nomor, $kode) {
        $nomorbpb = DB::select("SELECT * FROM vw_gd_transaksi_bpb WHERE nomor = '".$nomor."'");
        $selectdata = DB::select("SELECT * FROM vw_gd_transaksi_bpb WHERE nomor = '".$nomor."' AND kode = '".$kode."'");
        $satuan = DB::table('tbl_master_gd_satuan')->get();
        $plong = DB::select('SELECT * FROM vw_master_gd_plong');    
        $tingkat = DB::select('SELECT * FROM vw_master_gd_tingkat');
        $blok = DB::select('SELECT * FROM vw_master_gd_blok');

        return view('form.form-bpb', ['bpb' => $nomorbpb, 'select' => $selectdata, 'plong'=>$plong, 'tingkat'=>$tingkat, 'satuan'=>$satuan, 'blok'=>$blok]);
    }

    // save mapping & cetak qrcode
    public function saveMapping(Request $request){
        $c_info = DB::select("SELECT * FROM vw_cetak_current_info");

        // total barcode
        $jml_total = $request->qty_total;
        $jml_satuan = $request->qty_satuan;
        $qty_qr = $jml_total / $jml_satuan;

        $tgl_transaksi = $request->tgl_transaksi;
        $no_transaksi = $request->no_transaksi;
        $kd_barang = $request->kode_barang;
        $kode_blok = $request->blok;
        $id_plong = $request->plong;
        $id_user = session()->get('id_user');
        $ip = $c_info['0']->ip_address;
        $lastupdate = $c_info['0']->tanggal;


        for($i = 1; $i<=$qty_qr; $i++){
            $id_mapping = DB::select("SELECT * FROM vw_gd_id_mapping");
            $kode_qrcode = $id_mapping['0']->id_gd_mapping . $i;

            // generate qrcode
            QrCode::size(0)
            ->format('svg')
            ->generate($kode_qrcode, public_path('qrcode/mapping/'.$kode_qrcode.'.svg'));
        

            // insert tbl_barcode
            DB::table('tbl_gd_barcode')->insert([
                'id_transaksi' => $id_mapping['0']->id_gd_mapping,
                'tanggal_transaksi' => $tgl_transaksi,
                'nomor_transaksi' => $no_transaksi,
                'kode_barang' => $kd_barang,
                'qrcode' => $kode_qrcode,
                'id_user' => $id_user,
                'ip_address' => $ip,
                'lastupdate' => $lastupdate
           ]);

            // insert tbl_mapping
            DB::table('tbl_gd_mapping')->insert([
                'qrcode' => $kode_qrcode,
                'id_gd_plong' => $id_plong,
                'kode_bagian' => $kode_blok,
                'id_keperluan' => '',
                'keterangan' => '',
                'id_user' => $id_user,
                'ip_address' => $ip,
                'lastupdate' => $lastupdate
           ]);
        }
    }

    public function paginateArray($data, $perPage = 10000)
    {
        $page = Paginator::resolveCurrentPage();
        $total = count($data);
        $results = array_slice($data, ($page - 1) * $perPage, $perPage);

        return new LengthAwarePaginator($results, $total, $perPage, $page, [
            'path' => Paginator::resolveCurrentPath(),
        ]);
    }
}
