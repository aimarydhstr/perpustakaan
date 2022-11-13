<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penulis;
use Auth;

class PenulisController extends Controller
{
    public function index()
    {
        try {
            $title = "Halaman Kelola Penulis";
            $auth = Auth::user()->with('role')->first();
            $authors = Penulis::withCount('buku')->orderBy('nama', 'ASC')->paginate(5);

            return view('penulis.index', compact('title', 'auth', 'authors'))->with('i');
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
            $authors = Penulis::withCount('buku')->where('nama', 'like', '%'.$search.'%')->orderBy('nama', 'ASC')->paginate(5);

            return view('penulis.data.index', compact('authors'))->with('i')->render();
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
            $author = Penulis::create(['nama' => $request->nama]);

            if(!$author) return redirect()->back()->with('failed','Terdapat kesalahan!');

            return redirect()->route('penulis')->with('success','Penulis berhasil dibuat!');    
        }

        catch (Throwable $e) {
            report($e);
            
            return false;
        }
    }

    public function show(Request $request, $id)
    {
        try {
            $author = Penulis::where('id_penulis', $id)->first();

            return view('penulis.data.delete', compact('author'))->with('i')->render();
        }

        catch(Throwable $e) {
            report($e);
            
            return false;
        }
    }

    public function edit($id)
    {
        try {
            $author = Penulis::where('id_penulis', $id)->first();

            return view('penulis.data.edit', compact('author'))->with('i')->render();
        }

        catch(Throwable $e) {
            report($e);
            
            return false;
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $author = Penulis::where('id_penulis', $id)->update(['nama' => $request->nama]);

            if(!$author) return redirect()->back()->with('failed','Terdapat kesalahan!');

            return redirect()->route('penulis')->with('success','Penulis berhasil diperbaharui!');    
        }

        catch (Throwable $e) {
            report($e);
            
            return false;
        }
    }

    public function destroy($id)
    {
        try {
            $author = Penulis::where('id_penulis', $id)->delete();

            if(!$author) return redirect()->back()->with('failed','Terdapat kesalahan!');

            return redirect()->route('penulis')->with('success','Penulis berhasil dihapus!');    
        }

        catch (Throwable $e) {
            report($e);
            
            return false;
        }
    }
}
