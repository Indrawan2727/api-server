<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laporan;
use App\Petugas;
use App\User;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporan =Laporan::where('status' , '=' , 'Selesai')->simplePaginate(4);
        return view('laporan', compact('laporan'));
    }

    public function cetakLaporan($tglawal, $tglakhir)
    {
        //dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir  : ".$tglakhir]);
        $laporan =Laporan::where('status' , '=' , 'Selesai')->whereBetween('created_at',[$tglawal, $tglakhir])->get();
        return view('cetak-laporan', compact('laporan'));
    }

     public function googlemap($id){
        $laporan = Laporan::findOrFail($id);
        return view('googlemap', compact('laporan'));      

    }
    
    public function Laporanmasuk(){
        $user['listUser'] = Laporan::where('status' , '=' , 'menunggu')->get();
        return view('laporanmasuk')->with($user);
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
    
        public function dashboard()
    {
        $user['listLaporan'] = Laporan::where('status' , '=' , 'Menunggu')->get();
        $laporans = Laporan::where('status' , '=' , 'Menunggu')->count();
        $petugass = Petugas::where('level' , '=' , 'Petugas')->count();
        $users = User::where('level' , '=' , 'menunggu')->count();
        $kat01 = Laporan::where('lokasi', 'LIKE' , '%Kec. Tegal Bar%')
        ->where('status' , '=' , 'Selesai')
        ->count();
        $kat02 = Laporan::where('lokasi', 'LIKE' , '%Kec. Tegal Sel%')
        ->where('status' , '=' , 'Selesai')
        ->count();
        $kat03 = Laporan::where('lokasi', 'LIKE' , '%Kec. Tegal Tim%')
        ->where('status' , '=' , 'Selesai')
        ->count();
        $kat04 = Laporan::where('lokasi', 'LIKE' , '% Kec. Margadana%')
        ->where('status' , '=' , 'Selesai')
        ->count();
        $kat1 = Laporan::where('kategori' , '=' , 'kebakaran')
        ->where('status' , '=' , 'Selesai')
        ->count();
        $kat2 = Laporan::where('kategori' , '=' , 'hewan liar')
        ->where('status' , '=' , 'Selesai')
        ->count();
        $kat3 = Laporan::where('kategori' , '=' , 'bantuan pertolongan')
        ->where('status' , '=' , 'Selesai')
        ->count();
        $kat4 = Laporan::where('kategori' , '=' , 'bencana alam')
        ->where('status' , '=' , 'Selesai')
        ->count();

        return view('dashboard', compact('petugass', 'users' , 'laporans', 'kat01', 'kat02', 'kat03', 'kat04',
        'kat1', 'kat2', 'kat3', 'kat4' ))->with($user);
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
        $fileName = '';
        if($request->image->getClientOriginalName()){
            $file = str_replace(' ', '', $request->image->getClientOriginalName());
            $fileName = date('mYdHs').rand(1,999).'_'.$file;
            $request->image->storeAs('public/laporan', $fileName);
        }

        $user = Laporan::create(array_merge($request->all(), [
            'image' => $fileName
        ]));
        return redirect('laporan');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request)
    {
        //
        $laporans = Laporan::findOrFail($request->id);
        $laporans->status =$request->input('status');
        $this->pushNotif('Laporan', 'Laporan di terima');
        
        $laporans->update();

        return back();
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}