<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user['listUser'] = User::where('level' , '=' , 'Aktif')->get();
        return view('user')->with($user); 
    }

    public function usermasuk(){
        $user['listUser'] = User::where('level' , '=' , 'menunggu')->get();
        return view('usermasuk')->with($user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    
     public function update(Request $request)
    {
        //
        $users = User::findOrFail($request->id);
        $users->level = $request->input('level');
        $users->update();
        return redirect('usermasuk');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $users = User::findOrFail($id);
        return view ('edit-user')->with('users',$users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userupdate1(Request $request)
    {
       $users = User::where('id', $request->id)->first();
       if($users){
           $users->update($request->all());
           return response()->json([
               'success' => 1,
               'message' => 'User berhasil Diupdate',
               'data' => $request->all()
           ]);
       }else{
           return response()->json([
               'success' => 0,
               'message' => 'User Tidak Ditemukan',
               'data' => $request->all()
           ]);
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //get post by ID
        $post = User::findOrFail($id);

        //delete image
        //Storage::delete('public/posts/'. $post->image);

        //delete post
        $post->delete();

        //redirect to index
        return redirect('user')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    public function userupdate2(Request $request , $id)
    {
        $users = User::find($id);
        $users->name =$request->input('name');
        $users->level =$request->input('level');
        $users->update();

        return redirect('/user');
    }

}
