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
            <a href="{{ route('buku') }}" class="p-3 bg-slate-100 hover:bg-slate-200 dark:bg-slate-600 dark:hover:bg-slate-500 dark:active:bg-slate-400 dark:text-slate-200 rounded-full -mt-2">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                 <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
               </svg>
            </a>

            <div class="ml-5">
               <h3 class="pt-4 pb-1 uppercase text-sm font-bold">Edit Buku</h3>
               <p class="mb-6 text-sm">Edit data buku {{ $book->judul }}</p>
            </div>
         </div>

         @error('name')
            <div class="py-4 px-5 bg-red-200 text-red-700 rounded-lg mt-5 mb-2">{{ $message }}</div>
         @enderror

         <form method="post" action="{{ route('buku.update', $book->id_buku) }}" class="flex p-7" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="basis-1/3 pr-10">
               <div class="relative" id="dataFoto">
                  <img src="{{ asset('/img/buku/'.$book->foto) }}" alt="Buku {{ $book->judul }}" class="w-full h-80 block object-cover rounded-xl shadow-lg cursor-point bg-slate-600">
                  <div id="labelFoto" class="flex justify-center items-center hidden absolute top-0 w-full">
                     <label for="foto" class="flex flex-col justify-center items-center w-full h-80 bg-slate-50 rounded-lg border-2 border-slate-300 border-dashed cursor-pointer dark:hover:bg-slate-500 dark:bg-slate-600 hover:bg-slate-100 dark:border-slate-500 dark:hover:border-slate-400 relative">
                        <div class="flex flex-col justify-center items-center pt-5 pb-6">
                           <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                           </svg>
                           <p class="mb-2 text-sm text-slate-500 dark:text-slate-400">
                              <strong>Klik untuk upload foto buku</strong>
                           </p>
                           <p class="text-xs text-slate-500 dark:text-slate-400">SVG, PNG, JPG, JPEG, WEBP atau GIF</p>
                        </div>
                        <input id="foto" type="file" class="hidden" name="foto">
                        <p class="hidden absolute text-sm text-slate-500 dark:text-slate-400 bottom-0 py-3 px-5 border-t left-0 right-0 text-center" id="namaFoto"></p>
                     </label>
                  </div>
               </div>
            </div>
            <div class="basis-2/3">
               <div>
                  <label for="judul">Judul buku</label>
                  <input name="judul" id="judul" type="text" class="p-3 focus:outline-none focus:ring focus:ring-violet-500 rounded-lg w-full border my-3 dark:bg-slate-700 dark:border-slate-600" placeholder="Ketik judul buku..." required autocomplete="off" autofocus value="{{ $book->judul }}">
               </div>
               
               <div class="flex">
                  <div class="pt-5 pr-5 basis-1/2">
                     <label for="isbn">ISBN buku</label>
                     <input name="isbn" id="isbn" type="number" class="p-3 focus:outline-none focus:ring focus:ring-violet-500 rounded-lg w-full border my-3 dark:bg-slate-700 dark:border-slate-600" placeholder="Ketik ISBN buku..." required autocomplete="off" value="{{ $book->isbn }}">
                  </div>
                  <div class="pt-5 pl-5 basis-1/2">
                     <label for="kategori">Kategori buku</label>
                     <input list="categories" name="kategori" id="kategori" type="text" class="p-3 focus:outline-none focus:ring focus:ring-violet-500 rounded-lg w-full border my-3 dark:bg-slate-700 dark:border-slate-600" placeholder="Ketik kategori buku..." required autocomplete="off" value="{{ $book->kategori->nama }}">
                     
                     <datalist id="categories">
                        @foreach($categories as $category)
                        <option value="{{ $category->nama }}"/>
                        @endforeach
                     </datalist>
                  </div>
               </div>

               <div class="flex">
                  <div class="pt-5 pr-5 basis-1/2">
                     <label for="penulis">Penulis buku</label>
                     <input list="authors" name="penulis" id="penulis" type="text" class="p-3 focus:outline-none focus:ring focus:ring-violet-500 rounded-lg w-full border my-3 dark:bg-slate-700 dark:border-slate-600" placeholder="Ketik penulis buku..." required autocomplete="off" value="{{ $book->penulis->nama }}">

                     <datalist id="authors">
                        @foreach($authors as $author)
                        <option value="{{ $author->nama }}"/>
                        @endforeach
                     </datalist>
                  </div>
                  <div class="pt-5 pl-5 basis-1/2">
                     <label for="penerbit">Penerbit buku</label>
                     <input list="publishers" name="penerbit" id="penerbit" type="text" class="p-3 focus:outline-none focus:ring focus:ring-violet-500 rounded-lg w-full border my-3 dark:bg-slate-700 dark:border-slate-600" placeholder="Ketik penerbit buku..." required autocomplete="off" value="{{ $book->penerbit->nama }}">

                     <datalist id="publishers">
                        @foreach($publishers as $publisher)
                        <option value="{{ $publisher->nama }}"/>
                        @endforeach
                     </datalist>
                  </div>
               </div>

               <div class="flex">
                  <div class="pt-5 pr-5 basis-1/2">
                     <label for="stok">Stok buku</label>
                     <input name="stok" id="stok" type="number" class="p-3 focus:outline-none focus:ring focus:ring-violet-500 rounded-lg w-full border my-3 dark:bg-slate-700 dark:border-slate-600" placeholder="Ketik stok buku..." required autocomplete="off" value="{{ $book->stok }}">
                  </div> 
                  <div class="pt-5 pl-5 basis-1/2">
                     <label for="tahun_terbit">Tahun terbit</label>
                     <input name="tahun_terbit" id="tahun_terbit" type="number" class="p-3 focus:outline-none focus:ring focus:ring-violet-500 rounded-lg w-full border my-3 dark:bg-slate-700 dark:border-slate-600" placeholder="Ketik tahun terbit buku..." required autocomplete="off" value="{{ $book->tahun_terbit }}">
                  </div>
               </div>

               <div class="pt-3">
                  <button type="submit" class="p-3 w-full bg-violet-500 hover:bg-violet-700 active:bg-violet-800 text-white uppercase font-bold rounded-lg text-sm mt-3 focus:outline-none focus:ring focus:ring-violet-500">Submit</button>
               </div>
            </div>
         </form>
      </div>
   </section>
</div>

</main>

</div>

<script>
   
$(document).ready(() => {
   
   $(document).on('change', '#foto', function(){
      const foto = $('#foto').val().replace(/.*(\/|\\)/, '')
      $('#namaFoto').removeClass('hidden')
      $('#namaFoto').html(foto)
   })
   
   $(document).on('mouseover', '#dataFoto', function(){
      $('#labelFoto').removeClass('hidden')
   })
   
   $(document).on('mouseout', '#dataFoto', function(){
      $('#labelFoto').addClass('hidden')
      if($('#foto').val()) $('#labelFoto').removeClass('hidden')
   })
})

</script>

@endsection