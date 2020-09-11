<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BagianController extends Controller
{
    public function index(){
        $bagian = DB::select('SELECT * FROM tbl_master_gd_bagian');
        return view('bagian', ['bagian' => $bagian]);
    }
}
