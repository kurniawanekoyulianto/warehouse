<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SatuanController extends Controller
{
    public function index(){
        $satuan = DB::table('tbl_master_gd_satuan')->paginate(25000);
        return view('satuan', ['satuan' => $satuan]);
    }
}
