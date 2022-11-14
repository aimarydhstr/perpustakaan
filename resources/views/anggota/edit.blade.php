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
            <a href="{{ route('anggota') }}" class="p-3 bg-slate-100 hover:bg-slate-200 dark:bg-slate-600 dark:hover:bg-slate-500 dark:active:bg-slate-400 dark:text-slate-200 rounded-full -mt-2">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                 <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
               </svg>
            </a>

            <div class="ml-5">
               <h3 class="pt-4 pb-1 uppercase text-sm font-bold">Edit Anggota</h3>
               <p class="mb-6 text-sm">Edit data anggota perpustakaan {{ $member->nama }}</p>
            </div>
         </div>

         @error('name')
            <div class="py-4 px-5 bg-red-200 text-red-700 rounded-lg mt-5 mb-2">{{ $message }}</div>
         @enderror

         <form method="post" action="{{ route('anggota.update', $member->id_anggota) }}" class="flex p-7" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="w-64">
               <div class="relative rounded-full" id="dataFoto">
                  <img src="{{ asset('/img/anggota/'.$member->foto) }}" alt="{{ $member->nama }}" class="object-cover shadow-lg cursor-point w-64 h-64 rounded-full">
                  <div id="labelFoto" class="flex justify-center items-center rounded-full hidden absolute top-0 w-full">
                     <label for="foto" class="flex flex-col justify-center items-center w-64 h-64 bg-slate-50 rounded-full border-2 border-slate-300 border-dashed cursor-pointer dark:hover:bg-slate-500 dark:bg-slate-600 hover:bg-slate-100 dark:border-slate-500 dark:hover:border-slate-400 relative">
                        <div class="flex flex-col justify-center items-center pt-5 pb-6">
                           <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                           </svg>
                           <p class="mb-2 text-sm text-slate-500 dark:text-slate-400">
                              <strong>Klik untuk upload foto anggota</strong>
                           </p>
                           <p class="text-xs text-slate-500 dark:text-slate-400">SVG, PNG, JPG, JPEG, WEBP atau GIF</p>
                        </div>
                        <input id="foto" type="file" class="hidden" name="foto">
                        <p class="hidden absolute text-sm text-slate-500 dark:text-slate-400 -bottom-20 rounded-xl p-3 bg-slate-100 dark:bg-slate-600 left-0 right-0 text-center" id="namaFoto"></p>
                     </label>
                  </div>
               </div>
            </div>
            <div class="pl-12 grow">
               <div>
                  <label for="nama">Nama anggota</label>
                  <input name="nama" id="nama" type="text" class="p-3 focus:outline-none focus:ring focus:ring-violet-500 rounded-lg w-full border my-3 dark:bg-slate-700 dark:border-slate-600" placeholder="Ketik nama anggota..." required autocomplete="off" autofocus value="{{ $member->nama }}">
               </div>
               <div class="pt-5">
                  <label for="email">Email anggota</label>
                  <input name="email" id="email" type="email" class="p-3 focus:outline-none focus:ring focus:ring-violet-500 rounded-lg w-full border my-3 dark:bg-slate-700 dark:border-slate-600" placeholder="Ketik email anggota..." required autocomplete="off" value="{{ $member->email }}">
               </div>
               <div class="pt-5">
                  <label for="jenis_kelamin">Jenis Kelamin</label>
                  <select class="p-3 focus:outline-none focus:ring focus:ring-violet-500 rounded-lg w-full border my-3 dark:bg-slate-700 dark:border-slate-600 disabled:text-slate-500" name="jenis_kelamin" id="jenis_kelamin" required autocomplete="off">
                     <option disabled>Pilih jenis kelamin</option>
                     <option selected value="L">Laki-Laki</option>
                     <option value="P">Perempuan</option>
                  </select>
               </div>
               <div class="pt-5">
                  <label for="alamat">Alamat anggota</label>
                  <textarea name="alamat" id="alamat" type="text" class="p-3 focus:outline-none focus:ring focus:ring-violet-500 rounded-lg w-full border my-3 dark:bg-slate-700 dark:border-slate-600" placeholder="Ketik alamat anggota..." rows="4" required autocomplete="off">{{ $member->alamat }}</textarea>
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