@extends('app')

@section('content')

<div class="block w-full">

@include('components.sidenav')

<main id="main" class="block p-5 pl-80 overflow-hidden text-slate-700 dark:text-slate-200 transition-all duration-300">

@include('components.pagetitle')

<section class="flex items-center justify-between mb-5">
   <div class="block p-3 basis-1/3">
      <div class="bg-white shadow-xl flex items-center dark:bg-slate-700 p-8 rounded-xl">
         <div class="p-4 bg-violet-500 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 text-slate-100">
              <path d="M11.25 4.533A9.707 9.707 0 006 3a9.735 9.735 0 00-3.25.555.75.75 0 00-.5.707v14.25a.75.75 0 001 .707A8.237 8.237 0 016 18.75c1.995 0 3.823.707 5.25 1.886V4.533zM12.75 20.636A8.214 8.214 0 0118 18.75c.966 0 1.89.166 2.75.47a.75.75 0 001-.708V4.262a.75.75 0 00-.5-.707A9.735 9.735 0 0018 3a9.707 9.707 0 00-5.25 1.533v16.103z" />
            </svg>
         </div>
         <div class="ml-5">
            <p class="font-bold text-xs uppercase mb-2 text-slate-500 dark:text-slate-200">Total Judul Buku</p>
            <p class="text-3xl font-bold text-slate-500 dark:text-slate-200">{{ $totalBuku }}</p>
         </div>
      </div>
   </div>
   <div class="block p-3 basis-1/3">
      <div class="bg-white shadow-xl flex items-center dark:bg-slate-700 p-8 rounded-xl">
         <div class="p-4 bg-violet-500 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 text-slate-100">
              <path d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z" />
            </svg>
         </div>
         <div class="ml-5">
            <p class="font-bold text-xs uppercase mb-2 text-slate-500 dark:text-slate-200">Total Anggota</p>
            <p class="text-3xl font-bold text-slate-500 dark:text-slate-200">{{ $totalAnggota }}</p>
         </div>
      </div>
   </div>
   <div class="block p-3 basis-1/3">
      <div class="bg-white shadow-xl flex items-center dark:bg-slate-700 p-8 rounded-xl">
         <div class="p-4 bg-violet-500 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-slate-100">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
         </div>
         <div class="ml-5">
            <p class="font-bold text-xs uppercase mb-2 text-slate-500 dark:text-slate-200">Total Denda</p>
            <p class="text-2xl font-bold text-slate-500 dark:text-slate-200">Rp. {{ $totalDenda }}</p>
         </div>
      </div>
   </div>
</section>

<div class="flex justify-between mb-5">
   <section class="basis-2/3 p-3">
      <div class="bg-white dark:bg-slate-700 shadow-xl p-3 pb-7 rounded-xl relative overflow-hidden box-border">
         
         <div id="pinjam">
            <h3 class="p-4 pb-3 uppercase text-sm font-bold">Peminjaman Hari Ini</h3>
            <p class="mb-6 text-sm px-4">Rekap peminjaman buku hari ini pada Perpustakaan</p>
            
            <div class="overflow-x-auto relative px-4 mb-5">
             <table class="w-full text-sm text-left text-slate-600 dark:text-slate-200">
                 <thead class="text-xs text-slate-500 uppercase bg-gray-100 dark:bg-slate-800 dark:text-slate-300">
                     <tr>
                        <th scope="col" class="py-3 px-6">#</th>
                        <th scope="col" class="py-3 px-6">Nama Peminjam</th>
                        <th scope="col" class="py-3 px-6">Judul Buku</th>
                        <th scope="col" class="py-3 px-6">Nama Petugas</th>
                     </tr>
                 </thead>
                 <tbody>

                  @if($peminjaman->isEmpty())

                     <tr class="bg-white border-b dark:bg-slate-700 dark:border-slate-600">
                        <td class="py-4 px-6 text-center" colspan="4">Tidak ada buku yang dipinjam hari ini</td>
                     </tr>

                  @else

                     @foreach($peminjaman as $pinjam)

                        <tr class="bg-white border-b dark:bg-slate-700 dark:border-slate-600">
                           <td class="py-4 px-6">{{ ++$i }}</td>
                           <td class="py-4 px-6">{{ $pinjam->anggota->nama }}</th>
                           <td class="py-4 px-6">{{ $pinjam->buku->judul }}</td>
                           <td class="py-4 px-6">{{ $pinjam->user->nama }}</td>
                        </tr>

                     @endforeach

                  @endif

                 </tbody>
             </table>
            </div>

            <div class="text-right px-4 pt-3 pb-2">
               <a href="#" class="text-violet-500 border border-white dark:border-slate-700 dark:text-violet-300 dark:hover:text-slate-200 hover:text-slate-700 py-2 rounded-lg text-sm" title="Lihat Laporan Peminjaman">
                  <span class="inline-block mr-1">Lihat Laporan Peminjaman</span>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 inline-block">
                    <path fill-rule="evenodd" d="M16.72 7.72a.75.75 0 011.06 0l3.75 3.75a.75.75 0 010 1.06l-3.75 3.75a.75.75 0 11-1.06-1.06l2.47-2.47H3a.75.75 0 010-1.5h16.19l-2.47-2.47a.75.75 0 010-1.06z" clip-rule="evenodd" />
                  </svg>
               </a>
            </div>
         </div>

         <div id="kembali" class="hidden">
            <h3 class="p-4 pb-3 uppercase text-sm font-bold">Pengembalian Hari Ini</h3>
            <p class="mb-6 text-sm px-4">Rekap pengembalian buku hari ini pada Perpustakaan</p>
            
            <div class="overflow-x-auto relative px-4 mb-5">
             <table class="w-full text-sm text-left text-slate-600 dark:text-slate-200">
                 <thead class="text-xs text-slate-500 uppercase bg-gray-100 dark:bg-slate-800 dark:text-slate-300">
                     <tr>
                        <th scope="col" class="py-3 px-6">#</th>
                        <th scope="col" class="py-3 px-6">Nama Peminjam</th>
                        <th scope="col" class="py-3 px-6">Judul Buku</th>
                        <th scope="col" class="py-3 px-6">Nama Petugas</th>
                     </tr>
                 </thead>
                 <tbody>

                  @if($pengembalian->isEmpty())

                     <tr class="bg-white border-b dark:bg-slate-700 dark:border-slate-600">
                        <td class="py-4 px-6 text-center" colspan="4">Tidak ada buku yang dikembalikan hari ini</td>
                     </tr>

                  @else
                  
                     @foreach($pengembalian as $kembali)

                        <tr class="bg-white border-b dark:bg-slate-700 dark:border-slate-600">
                           <td class="py-4 px-6">{{ ++$j }}</td>
                           <td class="py-4 px-6">{{ $kembali->peminjaman->anggota->nama }}</th>
                           <td class="py-4 px-6">{{ $kembali->peminjaman->buku->judul }}</td>
                           <td class="py-4 px-6">{{ $kembali->user->nama }}</td>
                        </tr>

                     @endforeach

                  @endif
                 
                 </tbody>
             </table>
            </div>

            <div class="text-right px-4 pt-3 pb-2">
               <a href="#" class="text-violet-500 border border-white dark:border-slate-700 dark:text-violet-300 dark:hover:text-slate-200 hover:text-slate-700 py-2 rounded-lg text-sm" title="Lihat Laporan Pengembalian">
                  <span class="inline-block mr-1">Lihat Laporan Pengembalian</span>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 inline-block">
                    <path fill-rule="evenodd" d="M16.72 7.72a.75.75 0 011.06 0l3.75 3.75a.75.75 0 010 1.06l-3.75 3.75a.75.75 0 11-1.06-1.06l2.47-2.47H3a.75.75 0 010-1.5h16.19l-2.47-2.47a.75.75 0 010-1.06z" clip-rule="evenodd" />
                  </svg>
               </a>
            </div>
         </div>

         <div class="absolute bottom-6 left-7 border rounded-lg border-violet-500 flex overflow-hidden box-border">
            <button id="pinjamToggle" class="focus:outline-none dark:text-white text-white bg-violet-500 py-2 px-4 text-sm hover:bg-violet-700 active:bg-violet-800 dark:hover:bg-violet-700 dark:active:bg-violet-800" title="Tampilkan Rekap Peminjaman">Peminjaman</button>
            <button id="kembaliToggle" class="focus:outline-none text-violet-500 py-2 px-4 text-sm dark:text-violet-300 hover:bg-violet-100 active:bg-violet-200 dark:hover:bg-slate-600 dark:active:bg-slate-500" title="Tampilkan Rekap Pengembalian">Pengembalian</button>
         </div>
      </div>
   </section>

   <section class="basis-1/3 p-3">
      <div class="bg-white dark:bg-slate-700 shadow-xl rounded-xl">
         <h3 class="px-5 py-4 uppercase text-xs font-bold">Anggota Baru Ditambahkan</h3>

         @if($anggota->isEmpty())

            <div class="flex justify-center py-3 px-4 border-t dark:border-slate-600">
               <span class="text-slate-700 dark:text-slate-100 text-sm block">Tidak ada data anggota</span>
            </div>

         @else
         
            @foreach($anggota as $orang)

               <div class="flex items-center py-3 px-4 border-t dark:border-slate-600">
                  <img src="{{ asset('/img/anggota/'.$orang->foto) }}" alt="Aimar Yudhistira" class="w-10 h-10 mt-1 object-cover rounded-full mr-3">
                     
                  <p class="grow overflow-hidden">
                     <span class="text-slate-700 dark:text-slate-100 text-sm block font-semibold">{{ $orang->nama }}</span>
                     <span class="text-slate-500 dark:text-slate-300 text-xs block">{{ $orang->email }}</span>
                  </p>
               </div>

            @endforeach

         @endif

      </div>
   </section>
</div>

</main>

</div>

<script>
$(document).ready(() => {
   $(document).on('click', '#pinjamToggle', function(e){
      e.preventDefault()
      $('#pinjam').removeClass('hidden')
      $('#kembali').addClass('hidden')
      $('#pinjamToggle').attr('class', 'focus:outline-none dark:text-white text-white bg-violet-500 py-2 px-4 text-sm hover:bg-violet-700 active:bg-violet-800 dark:hover:bg-violet-700 dark:active:bg-violet-800')
      $('#kembaliToggle').attr('class', 'focus:outline-none text-violet-500 py-2 px-4 text-sm dark:text-violet-300 hover:bg-violet-100 active:bg-violet-200 dark:hover:bg-slate-600 dark:active:bg-slate-500')
   })
   $(document).on('click', '#kembaliToggle', function(e){
      e.preventDefault()
      $('#kembali').removeClass('hidden')
      $('#pinjam').addClass('hidden')
      $('#kembaliToggle').attr('class', 'focus:outline-none dark:text-white text-white bg-violet-500 py-2 px-4 text-sm hover:bg-violet-700 active:bg-violet-800 dark:hover:bg-violet-700 dark:active:bg-violet-800')
      $('#pinjamToggle').attr('class', 'focus:outline-none text-violet-500 py-2 px-4 text-sm dark:text-violet-300 hover:bg-violet-100 active:bg-violet-200 dark:hover:bg-slate-600 dark:active:bg-slate-500')
   })
})
</script>
@endsection