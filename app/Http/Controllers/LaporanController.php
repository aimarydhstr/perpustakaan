<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Anggota;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Auth;

class LaporanController extends Controller
{
    public function indexBuku()
    {
        try {
            $title = "Halaman Laporan Buku";
            $auth = Auth::user();
            $books = Buku::with('kategori', 'penulis', 'penerbit')->orderBy('judul', 'ASC')->paginate(10);

            return view('laporan.buku.index', compact('title', 'auth', 'books'))->with('i');
        }

        catch(Throwable $e) {
            report($e);
            
            return false;
        }
    }

    public function dataBuku(Request $request)
    {
        try {
            if($request->ajax()){
                $search = $request->search;
                $search = str_replace(" ", "%", $search);
                $books = Buku::with('kategori', 'penulis', 'penerbit')->where('judul', 'like', '%'.$search.'%')->orderBy('judul', 'ASC')->paginate(10);

                return view('laporan.buku.data.index', compact('books'))->with('i')->render();
            }
        }

        catch(Throwable $e) {
            report($e);
            
            return false;
        }
    }

    public function indexAnggota()
    {
        try {
            $title = "Halaman Laporan Anggota";
            $auth = Auth::user();
            $members = Anggota::orderBy('nama', 'ASC')->paginate(10);

            return view('laporan.anggota.index', compact('title', 'auth', 'members'))->with('i');
        }

        catch(Throwable $e) {
            report($e);
            
            return false;
        }
    }

    public function dataAnggota(Request $request)
    {
        try {
            if($request->ajax()){
                $search = $request->search;
                $search = str_replace(" ", "%", $search);
                $members = Anggota::where('nama', 'like', '%'.$search.'%')->orderBy('nama', 'ASC')->paginate(10);

                return view('laporan.anggota.data.index', compact('members'))->with('i')->render();
            }
        }

        catch(Throwable $e) {
            report($e);
            
            return false;
        }
    }

    public function indexPeminjaman()
    {
        try {
            $title = "Halaman Laporan Peminjaman";
            $auth = Auth::user();
            $borrows = Peminjaman::with('buku', 'anggota')->orderBy('id_peminjaman', 'DESC')->paginate(10);

            return view('laporan.peminjaman.index', compact('title', 'auth', 'borrows'))->with('i');
        }

        catch(Throwable $e) {
            report($e);
            
            return false;
        }
    }

    public function dataPeminjaman(Request $request)
    {
        try {
            if($request->ajax()){
                $search = $request->search;
                $search = str_replace(" ", "%", $search);
                $borrows = Peminjaman::whereRelation('anggota', 'nama', 'like', '%'.$search.'%')->with('buku', 'anggota')->orderBy('id_peminjaman', 'DESC')->paginate(10);

                return view('laporan.peminjaman.data.index', compact('borrows'))->with('i')->render();
            }
        }

        catch(Throwable $e) {
            report($e);
            
            return false;
        }
    }

    public function indexPengembalian()
    {
        try {
            $title = "Halaman Pengembalian Buku";
            $auth = Auth::user();
            $returnings = Pengembalian::with('peminjaman', 'peminjaman.buku', 'peminjaman.anggota')->orderBy('id_pengembalian', 'DESC')->paginate(10);

            return view('laporan.pengembalian.index', compact('title', 'auth', 'returnings'))->with('i');
        }

        catch(Throwable $e) {
            report($e);
            
            return false;
        }
    }

    public function dataPengembalian(Request $request)
    {
        try {
            if($request->ajax()){
                $search = $request->search;
                $search = str_replace(" ", "%", $search);
                $returnings = Pengembalian::whereRelation('peminjaman', 'anggota', 'nama', 'like', '%'.$search.'%')->with('peminjaman', 'peminjaman.buku', 'peminjaman.anggota')->orderBy('id_pengembalian', 'DESC')->paginate(10);

                return view('laporan.pengembalian.data.index', compact('returnings'))->with('i')->render();
            }
        }

        catch(Throwable $e) {
            report($e);
            
            return false;
        }
    }

}
