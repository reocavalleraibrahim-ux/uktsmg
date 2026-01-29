<?php

namespace App\Http\Controllers;

use App\Models\Jeja;
use Illuminate\Http\Request;
use App\Models\Tingkat;

class JejaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Jeja::join('tingkat','jeja.tingkat', '=', 'tingkat.id')->where(['jeja.id_dojang' => session('id')])->get();
        return view('dashboard.jeja.main', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tingkat = Tingkat::get();
        return view('dashboard.jeja.form',compact('tingkat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_jeja'     =>  'required|string',
            'tempat_lahir'  =>  'required|string',
            'tanggal_lahir' =>  'required|date',
            'tingkat'       =>  'required|string',
            'no_registrasi' =>  'nullable|string',
            'foto'          =>  'nullable|image|mimes:jpg,jpeg,png|max:2048'  
        ]);

        if($request->hasFile('foto')){
            $imagePath = $request->file('foto')->store('foto','public');
            Jeja::create([
                'id_dojang'     =>  session('id'),
                'nama_jeja'     =>  $request->nama_jeja,
                'tempat_lahir'  =>  $request->tempat_lahir,
                'tanggal_lahir' =>  $request->tanggal_lahir,
                'tingkat'       =>  $request->tingkat,
                'no_registrasi' =>  $request->no_registrasi,
                'foto'          =>  $imagePath
            ]);
        }else{
            Jeja::create([
                'id_dojang'     =>  session('id'),
                'nama_jeja'     =>  $request->nama_jeja,
                'tempat_lahir'  =>  $request->tempat_lahir,
                'tanggal_lahir' =>  $request->tanggal_lahir,
                'tingkat'       =>  $request->tingkat,
                'no_registrasi' =>  $request->no_registrasi
            ]);
        }

        return redirect('/jeja')->with('success','Berhasil menambahkan data jeja');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        //
    }
}
