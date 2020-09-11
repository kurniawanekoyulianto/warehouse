<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MesinController extends Controller
{
    public function index(){
        $mesin = DB::select('SELECT * FROM vw_master_gd_mesin');
        return view('mesin', ['mesin' => $mesin]);
    }
}
