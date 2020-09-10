<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MesinController extends Controller
{
    public function index(){
        $mesin = DB::table('tbl_master_mesin')->orderBy('nama_mesin','asc')->get();
        return view('mesin', ['mesin' => $mesin]);
    }
}
