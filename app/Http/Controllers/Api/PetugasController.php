<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Petugas;
use Illuminate\Support\Facades\Validator;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; 

class PetugasController extends Controller
{
    public function loginp(Request $requset){
        // dd($requset->all());die();
        $user = Petugas::where('email', $requset->email)->first();
        if($user){
            if(password_verify($requset->password, $user->password)){
                return response()->json([
                    'success' => 1,
                    'message' => 'Selamat datang '.$user->name,
                    'user' => $user
                ]);
            }
            return $this->error('Password Salah');
        }
        return $this->error('Email tidak terdaftar');
    }

    public function registerp(Request $requset){
        //nama, email, password
        $validasi = Validator::make($requset->all(), [
            'name' => 'required',
            'nik' => 'required|min:16|unique:petugass',
            'email' => 'required|unique:petugass',
            'phone' => 'required|unique:petugass',
            'password' => 'required|min:8'
        ]);

        if($validasi->fails()){
            $val = $validasi->errors()->all();
            return $this->error($val[0]);
        }

        $user = Petugas::create(array_merge($requset->all(), [
            'password' => bcrypt($requset->password)
        ]));

        if($user){
            return response()->json([
                'success' => 1,
                'message' => 'Selamat datang Register Berhasil',
                'user' => $user
            ]);
        }

        return $this->error('Registrasi gagal');

    }
    public function update(Request $requset, $id){
        $user = Petugas::Where('id', $id)->first();
        if($user){
            $user->update($requset->all());
            return response()->json([
                'success' => 1,
                'message' => 'Selamat Update Berhasil',
                'user' => $user
            ]);
        }
        return $this->error("Tidak ada petugas");
    }

    public function error($pasan){
        return response()->json([
            'success' => 0,
            'message' => $pasan
        ]);
    }
    protected function guard()
    {
        return Auth::guard('petugas_web');
    }
}
