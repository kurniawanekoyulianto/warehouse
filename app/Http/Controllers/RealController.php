<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class RealController extends Controller
{
    // tampilkan semua data realisasi
    public function index() {
        ini_set('memory_limit','2048M');
        $blog = $this->paginateArray(
            DB::select('select * from vw_gd_real')
        );

        return view('real', ['real' => $blog]);
    }

    public function paginateArray($data, $perPage = 10000)
    {
        $page = Paginator::resolveCurrentPage();
        $total = count($data);
        $results = array_slice($data, ($page - 1) * $perPage, $perPage);

        return new LengthAwarePaginator($results, $total, $perPage, $page, [
            'path' => Paginator::resolveCurrentPath(),
        ]);
    }
}