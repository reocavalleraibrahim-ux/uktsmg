<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UKT;
use App\Models\Jeja;
use App\Models\Registrasi;

class UKTController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ukt = UKT::get();
        return view('dashboard.ukt.main',compact('ukt'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.ukt.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_ukt'      =>  'required|string',
            'jenis_ukt'     =>  'required|string',
            'periode'       =>  'required|numeric',
            'tanggal_mulai' =>  'required|date',
            'tanggal_akhir' =>  'required|date',
            'tempat_ukt'    =>  'required|string',
            'informasi'     =>  'string'
        ]);
        UKT::create($data);

        return redirect('/ukt')->with('success','Berhasil membuat event UKT');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ukt = UKT::where(['id' => $id])->first();
        return view('dashboard.ukt.edit',compact('ukt'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'nama_ukt'      =>  'required|string',
            'jenis_ukt'     =>  'required|string',
            'periode'       =>  'required|numeric',
            'tanggal_mulai' =>  'required|date',
            'tanggal_akhir' =>  'required|date',
            'tempat_ukt'    =>  'required|string',
            'informasi'     =>  'string'
        ]);
        $ukt = UKT::where(['id' => $id]);

        $ukt->update($data);

        return redirect('/ukt')->with('success','Berhasil edit event UKT');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function eventUKT()
    {
        $ukt = UKT::get();
        return view('dashboard.event.ukt.main',compact('ukt'));
    }

    public function daftarUKT($id_event)
    {
        $event = UKT::where(['id' => $id_event])->first();
        if(session('role') == 'admin'){
            $jeja = Jeja::select('jeja.id as id_jeja','jeja.nama_jeja','jeja.jkel','jeja.tingkat','users.name as dojang','tingkat.warna','registrasi.status','registrasi.id as id_registrasi')->join('users','jeja.id_dojang','=','users.id')->join('tingkat','jeja.tingkat','=','tingkat.id')->leftJoin('registrasi','registrasi.id_jeja','=','jeja.id')->get();
        }else{
            $jeja = Jeja::select('jeja.id as id_jeja','jeja.nama_jeja','jeja.jkel','jeja.tingkat','users.name as dojang','tingkat.warna','registrasi.status','registrasi.id as id_registrasi')->join('users','jeja.id_dojang','=','users.id')->join('tingkat','jeja.tingkat','=','tingkat.id')->where(['jeja.id_dojang' => session('id')])->leftJoin('registrasi','registrasi.id_jeja','=','jeja.id')->get();
        }
        
        return view('dashboard.event.ukt.daftar',compact('jeja','event'));
    }

    public function registUKT(Request $request)
    {
        $data = $request->validate([
            'id_ukt'    =>  'required|numeric',
            'id_jeja'   =>  'required|numeric'
        ]);

        Registrasi::create($data);

        return redirect('/daftarUKT/'.$request->id_ukt)->with('success','Berhasil Daftar Jeja ke UKT');
    }
}
