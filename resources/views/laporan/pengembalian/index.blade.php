@extends('app')

@section('content')

<div class="block w-full">

@include('components.sidenav')

<main id="main" class="block p-5 pl-80 overflow-hidden text-slate-700 dark:text-slate-200 transition-all duration-300">

@include('components.pagetitle')

<section class="flex items-center justify-between mb-5">
   <div class="p-3 basis-1/3">
      <div class="bg-white shadow-xl flex items-center dark:bg-slate-700 p-8 rounded-xl">
         <div class="p-4 bg-violet-500 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 text-slate-100">
              <path d="M11.25 4.533A9.707 9.707 0 006 3a9.735 9.735 0 00-3.25.555.75.75 0 00-.5.707v14.25a.75.75 0 001 .707A8.237 8.237 0 016 18.75c1.995 0 3.823.707 5.25 1.886V4.533zM12.75 20.636A8.214 8.214 0 0118 18.75c.966 0 1.89.166 2.75.47a.75.75 0 001-.708V4.262a.75.75 0 00-.5-.707A9.735 9.735 0 0018 3a9.707 9.707 0 00-5.25 1.533v16.103z" />
            </svg>
         </div>
         <div class="ml-5">
            <p class="font-bold text-xs uppercase mb-2 text-slate-500 dark:text-slate-200">Pengembalian Bulan Ini</p>
            <p class="text-3xl font-bold text-slate-500 dark:text-slate-200">{{ $returnMonth }}</p>
         </div>
      </div>
   </div>
   <div class="p-3 basis-1/3">
      <div class="bg-white shadow-xl flex items-center dark:bg-slate-700 p-8 rounded-xl">
         <div class="p-4 bg-violet-500 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 text-slate-100">
              <path fill-rule="evenodd" d="M7.502 6h7.128A3.375 3.375 0 0118 9.375v9.375a3 3 0 003-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 00-.673-.05A3 3 0 0015 1.5h-1.5a3 3 0 00-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6zM13.5 3A1.5 1.5 0 0012 4.5h4.5A1.5 1.5 0 0015 3h-1.5z" clip-rule="evenodd"></path>
              <path fill-rule="evenodd" d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 013 20.625V9.375zm9.586 4.594a.75.75 0 00-1.172-.938l-2.476 3.096-.908-.907a.75.75 0 00-1.06 1.06l1.5 1.5a.75.75 0 001.116-.062l3-3.75z" clip-rule="evenodd"></path>
            </svg>
         </div>
         <div class="ml-5">
            <p class="font-bold text-xs uppercase mb-2 text-slate-500 dark:text-slate-200">Total Pengembalian</p>
            <p class="text-3xl font-bold text-slate-500 dark:text-slate-200">{{ $returnTotal }}</p>
         </div>
      </div>
   </div>
   <div class="p-3 basis-1/3">
      <div class="bg-white shadow-xl flex items-center dark:bg-slate-700 p-8 rounded-xl">
         <div class="p-4 bg-violet-500 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-slate-100">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
         </div>
         <div class="ml-5">
            <p class="font-bold text-xs uppercase mb-2 text-slate-500 dark:text-slate-200">Denda Bulan Ini</p>
            <p class="text-2xl font-bold text-slate-500 dark:text-slate-200">Rp. {{ $penaltyMonth }}</p>
         </div>
      </div>
   </div>
</section>

<div class="block mb-5">
   <section class="p-3">
      <div class="bg-white dark:bg-slate-700 shadow-xl p-3 pb-7 rounded-xl relative overflow-hidden box-border">
         <div class="relative">
            <h3 class="p-4 pb-3 uppercase text-sm font-bold">Laporan Pengembalian Buku</h3>
            <p class="mb-6 text-sm px-4">Laporan data pengembalian buku pada perpustakaan</p>
            <div class="flex items-center justify-between mb-5 px-4">
               <div class="flex items-center">
                  <p class="text-sm">Tampillkan</p>
                  <input type="date" name="firstDate" id="firstDate" class="bg-transparent p-2 px-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-violet-500 dark:bg-slate-700 dark:border-slate-500 ml-3 text-sm" value={{now()}} />
                  <p class="text-sm ml-3">-</p>
                  <input type="date" name="secondDate" id="secondDate" class="bg-transparent p-2 px-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-violet-500 dark:bg-slate-700 dark:border-slate-500 ml-3 text-sm" />
               </div>
               <div class="relative w-72">
                  <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                     <svg aria-hidden="true" class="w-5 h-5 text-slate-500 dark:text-slate-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                  </div>
                  <input type="text" name="search" id="search" class="border bg-transparent text-sm rounded-lg focus:outline-none focus:ring-2 focus:ring-violet-500 block w-full pl-10 p-2.5 dark:border-slate-500" placeholder="Cari nama anggota..." autofocus autocomplete="off">
               </div>
            </div>

            @if(session('success'))
               <div class="py-4 px-5 bg-emerald-200 text-emerald-700 rounded-lg my-5 mx-4">{{ session('success') }}</div>
            @endif

            @if(session('failed'))
               <div class="py-4 px-5 bg-red-200 text-red-700 rounded-lg my-5 mx-4">{{ session('failed') }}</div>
            @endif

         </div>

         <div id="result">
            @include('laporan.pengembalian.data.index')
         </div>
         
      </div>
   </section>
</div>

</main>

</div>

<script>

$(document).ready(() => {
   $('a.inline-flex').addClass('focus:outline-none focus:ring-0 focus:border-slate-300 hover:bg-slate-100 active:bg-slate-200')
   $('span.inline-flex').addClass('bg-slate-200')
   $('span.inline-flex svg').parent().removeClass('bg-slate-200')

   function fetchData(page, search, firstDate, secondDate){
      $.ajax({
         url:"/laporan/pengembalian/data?page="+page+"&search="+search+"&firstDate="+firstDate+"&secondDate="+secondDate,
         success: function(data){
            $('#result').html(data)
            $('a.inline-flex').addClass('focus:outline-none focus:ring-0 focus:border-slate-300 hover:bg-slate-100 active:bg-slate-200')
            $('span.inline-flex').addClass('bg-slate-200')
            $('span.inline-flex svg').parent().removeClass('bg-slate-200')
         }
      })
   }

   $(document).on('keyup', '#search', function(){
      const search = $('#search').val()
      const page = $('#hidden_page').val()
      const firstDate = $('#firstDate').val()
      const secondDate = $('#secondDate').val()

      fetchData(page, search, firstDate, secondDate)
   })

   $(document).on('change', '#firstDate', function(e){
      e.preventDefault()
      const firstDate = $('#firstDate').val()
      const secondDate = $('#secondDate').val()
      const search = $('#search').val()
      const page = $('#hidden_page').val()

      fetchData(page, search, firstDate, secondDate)
   })

   $(document).on('change', '#secondDate', function(e){
      e.preventDefault()
      const firstDate = $('#firstDate').val()
      const secondDate = $('#secondDate').val()
      const search = $('#search').val()
      const page = $('#hidden_page').val()

      fetchData(page, search, firstDate, secondDate)
   })

   $(document).on('click', 'a.inline-flex', function(event){
      event.preventDefault()
      const page = $(this).attr('href').split('page=')[1]
      $('#hidden_page').val(page)
      const search = $('#search').val()
      const firstDate = $('#firstDate').val()
      const secondDate = $('#secondDate').val()

      fetchData(page, search, firstDate, secondDate);
      $(this).parent().addClass('bg-violet-700 text-white')
   })

})

</script>

@endsection