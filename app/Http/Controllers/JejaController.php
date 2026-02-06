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
        $data = Jeja::select('tingkat.warna','jeja.*')->join('tingkat','jeja.tingkat', '=', 'tingkat.id')->where(['jeja.id_dojang' => session('id')])->get();
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
            'alamat'        =>  'required|string',
            'nohp'          =>  'required|numeric',
            'tingkat'       =>  'required|string',
            'jkel'          =>  'required|string',
            'no_registrasi' =>  'nullable|string',
            'foto'          =>  'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'id_tcon'       =>  'nullable|string'  
        ]);

        if($request->hasFile('foto')){
            $imagePath = $request->file('foto')->store('foto','public');
            Jeja::create([
                'id_dojang'     =>  session('id'),
                'nama_jeja'     =>  $request->nama_jeja,
                'tempat_lahir'  =>  $request->tempat_lahir,
                'tanggal_lahir' =>  $request->tanggal_lahir,
                'alamat'        =>  $request->alamat,
                'nohp'          =>  $request->nohp,
                'jkel'          =>  $request->jkel,
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
                'alamat'        =>  $request->alamat,
                'nohp'          =>  $request->nohp,
                'jkel'          =>  $request->jkel,
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
        $jeja = Jeja::where(['id' => $id])->first();
        $tingkat = Tingkat::all();
        return view('dashboard.jeja.edit',compact('jeja','tingkat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $request->validate([
            'nama_jeja'     =>  'required|string',
            'tempat_lahir'  =>  'required|string',
            'tanggal_lahir' =>  'required|date',
            'alamat'        =>  'required|string',
            'nohp'          =>  'required|numeric',
            'tingkat'       =>  'required|string',
            'jkel'          =>  'required|string',
            'no_registrasi' =>  'nullable|string',
            'foto'          =>  'nullable|image|mimes:jpg,jpeg,png|max:2048'  
        ]);

        if($request->hasFile('foto')){
            $imagePath = $request->file('foto')->store('foto','public');
            $jeja = Jeja::where(['id' => $id]);
            $jeja->update([
                'id_dojang'     =>  session('id'),
                'nama_jeja'     =>  $request->nama_jeja,
                'tempat_lahir'  =>  $request->tempat_lahir,
                'tanggal_lahir' =>  $request->tanggal_lahir,
                'alamat'        =>  $request->alamat,
                'nohp'          =>  $request->nohp,
                'jkel'          =>  $request->jkel,
                'tingkat'       =>  $request->tingkat,
                'no_registrasi' =>  $request->no_registrasi,
                'foto'          =>  $imagePath
            ]);
        }else{
            $jeja = Jeja::where(['id' => $id]);
            $jeja->update([
                'id_dojang'     =>  session('id'),
                'nama_jeja'     =>  $request->nama_jeja,
                'tempat_lahir'  =>  $request->tempat_lahir,
                'tanggal_lahir' =>  $request->tanggal_lahir,
                'alamat'        =>  $request->alamat,
                'nohp'          =>  $request->nohp,
                'jkel'          =>  $request->jkel,
                'tingkat'       =>  $request->tingkat,
                'no_registrasi' =>  $request->no_registrasi
            ]);
        }

        return redirect('/jeja')->with('success','Berhasil update data jeja');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $jeja = Jeja::where(['id' => $id]);
        $jeja->delete($id);

        return redirect('/jeja')->with('success','Berhasil menghapus data jeja');
    }
}
