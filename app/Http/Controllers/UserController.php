<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where(['role' => 'user'])->get();
        return view('dashboard.user.main',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.user.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          =>  'required|string',
            'username'      =>  'required|string',
            'phone'         =>  'required|numeric',
            'nama_pelatih'  =>  'required|string'
        ]);

        User::create([
            'name'          =>  $request->name,
            'username'      =>  $request->username,
            'password'      =>  Hash::make($request->phone),
            'role'          =>  'user',
            'nohp'          =>  $request->phone,
            'nama_pelatih'  =>  $request->nama_pelatih
        ]);

        return redirect('/users')->with('success','berhasil membuat akun');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::find($id);

        return view('dashboard.user.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::where(['id' => $id]);

        $user->update([
            'name'          =>  $request->name,
            'username'      =>  $request->username,
            'nohp'          =>  $request->phone,
            'nama_pelatih'  =>  $request->nama_pelatih
        ]);

        return redirect('/users')->with('success','berhasil update akun dojang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function resetPass()
    {
        return view('dashboard.user.reset');
    }

    public function updatePass(Request $request)
    {
        $dat = User::where(['id' => session('id')])->first();

        if($dat->nohp == $request->nohp){
            if($request->password === $request->password1){
                $usr = User::where(['id' => session('id')]);
                $usr->update(['password' => Hash::make($request->password)]);


                Auth::logout();

                $request->session()->invalidate();
                $request->session()->regenerateToken();

                 return redirect('/login')->with('success','Berhasil Reset Password');
            }else{
                return redirect()->back()->with('error','Password dan Konfirmasi Password tidak sama');
            }
        }else{
            return redirect()->back()->with('error','No HP Tidak Cocok');
        }
    }
}
