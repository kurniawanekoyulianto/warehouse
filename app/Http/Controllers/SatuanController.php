<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SatuanController extends Controller
{
    public function index(){
        $satuan = DB::select("SELECT * FROM vw_master_gd_satuan");
        return view('satuan', ['satuan' => $satuan]);
    }
}
