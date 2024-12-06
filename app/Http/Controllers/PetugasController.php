<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Petugas;

class PetugasController extends Controller
{
    //
    public function index()
    {
        $petugas['petugas'] = Petugas::all();
        return view('petugas')->with($petugas); 
    }
    
    public function update(Request $request){
        $petugas = Petugas::findOrFail($request->id);
        $petugas->level = $request->input('level');
        $petugas->update();
        return redirect('petugas');
    }
    
    public function store(Request $request)
    {
        $petugas = Petugas::create($request->all());
        return view('petugas')->with($petugas);
    }
    public function destroy($id)
    {
        //
        //get post by ID
        $post = Petugas::findOrFail($id);

        //delete image
        //Storage::delete('public/posts/'. $post->image);

        //delete post
        $post->delete();

        //redirect to index
        return redirect('user')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
