@extends('app')

@section('content')

<div class="block w-full">

@include('components.sidenav')

<main id="main" class="block p-5 pl-80 overflow-hidden text-slate-700 dark:text-slate-200 transition-all duration-300">

@include('components.pagetitle')

<div class="flex mb-5">
   <section class="p-3 basis-2/3">
      <div class="bg-white dark:bg-slate-700 shadow-xl p-3 pb-7 rounded-xl relative overflow-hidden box-border">
         <div class="relative">
            <h3 class="p-4 pb-3 uppercase text-sm font-bold">Daftar Penulis</h3>
            <p class="mb-6 text-sm px-4">Daftar penulis pada perpustakaan</p>

            <button id="create" type="button" class="bg-violet-500 text-white px-4 py-2 rounded-lg shadow-lg text-xs absolute top-6 right-4 hover:bg-violet-600 active:bg-violet-700">Tambah Penulis</button>

            <div class="flex items-center mb-5 px-4">
               <div class="relative w-full">
                  <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                     <svg aria-hidden="true" class="w-5 h-5 text-slate-500 dark:text-slate-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                  </div>
                  <input type="text" id="search" class="border bg-transparent text-sm rounded-lg focus:outline-none focus:ring-2 focus:ring-violet-500 block w-full pl-10 p-2.5 dark:border-slate-500" placeholder="Cari penulis buku...">
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
            @include('penulis.data.index')
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

   function fetchData(page, search){
      $.ajax({
         url:"/penulis/data?page="+page+"&search="+search,
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

      fetchData(page, search)
   })

   $(document).on('click', 'a.inline-flex', function(event){
      event.preventDefault()
      const page = $(this).attr('href').split('page=')[1]
      $('#hidden_page').val(page)
      const search = $('#search').val()

      fetchData(page, search);
      $(this).parent().addClass('bg-violet-700 text-white')
   })

   function getDeleteData(id){
      $.ajax({
         url:"/penulis/"+id,
         success: function(data){
            $('#deleteData').html('')
            $('#deleteData').html(data)
            $('#deleteModal').removeClass('hidden')
         }
      })
   }

   $(document).on('click', '#hapus', function(e){
      e.preventDefault()
      const id = $(this).data('id')
      getDeleteData(id)
   })

   $(document).on('click', '#batal', function(e){
      e.preventDefault()
      $('#deleteModal').addClass('hidden')
   })

   function getUpdateData(id){
      $.ajax({
         url:"/penulis/edit/"+id,
         success: function(data){
            $('#editData').html('')
            $('#editData').html(data)
            $('#editModal').removeClass('hidden')
         }
      })
   }

   $(document).on('click', '#edit', function(e){
      e.preventDefault()
      const id = $(this).data('id')
      getUpdateData(id)
   })

   $(document).on('click', '#batalEdit', function(e){
      e.preventDefault()
      $('#editModal').addClass('hidden')
   })

   $(document).on('click', '#create', function(e){
      e.preventDefault()
      const id = $(this).data('id')
      $('#createModal').removeClass('hidden')
   })

   $(document).on('click', '#batalCreate', function(e){
      e.preventDefault()
      $('#createModal').addClass('hidden')
   })

})

</script>

@endsection