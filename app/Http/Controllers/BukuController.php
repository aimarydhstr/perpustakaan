<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penulis;
use App\Models\Penerbit;
use Auth;

class BukuController extends Controller
{
    public function index()
    {
        try {
            $title = "Halaman Kelola Buku";
            $auth = Auth::user();
            $books = Buku::with('kategori', 'penulis', 'penerbit')->orderBy('judul', 'ASC')->paginate(10);

            return view('buku.index', compact('title', 'auth', 'books'))->with('i');
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
                $books = Buku::with('kategori', 'penulis', 'penerbit')->where('judul', 'like', '%'.$search.'%')->orderBy('judul', 'ASC')->paginate(10);

                return view('buku.data.index', compact('books'))->with('i')->render();
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
            $title = "Halaman Tambah Buku";
            $auth = Auth::user();
            $categories = Kategori::orderBy('nama', 'ASC')->get();
            $authors = Penulis::orderBy('nama', 'ASC')->get();
            $publishers = Penerbit::orderBy('nama', 'ASC')->get();

            return view('buku.create', compact('title', 'auth', 'categories', 'authors', 'publishers'));
        }

        catch(Throwable $e) {
            report($e);
            
            return false;
        }
    }

    public function store(Request $request)
    {
        try {
            $kategori = $request->kategori;
            $penulis = $request->penulis;
            $penerbit = $request->penerbit;
            $foto = $request->file('foto');
            $photo = 'default.png';

            $category = Kategori::where('nama', $kategori)->first();
            $author = Penulis::where('nama', $penulis)->first();
            $publisher = Penerbit::where('nama', $penerbit)->first();

            if(!$category) $category = Kategori::create(['nama' => $kategori]);
            
            if(!$author) $author = Penulis::create(['nama' => $penulis]);

            if(!$publisher) $publisher = Penerbit::create(['nama' => $penerbit]);

            if($foto){
                $photo = date('YmdHi').$foto->getClientOriginalName();
                $foto->move(public_path('img/buku'), $photo);
            }

            $book = Buku::create([
                'judul' => $request->judul,
                'id_kategori' => $category->id_kategori,
                'id_penulis' => $author->id_penulis,
                'id_penerbit' => $publisher->id_penerbit,
                'isbn' => $request->isbn,
                'tahun_terbit' => $request->tahun_terbit,
                'stok' => $request->stok,
                'foto' => $photo
            ]);

            if(!$book) return redirect()->back()->with('failed', 'Terdapat kesalahan!');

            return redirect()->route('buku')->with('success', 'Buku berhasil dibuat!');    
        }

        catch (Throwable $e) {
            report($e);
            
            return false;
        }
    }

    public function show($id)
    {
        try {
            $book = Buku::with('kategori', 'penulis', 'penerbit')->where('id_buku', $id)->first();

            return view('buku.data.delete', compact('book'));
        }

        catch(Throwable $e) {
            report($e);
            
            return false;
        }
    }

    public function edit($id)
    {
        try {
            $title = "Halaman Edit Buku";
            $auth = Auth::user();
            $book = Buku::with('kategori', 'penulis', 'penerbit')->where('id_buku', $id)->first();
            $categories = Kategori::orderBy('nama', 'ASC')->get();
            $authors = Penulis::orderBy('nama', 'ASC')->get();
            $publishers = Penerbit::orderBy('nama', 'ASC')->get();

            return view('buku.edit', compact('title', 'auth', 'book', 'categories', 'authors', 'publishers'));
        }

        catch(Throwable $e) {
            report($e);
            
            return false;
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $kategori = $request->kategori;
            $penulis = $request->penulis;
            $penerbit = $request->penerbit;
            $foto = $request->file('foto');
            $book = Buku::where('id_buku', $id)->first();
            $photo = $book->foto;

            $category = Kategori::where('nama', $kategori)->first();
            $author = Penulis::where('nama', $penulis)->first();
            $publisher = Penerbit::where('nama', $penerbit)->first();

            if(!$category) $category = Kategori::create(['nama' => $kategori]);
            
            if(!$author) $author = Penulis::create(['nama' => $penulis]);

            if(!$publisher) $publisher = Penerbit::create(['nama' => $penerbit]);

            if($foto){
                $photo = date('YmdHi').$foto->getClientOriginalName();
                $foto->move(public_path('img/buku'), $photo);
            }

            $data = $book->update([
                'judul' => $request->judul,
                'id_kategori' => $category->id_kategori,
                'id_penulis' => $author->id_penulis,
                'id_penerbit' => $publisher->id_penerbit,
                'isbn' => $request->isbn,
                'tahun_terbit' => $request->tahun_terbit,
                'stok' => $request->stok,
                'foto' => $photo
            ]);

            if(!$data) return redirect()->back()->with('failed', 'Terdapat kesalahan!');

            return redirect()->route('buku')->with('success', 'Buku berhasil diperbaharui!');    
        }

        catch (Throwable $e) {
            report($e);
            
            return false;
        }
    }

    public function destroy($id)
    {
        try {
            $book = Buku::where('id_buku', $id)->delete();

            if(!$book) return redirect()->back()->with('failed', 'Terdapat kesalahan!');

            return redirect()->route('buku')->with('success', 'Buku berhasil dihapus!');    
        }

        catch (Throwable $e) {
            report($e);
            
            return false;
        }
    }
}
