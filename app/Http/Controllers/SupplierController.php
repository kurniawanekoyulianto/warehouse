<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    public function index(){
        // sementara pakai tbl -> nanti pakai hasil import dari MySQL
        $supplier = DB::table('tbl_master_gd_supplier')->get();
        return view('supplier', ['supplier' => $supplier]);
        // return $supplier;
    }
}