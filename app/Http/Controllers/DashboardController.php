<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Buku;
use App\Models\Anggota;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Auth;

class DashboardController extends Controller
{
    function index(Request $request)
    {
        try {
            $title = "Halaman Dashboard";
            $auth = Auth::user();

            if($auth->role->nama == 'Petugas') return redirect()->route('peminjaman');
            
            $anggota = Anggota::where('isActive', 1)->orderBy('id_anggota', 'DESC')->limit(6)->get();
            $peminjaman = Peminjaman::with('anggota', 'buku', 'user')->whereDay('tgl_pinjam', now()->format('d'))->get();
            $pengembalian = Pengembalian::with('peminjaman.anggota', 'peminjaman.buku', 'user')->whereDay('tgl_kembali', now()->format('d'))->get();

            $totalBuku = Buku::count();
            $totalAnggota = Anggota::where('isActive', 1)->count();
            $totalDenda = Pengembalian::whereMonth('tgl_kembali', now()->format('m'))->sum('denda');


            return view('dashboard.index', compact('title', 'auth', 'totalBuku', 'totalAnggota', 'totalDenda', 'peminjaman', 'pengembalian', 'anggota'))->with('i')->with('j');

            // $isbnBuku = substr($isbn, 0, 3).'-'.substr($isbn, 3, 3).'-'.substr($isbn, 6, 4).'-'.substr($isbn, 12, 1);
        }

        catch(Throwable $e) {
            report($e);
            
            return false;
        }
    }
}
