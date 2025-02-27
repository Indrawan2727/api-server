<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Validator; 

class UserController extends Controller
{
    public function login(Request $requset){
        // dd($requset->all());die();
        $user = User::where('email', $requset->email)->first();
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

    public function register(Request $requset){
        //nama, email, password
        $validasi = Validator::make($requset->all(), [
            'name' => 'required',
            'nik' => 'required|min:16|unique:users',
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required|min:8'
        ]);

        if($validasi->fails()){
            $val = $validasi->errors()->all();
            return $this->error($val[0]);
        }

        $user = User::create(array_merge($requset->all(), [
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
        $user = User::Where('id', $id)->first();
        if($user){
            $user->update($requset->all());
            return response()->json([
                'success' => 1,
                'message' => 'Selamat Update Berhasil',
                'user' => $user
            ]);
        }
        return $this->error("Tidak ada user");
    }

    public function error($pasan){
        return response()->json([
            'success' => 0,
            'message' => $pasan
        ]);
    }

    public function updatestatus(Request $requset, $id){
        $user = User::Where('phone', $id)->first();
        if($user){
            $user->update($requset->all());
            return response()->json([
                'success' => 0,
                'message' => "Berhasil"
            ]);
        }
        return $this->error("gagal");
    }
}

