<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alat;

class AlatController extends Controller
{
    //
    public function index()
    {
        $alat['listAlat'] = Alat::all();
        return view('alat')->with($alat); 
    }

    public function store(Request $request)
    {
        $fileName = '';
        if ($request->image->getClientOriginalName()) {
            $file = str_replace(' ', '', $request->image->getClientOriginalName());
            $fileName = date('mYdHs') . rand(1, 999) . '_' . $file;
            $request->image->storeAs('public/laporan', $fileName);
        }

        $user = Alat::create(array_merge($request->all(), [
            'image' => $fileName
        ]));
        return redirect('alat');
    }
    public function update(Request $request)
    {
        //
        $laporans = Alat::findOrFail($request->id);
        $laporans->jumlah = $request->input('jumlah');
        $laporans->update();
        return redirect('alat');
    }
}
