<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Alat;

class AlatController extends Controller
{
    public function store(Request $request){
        $validasi = Validator::make($request->all(), [
            'name' => 'required',
            'deskripsi' => 'required',
            'jumlah' => 'required',
            'image' => 'required|image'
        ]);

        $fileName = '';
        if($request->image->getClientOriginalName()){
            $file = str_replace(' ', '', $request->image->getClientOriginalName());
            $fileName = date('mYdHs').rand(1,999).'_'.$file;
            $request->image->storeAs('public/laporan', $fileName);
        }
        $laporan = Alat::create(array_merge($request->all(), [
            'image' => $fileName
        ]));

        if($laporan){
            return response()->json([
                'success' => 1,
                'message' => 'Berhasil Lapor',
                'laporan' => $laporan
            ]);
        }
        return $this->error('gagal');
    }
}