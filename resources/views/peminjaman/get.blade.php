@extends('app')

@section('content')

<div class="block w-full">

@include('components.sidenav')

<main id="main" class="block p-5 pl-80 overflow-hidden text-slate-700 dark:text-slate-200 transition-all duration-300">

@include('components.pagetitle')

<div class="block mb-5">
   <section class="p-3">
      <div class="bg-white dark:bg-slate-700 shadow-xl pt-3 pb-7 rounded-xl relative overflow-hidden box-border">
         <div class="relative border-b dark:border-slate-600 px-7 flex items-center">
            <a href="{{ route('peminjaman') }}" class="p-3 bg-slate-100 hover:bg-slate-200 dark:bg-slate-600 dark:hover:bg-slate-500 dark:active:bg-slate-400 dark:text-slate-200 rounded-full -mt-2">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                 <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
               </svg>
            </a>

            <div class="ml-5">
               <h3 class="pt-4 pb-1 uppercase text-sm font-bold">Detail Peminjaman</h3>
               <p class="mb-6 text-sm">Detail data peminjaman {{ $borrow->anggota->nama }}</p>
            </div>
         </div>

         @if(session('success'))
            <div class="py-4 px-5 bg-emerald-200 text-emerald-700 rounded-lg my-5 mx-4">{{ session('success') }}</div>
         @endif

         @if(session('failed'))
            <div class="py-4 px-5 bg-red-200 text-red-700 rounded-lg my-5 mx-4">{{ session('failed') }}</div>
         @endif

         <div class="flex px-7 pt-5">
            <div class="w-64 pt-5">
               <div class="relative rounded-xl" id="dataFoto">
                  <img src="{{ asset('/img/buku/'.$borrow->buku->foto) }}" alt="Buku {{ $borrow->buku->judul }}" class="object-cover shadow-lg cursor-point w-64 h-80 rounded-xl">
               </div>
            </div>
            <div class="pl-12 grow pt-5">
               <div>
                  <div class="pb-5">
                     <p class="bg-violet-700 bg-opacity-75 text-white py-2 px-5 mb-3 text-xs font-bold uppercase rounded-lg inline-block">{{ $borrow->buku->kategori->nama }}</p>
                     <p class="pt-2 text-xl font-semibold">{{ $borrow->buku->judul }}</p>
                  </div>
                  <div class="pt-4 pb-6">
                     <p>Tanggal pinjam</p>
                     <p class="pt-2 font-semibold">{{ date('d F Y', strToTime($borrow->tgl_pinjam)) }}</p>
                  </div>
                  <div class="pb-6">
                     <p>Harus dikembalikan pada</p>
                     <p class="pt-2 font-semibold">{{ date('d F Y', strToTime($borrow->tgl_kembali)) }}</p>
                  </div>
                  <div class="flex relative items-center my-5">
                     <img src="{{ asset('/img/anggota/'.$borrow->anggota->foto) }}" alt="{{ $borrow->anggota->nama }}" class="w-12 h-12 rounded-full mr-3 object-cover">
                     <span class="flex h-3 w-3 absolute left-9 bottom-1">
                     @if($borrow->anggota->isActive == 1)
                        <span class="animate-ping absolute flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative flex rounded-full h-3 w-3 bg-emerald-500"></span>
                     @else
                        <span class="animate-ping absolute flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                        <span class="relative flex rounded-full h-3 w-3 bg-red-500"></span>
                     @endif
                     </span>
                     <div>
                        <p class="font-semibold">{{ $borrow->anggota->nama }}</p>
                        <p>{{ $borrow->anggota->email }}</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>

</main>

</div>

@endsection