<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Auth;

class KategoriController extends Controller
{
    public function index()
    {
        try {
            $title = "Halaman Kelola Kategori";
            $auth = Auth::user();
            $categories = Kategori::withCount('buku')->orderBy('nama', 'ASC')->paginate(5);

            return view('kategori.index', compact('title', 'auth', 'categories'))->with('i');
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
            $categories = Kategori::withCount('buku')->where('nama', 'like', '%'.$search.'%')->orderBy('nama', 'ASC')->paginate(5);

            return view('kategori.data.index', compact('categories'))->with('i')->render();
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
            $category = Kategori::create(['nama' => $request->nama]);

            if(!$category) return redirect()->back()->with('failed','Terdapat kesalahan!');

            return redirect()->route('kategori')->with('success','Kategori berhasil dibuat!');    
        }

        catch (Throwable $e) {
            report($e);
            
            return false;
        }
    }

    public function show(Request $request, $id)
    {
        try {
            $category = Kategori::where('id_kategori', $id)->first();

            return view('kategori.data.delete', compact('category'))->with('i')->render();
        }

        catch(Throwable $e) {
            report($e);
            
            return false;
        }
    }

    public function edit($id)
    {
        try {
            $category = Kategori::where('id_kategori', $id)->first();

            return view('kategori.data.edit', compact('category'))->with('i')->render();
        }

        catch(Throwable $e) {
            report($e);
            
            return false;
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $category = Kategori::where('id_kategori', $id)->update(['nama' => $request->nama]);

            if(!$category) return redirect()->back()->with('failed','Terdapat kesalahan!');

            return redirect()->route('kategori')->with('success','Kategori berhasil diperbaharui!');    
        }

        catch (Throwable $e) {
            report($e);
            
            return false;
        }
    }

    public function destroy($id)
    {
        try {
            $category = Kategori::where('id_kategori', $id)->delete();

            if(!$category) return redirect()->back()->with('failed','Terdapat kesalahan!');

            return redirect()->route('kategori')->with('success','Kategori berhasil dihapus!');    
        }

        catch (Throwable $e) {
            report($e);
            
            return false;
        }
    }
}
