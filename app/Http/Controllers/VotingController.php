<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class VotingController extends Controller
{
    public function tbvotingview(){
        $voting = DB::table('voting')->get();
        return view('tablevoting',['voting'=>$voting]);
    }
    public function storetambah(Request $request){
        DB::table('voting')->insert([
            'nama'=> $request->nama,
            'nim'=> $request->nim,
            'semester'=>$request->semester,
            'pilihan'=> $request->pilihan
        ]);
        return redirect('/tablevoting');
    }
    public function tambah(){
        return view('pemilihan');
    }
    public function hapus($id) {
        DB::table('voting')->where('id_voting',$id)->delete();
        return redirect('/tablevoting');
    }
    public function edit($id)
{
// mengambil data pegawai berdasarkan id yang dipilih
$voting = DB::table('voting')->where('id_voting',$id)->get();
// passing data pegawai yang didapat ke view edit.blade.php
return view('editvoting',['voting' => $voting]);
}
public function storeupdate(Request $request)
{
// update data pegawai
DB::table('voting')->where('id_voting',$request->id)->update([
'nama' => $request->nama,
'nim' => $request->nim,
'semester'=>$request->semester,
'pilihan' => $request->pilihan
]);
// alihkan halaman ke halaman pegawai
return redirect('/tablevoting');
}
}
