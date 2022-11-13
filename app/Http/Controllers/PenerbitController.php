<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penerbit;
use Auth;

class PenerbitController extends Controller
{
    public function index()
    {
        try {
            $title = "Halaman Kelola Penerbit";
            $auth = Auth::user()->with('role')->first();
            $publishers = Penerbit::withCount('buku')->orderBy('nama', 'ASC')->paginate(5);

            return view('penerbit.index', compact('title', 'auth', 'publishers'))->with('i');
        }

        catch(Throwable $e) {
            report($e);
            
            return false;
        }
    }

    public function data(Request $request)
    {
        try {
            $search = $request->search;
            $search = str_replace(" ", "%", $search);
            $publishers = Penerbit::withCount('buku')->where('nama', 'like', '%'.$search.'%')->orderBy('nama', 'ASC')->paginate(5);

            return view('penerbit.data.index', compact('publishers'))->with('i')->render();
        }

        catch(Throwable $e) {
            report($e);
            
            return false;
        }
    }

    public function create()
    {
        abort(404);
    }

    public function store(Request $request)
    {
        try {
            $publisher = Penerbit::create(['nama' => $request->nama]);

            if(!$publisher) return redirect()->back()->with('failed','Terdapat kesalahan!');

            return redirect()->route('penerbit')->with('success','Penerbit berhasil dibuat!');    
        }

        catch (Throwable $e) {
            report($e);
            
            return false;
        }
    }

    public function show(Request $request, $id)
    {
        try {
            $publisher = Penerbit::where('id_penerbit', $id)->first();

            return view('penerbit.data.delete', compact('publisher'))->with('i')->render();
        }

        catch(Throwable $e) {
            report($e);
            
            return false;
        }
    }

    public function edit($id)
    {
        try {
            $publisher = Penerbit::where('id_penerbit', $id)->first();

            return view('penerbit.data.edit', compact('publisher'))->with('i')->render();
        }

        catch(Throwable $e) {
            report($e);
            
            return false;
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $publisher = Penerbit::where('id_penerbit', $id)->update(['nama' => $request->nama]);

            if(!$publisher) return redirect()->back()->with('failed','Terdapat kesalahan!');

            return redirect()->route('penerbit')->with('success','Penerbit berhasil diperbaharui!');    
        }

        catch (Throwable $e) {
            report($e);
            
            return false;
        }
    }

    public function destroy($id)
    {
        try {
            $publisher = Penerbit::where('id_penerbit', $id)->delete();

            if(!$publisher) return redirect()->back()->with('failed','Terdapat kesalahan!');

            return redirect()->route('penerbit')->with('success','Penerbit berhasil dihapus!');    
        }

        catch (Throwable $e) {
            report($e);
            
            return false;
        }
    }
}
