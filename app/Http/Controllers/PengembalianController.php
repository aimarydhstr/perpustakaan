<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Auth;

class PengembalianController extends Controller
{
    public function index()
    {
        try {
            $title = "Halaman Pengembalian Buku";
            $auth = Auth::user();
            $borrows = Peminjaman::with('buku', 'anggota')->doesntHave('pengembalian')->orderBy('id_peminjaman', 'DESC')->paginate(10);

            return view('pengembalian.index', compact('title', 'auth', 'borrows'))->with('i');
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
                $borrows = Peminjaman::whereRelation('anggota', 'nama', 'like', '%'.$search.'%')->with('buku', 'anggota')->doesntHave('pengembalian')->orderBy('id_peminjaman', 'DESC')->paginate(10);

                return view('pengembalian.data.index', compact('borrows'))->with('i')->render();
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
            $penalty = $request->denda;
            
            if(!$penalty){
                $borrow = Peminjaman::selectRaw('datediff(now(), tgl_kembali) as day')->where('id_peminjaman', $request->id_peminjaman)->first();
                
                if($borrow->day >= 1) $penalty = $borrow->day * 500;
                else $penalty = 0;
            }

            $returning = Pengembalian::create([
                'id_peminjaman' => $request->id_peminjaman,
                'id_user' => Auth::user()->id_user,
                'tgl_kembali' => now(),
                'denda' => $penalty
            ]);

            if(!$returning) return redirect()->back()->with('failed', 'Terdapat kesalahan!');

            return redirect()->route('pengembalian.get', $returning->id_pengembalian)->with('success', 'Pengembalian buku berhasil!');    
        }

        catch (Throwable $e) {
            report($e);
            
            return false;
        }
    }

    public function show($id)
    {
        try {
            $title = "Halaman Detail Pengembalian Buku";
            $auth = Auth::user();
            $returning = Pengembalian::with('peminjaman', 'peminjaman.anggota', 'peminjaman.buku', 'peminjaman.buku.kategori')->where('id_pengembalian', $id)->first();

            $borrow = Peminjaman::selectRaw('datediff(now(), tgl_kembali) as day')->where('id_peminjaman', $returning->id_peminjaman)->first();
                
            if($borrow->day >= 1) {
                $status = 'Terlambat';
            }
            else {
                $status = 'Tepat Waktu';
            }

            return view('pengembalian.get', compact('title', 'auth', 'returning', 'status'));
        }

        catch(Throwable $e) {
            report($e);
            
            return false;
        }
    }
}
