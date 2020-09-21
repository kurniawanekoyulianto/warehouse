<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function login(){
        return view('login');
    }

    public function prosesLogin(Request $request){
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
        
        // cek akses
        $validasiUsers = DB::select("SELECT * FROM vw_gudang_login_akses where nik = '". $request->username."' AND password ='".$request->password."'");

        // tampilkan semua menu sesuai user id
        
        
        // jika data ada dalam array atau not null
        // maka buat session sesuai 'username'
        if ($validasiUsers <> null) {
            if (($validasiUsers['0']->nik <> '') && ($validasiUsers['0']->password <> '')) {
                session([
                    'id_user' => $validasiUsers['0']->id_karyawan,
                    'nik' => $request->username,
                    'nama' => $validasiUsers['0']->nama_lengkap,
                ]);
                return redirect('/');
            } 
        } else {
            // username tidak ada dalam daftar
            return back()->withInput()->with('notifikasi',"Data User Tidak Valid!!");
        }
            
        // if (($validasiUsers['0']->nik == '') && ($validasiUsers['0']->password == '')) {
        //     // jika data ada
        //     return $validasiUsers['0']->password;
        // } else if (($validasiUsers['0']->nik <> '') && ($validasiUsers['0']->password <> '')){
        //     // jika data tidak ada
        //     return $validasiUsers['0']->password;
        // }
        
        //$a = $validasiUsers['0']->nik;
        //return $a;
    }

    public function logout(){
        // hapus session
        session()->forget('nama', 'nik');
        return redirect('login')->with('notifikasi','Logout berhasil!');
    }
}
