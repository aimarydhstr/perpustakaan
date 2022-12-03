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
            $borrows = Peminjaman::whereDay('tgl_pinjam', now())->with('buku', 'anggota')->orderBy('id_peminjaman', 'DESC')->paginate(10);

            $statuses = [];
            $i = 0;

            foreach($borrows as $borrow){
                $returning = Pengembalian::where('id_peminjaman', $borrow->id_peminjaman)->first();
                if ($returning) {
                    $status = 'Sudah';
                    array_push($statuses, $status);
                } else {
                    $status = 'Belum';
                    array_push($statuses, $status);
                }
            }

            $borrowDay = Peminjaman::whereDay('tgl_pinjam', now())->count();
            $borrowMonth = Peminjaman::whereMonth('tgl_pinjam', now())->count();
            $borrowTotal = Peminjaman::count();

            return view('laporan.peminjaman.index', compact('title', 'auth', 'borrows', 'borrowTotal', 'borrowMonth', 'borrowDay', 'statuses', 'i'));
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
                $search = str_replace(" ", "%", $request->search);
                $firstDate = str_replace(" ", "", $request->firstDate);
                $secondDate = str_replace(" ", "", $request->secondDate);

                if (!$firstDate) {
                    $firstDate = '0000-00-00';
                }
                if (!$secondDate) {
                    $secondDate = now();
                }

                $borrows = Peminjaman::whereBetween('tgl_pinjam', array($firstDate, $secondDate))->with('buku', 'anggota')->whereRelation('anggota', 'nama', 'like', '%'.$search.'%')->orderBy('id_peminjaman', 'DESC')->paginate(10);

                $statuses = [];
                $i = 0;

                foreach($borrows as $borrow){
                    $returning = Pengembalian::where('id_peminjaman', $borrow->id_peminjaman)->first();
                    if ($returning) {
                        $status = 'Sudah';
                        array_push($statuses, $status);
                    } else {
                        $status = 'Belum';
                        array_push($statuses, $status);
                    }
                }
                
                return view('laporan.peminjaman.data.index', compact('borrows', 'statuses', 'i'))->render();
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
            $returnings = Pengembalian::whereDay('tgl_kembali', now())->with('peminjaman', 'peminjaman.buku', 'peminjaman.anggota')->orderBy('id_pengembalian', 'DESC')->paginate(10);

            $statuses = [];
            $i = 0;

            foreach ($returnings as $returning) {
                $borrow = Peminjaman::with('pengembalian')->where('id_peminjaman', $returning->id_peminjaman)->first();
                    
                if($borrow->tgl_kembali < $borrow->pengembalian->tgl_kembali) {
                    $status = 'Terlambat';
                    array_push($statuses, $status);
                }
                else {
                    $status = 'Tepat Waktu';
                    array_push($statuses, $status);
                }
            }

            $returnMonth = Pengembalian::whereMonth('tgl_kembali', now())->count();
            $returnTotal = Pengembalian::count();
            $penaltyMonth = Pengembalian::whereMonth('tgl_kembali', now())->sum('denda');
            $penaltyTotal = Pengembalian::sum('denda');

            return view('laporan.pengembalian.index', compact('title', 'auth', 'returnings', 'returnMonth', 'returnTotal', 'penaltyMonth', 'penaltyTotal', 'statuses', 'i'));
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
                $search = str_replace(" ", "%", $request->search);
                $firstDate = str_replace(" ", "", $request->firstDate);
                $secondDate = str_replace(" ", "", $request->secondDate);

                if (!$firstDate) {
                    $firstDate = '0000-00-00';
                }
                if (!$secondDate) {
                    $secondDate = now();
                }
                
                $returnings = Pengembalian::whereBetween('tgl_kembali', array($firstDate, $secondDate))->with('peminjaman', 'peminjaman.buku', 'peminjaman.anggota')->whereRelation('peminjaman.anggota', 'nama', 'like', '%'.$search.'%')->orderBy('id_pengembalian', 'DESC')->paginate(10);

                $statuses = [];
                $i = 0;

                foreach ($returnings as $returning) {
                    $borrow = Peminjaman::with('pengembalian')->where('id_peminjaman', $returning->id_peminjaman)->first();
                        
                    if($borrow->tgl_kembali < $borrow->pengembalian->tgl_kembali) {
                        $status = 'Terlambat';
                        array_push($statuses, $status);
                    }
                    else {
                        $status = 'Tepat Waktu';
                        array_push($statuses, $status);
                    }
                }

                return view('laporan.pengembalian.data.index', compact('returnings', 'statuses', 'i'))->render();
            }
        }

        catch(Throwable $e) {
            report($e);
            
            return false;
        }
    }

}
