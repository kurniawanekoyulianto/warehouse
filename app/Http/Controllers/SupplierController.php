<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    public function index(){
        // sementara pakai tbl -> nanti pakai hasil import dari MySQL
        $supplier = DB::select('SELECT * FROM tbl_master_gd_supplier');
        return view('supplier', ['supplier' => $supplier]);
    }
}