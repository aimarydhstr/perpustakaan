<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;
use Auth;

class PeminjamanController extends Controller
{
    public function index()
    {
        try {
            $title = "Halaman Peminjaman Buku";
            $auth = Auth::user()->with('role')->first();
            $books = Buku::with('kategori', 'penulis', 'penerbit')->orderBy('judul', 'ASC')->paginate(10);

            return view('peminjaman.index', compact('title', 'auth', 'books'))->with('i');
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

                return view('peminjaman.data.index', compact('books'))->with('i')->render();
            }
        }

        catch(Throwable $e) {
            report($e);
            
            return false;
        }
    }

    public function create(Request $request, $id)
    {
        try {
            $title = "Halaman Peminjaman Buku";
            $auth = Auth::user()->with('role')->first();
            $members = Anggota::orderBy('nama', 'ASC')->paginate(10);
            $book = Buku::with('kategori', 'penulis', 'penerbit')->where('id_buku', $id)->orderBy('judul', 'ASC')->first();

            return view('peminjaman.create', compact('title', 'auth', 'members', 'book'))->with('i');
        }

        catch(Throwable $e) {
            report($e);
            
            return false;
        }
    }

    public function dataMember(Request $request)
    {
        try {
            if($request->ajax()){
                $search = $request->search;
                $search = str_replace(" ", "%", $search);
                $members = Anggota::where('nama', 'like', '%'.$search.'%')->orderBy('nama', 'ASC')->paginate(10);
                
                return view('peminjaman.data.member', compact('members'))->with('i')->render();
            }
        }

        catch(Throwable $e) {
            report($e);
            
            return false;
        }
    }

    public function store(Request $request)
    {
        try {
            $id = $request->id_anggota;

            $status = Peminjaman::withCount('pengembalian')->where('id_anggota', $id)->orderBy('id_peminjaman', 'DESC')->first();

            if($status){
                if(!$status->pengembalian_count){
                    return redirect()->back()->with('failed', 'Anggota belum mengembalikan buku!');
                } 
            }

            $borrow = Peminjaman::create([
                'id_anggota' => $id,
                'id_buku' => $request->id_buku,
                'id_user' => Auth::user()->id_user,
                'tgl_pinjam' => now(),
                'tgl_kembali' => $request->tgl_kembali
            ]);

            if(!$borrow) return redirect()->back()->with('failed', 'Terdapat kesalahan!');

            return redirect()->route('peminjaman')->with('success', 'Peminjaman buku berhasil!'); 
        }

        catch (Throwable $e) {
            report($e);
            
            return false;
        }
    }
}
