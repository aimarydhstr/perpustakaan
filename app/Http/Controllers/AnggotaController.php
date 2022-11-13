<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use Auth;

class AnggotaController extends Controller
{
    public function index()
    {
        try {
            $title = "Halaman Kelola Anggota";
            $auth = Auth::user()->with('role')->first();
            $members = Anggota::orderBy('nama', 'ASC')->paginate(10);

            return view('anggota.index', compact('title', 'auth', 'members'))->with('i');
        }

        catch(Throwable $e) {
            report($e);
            
            return false;
        }
    }

    public function data(Request $request)
    {
        try {
            if($request->ajax()){
                $search = $request->search;
                $search = str_replace(" ", "%", $search);
                $members = Anggota::where('nama', 'like', '%'.$search.'%')->orderBy('nama', 'ASC')->paginate(10);

                return view('anggota.data.index', compact('members'))->with('i')->render();
            }
        }

        catch(Throwable $e) {
            report($e);
            
            return false;
        }
    }
    
    public function create()
    {
        try {
            $title = "Halaman Tambah Anggota";
            $auth = Auth::user()->with('role')->first();

            return view('Anggota.create', compact('title', 'auth'));
        }

        catch(Throwable $e) {
            report($e);
            
            return false;
        }
    }

    public function store(Request $request)
    {
        try {
            $foto = $request->file('foto');
            $photo = 'default.png';

            if($foto){
                $photo = date('YmdHi').$foto->getClientOriginalName();
                $foto->move(public_path('img/anggota'), $photo);
            }

            $member = Anggota::create([
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'foto' => $photo,
                'isActive' => 1
            ]);

            if(!$member) return redirect()->back()->with('failed', 'Terdapat kesalahan!');

            return redirect()->route('anggota')->with('success', 'Anggota berhasil dibuat!');    
        }

        catch (Throwable $e) {
            report($e);
            
            return false;
        }
    }

    public function show($id)
    {
        try {
            $member = Anggota::where('id_anggota', $id)->first();

            return view('anggota.data.delete', compact('member'));
        }

        catch(Throwable $e) {
            report($e);
            
            return false;
        }
    }

    public function edit($id)
    {
        try {
            $title = "Halaman Edit Anggota";
            $auth = Auth::user()->with('role')->first();
            $member = Anggota::where('id_anggota', $id)->first();

            return view('anggota.edit', compact('title', 'auth', 'member'));
        }

        catch(Throwable $e) {
            report($e);
            
            return false;
        }
    }

    public function activate(Request $request, $id)
    {
        try {
            $member = Anggota::where('id_anggota', $id)->first();
            $data = $member->update([
                'isActive' => $request->isActive
            ]);

            if(!$data) return redirect()->back()->with('failed', 'Terdapat kesalahan!');

            return redirect()->route('anggota')->with('success', 'Status anggota berhasil diubah!');    
        }

        catch (Throwable $e) {
            report($e);
            
            return false;
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $foto = $request->file('foto');
            $member = Anggota::where('id_anggota', $id)->first();
            $photo = $member->foto;

            if($foto){
                $photo = date('YmdHi').$foto->getClientOriginalName();
                $foto->move(public_path('img/anggota'), $photo);
            }

            $data = $member->update([
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'foto' => $photo
            ]);

            if(!$data) return redirect()->back()->with('failed', 'Terdapat kesalahan!');

            return redirect()->route('anggota')->with('success', 'Anggota berhasil diperbaharui!');    
        }

        catch (Throwable $e) {
            report($e);
            
            return false;
        }
    }

    public function destroy($id)
    {
        try {
            $member = Anggota::where('id_anggota', $id)->delete();

            if(!$member) return redirect()->back()->with('failed', 'Terdapat kesalahan!');

            return redirect()->route('anggota')->with('success', 'Anggota berhasil dihapus!');    
        }

        catch (Throwable $e) {
            report($e);
            
            return false;
        }
    }
}
