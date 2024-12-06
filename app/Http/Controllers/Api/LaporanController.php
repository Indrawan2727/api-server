<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Laporan;
use App\User;

class LaporanController extends Controller
{
    //
    public function index(){
        // dd($requset->all());die();
        $laporan = Laporan::all();
        return response()->json([
            'success' => 1,
            'message' => 'Get Laporan Berhasil',
            'laporans' => $laporan
        ]);
    }


    public function store(Request $request){
        $validasi = Validator::make($request->all(), [
            'user_id' => 'required',
            'name' => 'required',
            'hp' => 'required',
            'lokasi' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'kategosri' => 'required',
            'deskripsi' => 'required',
            'image' => 'required|image',
            'status' => 'required'
        ]);

        $fileName = '';
        if($request->image->getClientOriginalName()){
            $file = str_replace(' ', '', $request->image->getClientOriginalName());
            $fileName = date('mYdHs').rand(1,999).'_'.$file;
            $request->image->storeAs('public/laporan', $fileName);
        }
        $laporan = Laporan::create(array_merge($request->all(), [
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
    public function update(Request $requset, $id){
        $laporan = Laporan::Where('id', $id)->first();
        if($laporan){
            $laporan->update($requset->all());
            return response()->json([
                'success' => 1,
                'message' => 'Selamat Update Berhasil',
                'laporans' => $laporan
            ]);
        }
        return $this->error("Tidak ada laporan");
    }
    
     public function history(Request $requset, $id){

        $laporan = Laporan::Where('user_id', $id)->first();
            return response()->json([
                'success' => 1,
                'message' => 'Get Laporan Berhasil',
                'laporans' => $laporan
             ]);
        
    }
    
   public function update1(Request $requset, $id){
        $laporan = Laporan::Where('id', $id)->first();
        if($laporan){
            $laporan->update($requset->all());
            
            $this->pushNotif('Laporan', 'Laporan telah selesai');
            
            return response()->json([
                'success' => 1,
                'message' => 'Selesai',
                'laporans' => $laporan
            ]);
        }
        return $this->error("Gagal");
    }
    
    public function pushNotif($title, $message) {

        $mData = [
            'title' => $title,
            'body' => $message
        ];

       $fcm[] = "c88K7XSnRR2gVvZIyd_8j4:APA91bHQQNpLFrjRDOEltUcdPgTwjQMtIG6Jr9BUTwcN7S4QjFuqmPXqNUtYsTA9l8lukoXfE1Yf__kiy8GyQkUe552Ys7y4pQ6HRUhPedVr-VcEiuZmAvu0TeWnD0lBelWh-ofKzesk";

        $payload = [
            'registration_ids' => $fcm,
            'notification' => $mData
        ];

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => array(
                "Content-type: application/json",
                "Authorization: key=AAAARVqMHUk:APA91bFys9OiK91TLdMFwxJqn5GBOFjS8s4YUHUU0sWP_-igrI8BCT3S_5DZqXUpvWg7wMTvP-ccLnD2redePMgKKbhAaFJDJVJiD7fY2M4Mm9xFYhvk9Vj8o5N2eWFPv9Acs40urxjV"
            ),
        ));
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($payload));

        $response = curl_exec($curl);
        curl_close($curl);

        $data = [
            'success' => 1,
            'message' => "Push notif success",
            'data' => $mData,
            'firebase_response' => json_decode($response)
        ];
        return $data;
    }

}
