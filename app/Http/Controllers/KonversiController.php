<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// untuk pagination
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class KonversiController extends Controller
{
    public function index(){
        ini_set('memory_limit','2048M');
        $konversi = $this->paginateArray(
            DB::select('select * from vw_master_gd_konversi')
        );

        return view('konversi', ['konversi' => $konversi]);
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
}