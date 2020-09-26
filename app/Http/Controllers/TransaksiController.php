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

    // tampilkan semua data bpp sesuai dengan nomor dan kode barang
    public function nomorbpb($nomor, $kode) {
        $nomorbpb = DB::select("SELECT * FROM vw_gd_cek_bpb WHERE nomor = '".$nomor."'");
        $selectdata = DB::select("SELECT * FROM vw_gd_cek_bpb WHERE nomor = '".$nomor."' AND kode = '".$kode."'");
        $satuan = DB::select('SELECT * FROM vw_master_gd_satuan');
        $plong = DB::select('SELECT * FROM vw_master_gd_plong');
        $keperluan = DB::select("SELECT * FROM vw_master_gd_keperluan_in");
        $dataqr = DB::select("SELECT * FROM vw_gd_data_qrcode WHERE nomor_transaksi ='".$nomor."'");

        return view('form.form-bpb', [
            'bpb' => $nomorbpb, 
            'select' => $selectdata, 
            'plong' => $plong,
            'satuan' => $satuan,
            'keperluan' => $keperluan, 
            'dataqr' => $dataqr
        ]);
    }

    // save mapping & cetak qrcode
    public function saveMapping(Request $request){
        ini_set('max_execution_time', 180); //3 minutes execution time
        DB::disableQueryLog(); //disable log query
        $c_info = DB::select("SELECT * FROM vw_cetak_current_info");

        // variable general
        $no_transaksi = $request->no_transaksi;
        $kd_barang = $request->kode_barang;
        $bag = $request->bagian;
        $id_plong = $request->plong;
        $id_user = session()->get('id_user');
        $ip = $c_info['0']->ip_address;
        $lastupdate = $c_info['0']->tanggal;
        $keperluan = $request->keperluan;
        $ket = $request->keterangan;
        $form = $request->form;

        //cek general atau unique QRCode
        if ($request->jenis_qrcode == "single") { // jika qrcode general
            $init = 'G';
            // variabel spesifik
            $qty_tot = $request->qty_total;
            $satuan_tot = $request->satuan_total;
            $qty_item = $request->qty_item;
            $satuan_item = $request->satuan_item;
            $qty_qrcode = $qty_item; // jika qrcode general, qty qrcode diambil dari banyaknya item

            $qty_ukur = $qty_tot/$qty_item;
            $satuan_ukur = $satuan_tot;

            // select id qrcode
            $id_qrcode = DB::select("SELECT * FROM vw_gd_id_qrcode");
            // format QRCode G AA63 201231 0000001
            $kode_bagian = substr($kd_barang, 0, 4);
            $kode_qrcode = $init.$kode_bagian.$id_qrcode['0']->id_gd_qrcode;

            // generate qrcode
            QrCode::size(0)
            ->format('svg')
            ->generate($kode_qrcode, public_path('qrcode/mapping/'.$kode_qrcode.'.svg'));

            // insert row
            for($i = 1; $i<=$qty_qrcode; $i++){
                $id_mapping = DB::select("SELECT * FROM vw_gd_id_mapping");

                // insert tbl_barcode
                DB::table('tbl_gd_barcode')->insert([
                    'id_barcode' => $id_mapping['0']->id_gd_mapping,
                    'tanggal_barcode' => $lastupdate,
                    'nomor_transaksi' => $no_transaksi,
                    'kode_barang' => $kd_barang,
                    'qrcode' => $kode_qrcode,
                    'id_user' => $id_user,
                    'ip_address' => $ip,
                    'lastupdate' => $lastupdate,
                    'qty_fisik' => 1, // karena insert per row jadi qty fisik 1 semua
                    'satuan_fisik' => $satuan_item,
                    'qty_ukur' => $qty_ukur,
                    'satuan_ukur' => $satuan_ukur,
                    'jns_qrcode' => $init,
                    'id_gd_plong' => $id_plong,
                    'kode_bagian' => $bag,
                    'id_keperluan' => $keperluan,
                    'keterangan' => $ket,
                    'form' => $form,
                ]);
            }
        } else { // jika qrcode unique
            $init = 'U';
            // variabel spesifik
            $qty_tot = $request->qty_total;
            $satuan_tot = $request->satuan_total;
            $qty_item = $request->qty_item;
            $satuan_item = $request->satuan_item;
            $qty_qrcode = $qty_item; // jika qrcode unique, qty qrcode diambil dari qty_total / qty_item

            $qty_ukur = $qty_tot/$qty_item;
            $satuan_ukur = $satuan_tot;

            // insert row
            for($i = 1; $i<=$qty_qrcode; $i++){
                $id_mapping = DB::select("SELECT * FROM vw_gd_id_mapping");
                // select id qrcode
                $id_qrcode = DB::select("SELECT * FROM vw_gd_id_qrcode");
                // format QRCode U AA63 201231 0000001
                $kode_bagian = substr($kd_barang, 0, 4);
                $kode_qrcode = $init.$kode_bagian.$id_mapping['0']->id_gd_mapping;

                // generate qrcode
                QrCode::size(0)
                ->format('svg')
                ->generate($kode_qrcode, public_path('qrcode/mapping/'.$kode_qrcode.'.svg'));

                // insert tbl_barcode
                DB::table('tbl_gd_barcode')->insert([
                    'id_barcode' => $id_mapping['0']->id_gd_mapping,
                    'tanggal_barcode' => $lastupdate,
                    'nomor_transaksi' => $no_transaksi,
                    'kode_barang' => $kd_barang,
                    'qrcode' => $kode_qrcode,
                    'id_user' => $id_user,
                    'ip_address' => $ip,
                    'lastupdate' => $lastupdate,
                    'qty_fisik' => 1, // karena insert per row jadi qty fisik 1 semua
                    'satuan_fisik' => $satuan_item,
                    'qty_ukur' => $qty_ukur,
                    'satuan_ukur' => $satuan_ukur,
                    'jns_qrcode' => $init,
                    'id_gd_plong' => $id_plong,
                    'kode_bagian' => $bag,
                    'id_keperluan' => $keperluan,
                    'keterangan' => $ket,
                    'form' => $form,
                ]);
            }
        }
    
        // return view input qrcode BPB
        return redirect('/bpb/'.$no_transaksi.'/'.$kd_barang);
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

    public function printQRCode($nomor_transaksi){
        // // select data from view 
        $dataqr = DB::select("SELECT * FROM vw_gd_data_qrcode WHERE nomor_transaksi ='".$nomor_transaksi."'");
        return view('qrcode.qrcode-print', ['data' => $dataqr]);
    }
}