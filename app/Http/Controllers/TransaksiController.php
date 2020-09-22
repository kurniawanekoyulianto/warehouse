<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// untuk pagination
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

// simple generate QRCode Laravel
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
        $keperluan = DB::table('tbl_master_gd_keperluan')->get();

        return view('form.form-bpb', ['bpb' => $nomorbpb, 'select' => $selectdata, 'plong'=>$plong, 'tingkat'=>$tingkat, 'satuan'=>$satuan, 'blok'=>$blok, 'keperluan'=> $keperluan]);
    }

    // save mapping & cetak qrcode
    public function saveMapping(Request $request){
        $c_info = DB::select("SELECT * FROM vw_cetak_current_info");

        //cek single atau multiple QRCode
        if ($request->jenis_qrcode == "single") { // jika qrcode single
            // total barcode
            $jml_total = $request->qty_total;
            $satuan_total = $request->satuan_total;
            $jml_satuan = $request->qty_satuan;
            $satuan_item = $request->satuan_item;

            $tgl_transaksi = date('Y-m-d', strtotime($request->tgl_transaksi));
            $no_transaksi = $request->no_transaksi;
            $kd_barang = $request->kode_barang;
            $kode_blok = $request->blok;
            $id_plong = $request->plong;
            $id_user = session()->get('id_user');
            $ip = $c_info['0']->ip_address;
            $lastupdate = $c_info['0']->tanggal;
            $keperluan = $request->keperluan;
            $ket = $request->keterangan;
            
            // select id transaksi
            $id_mapping = DB::select("SELECT * FROM vw_gd_id_mapping");
            // format QRCode AA63 201231 0000001
            $kode_bagian = substr($kd_barang, 0, 4);
            $kode_qrcode = $kode_bagian.$id_mapping['0']->id_gd_mapping;

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
                'jumlah' => $jml_satuan,
                'satuan' => $satuan_item,
                'id_user' => $id_user,
                'ip_address' => $ip,
                'lastupdate' => $lastupdate
            ]);

            // insert tbl_mapping
            DB::table('tbl_gd_mapping')->insert([
                'qrcode' => $kode_qrcode,
                'id_gd_plong' => $id_plong,
                'kode_bagian' => $kode_blok,
                'id_keperluan' => $keperluan,
                'keterangan' => $ket,
                'id_user' => $id_user,
                'ip_address' => $ip,
                'lastupdate' => $lastupdate
            ]);
        } else { // jika qrcode multiple
            // total barcode
            $jml_total = $request->qty_total;
            $satuan_total = $request->satuan_total;
            $jml_satuan = $request->qty_satuan;
            $satuan_item = $request->satuan_item;
            $qty_qr = $jml_total / $jml_satuan;

            $tgl_transaksi = date('Y-m-d', strtotime($request->tgl_transaksi));
            $no_transaksi = $request->no_transaksi;
            $kd_barang = $request->kode_barang;
            $kode_blok = $request->blok;
            $id_plong = $request->plong;
            $id_user = session()->get('id_user');
            $ip = $c_info['0']->ip_address;
            $lastupdate = $c_info['0']->tanggal;
            $keperluan = $request->keperluan;
            $ket = $request->keterangan;

            for($i = 1; $i<=$qty_qr; $i++){
                // select id transaksi
                $id_mapping = DB::select("SELECT * FROM vw_gd_id_mapping");
                // format QRCode AA63 201231 0000001
                $kode_bagian = substr($kd_barang, 0, 4);
                $kode_qrcode = $kode_bagian.$id_mapping['0']->id_gd_mapping;

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
                    'jumlah' => $jml_satuan,
                    'satuan' => $satuan_item,
                    'id_user' => $id_user,
                    'ip_address' => $ip,
                    'lastupdate' => $lastupdate
                ]);

                // insert tbl_mapping
                DB::table('tbl_gd_mapping')->insert([
                    'qrcode' => $kode_qrcode,
                    'id_gd_plong' => $id_plong,
                    'kode_bagian' => $kode_blok,
                    'id_keperluan' => $keperluan,
                    'keterangan' => $ket,
                    'id_user' => $id_user,
                    'ip_address' => $ip,
                    'lastupdate' => $lastupdate
                ]);
            }
        }
    }

    public function paginateArray($data, $perPage = 500)
    {
        $page = Paginator::resolveCurrentPage();
        $total = count($data);
        $results = array_slice($data, ($page - 1) * $perPage, $perPage);

        return new LengthAwarePaginator($results, $total, $perPage, $page, [
            'path' => Paginator::resolveCurrentPath(),
        ]);
    }
}