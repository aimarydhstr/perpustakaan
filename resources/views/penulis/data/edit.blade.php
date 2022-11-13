<div id="editModal" class="w-screen h-screen flex items-center justify-center bg-slate-800 bg-opacity-50 fixed top-0 left-0 right-0 bottom-0 hidden py-7">
   <div class="bg-white text-slate-700 dark:text-slate-200 dark:bg-slate-600 pb-7 rounded-xl basis-1/3">
      <p class="font-semibold py-5 px-7 text-lg border-b dark:border-slate-500 mb-3">Edit Penulis</p>
      
      <form method="post" action="{{ route('penulis.update', $author->id_penulis) }}">
         @csrf
         @method('put')
         <div class="pt-3 px-7">
            <label for="nama">Nama penulis</label>
            <input name="nama" id="nama" type="text" class="bg-transparent p-3 focus:outline-none focus:ring focus:ring-violet-500 rounded-lg w-full border dark:border-slate-500 my-3" placeholder="Ketik nama penulis..." required autocomplete="off" autofocus value="{{ $author->nama }}">
         </div>
         <div class="flex mt-7 justify-end px-7">
            <button type="button" id="batalEdit" class="bg-white dark:bg-slate-600 dark:border-slate-600 dark:hover:border-slate-500 dark:hover:bg-slate-500 dark:active:border-slate-400 dark:active:bg-slate-400 text-sm w-20 text-center p-2 border border-white rounded-lg mr-3 hover:shadow-lg hover:border-slate-200 active:bg-slate-200 transition-all duration-300 focus:outline-none">Batal</button>
            <button type="submit" class="bg-violet-500 text-white text-sm border border-violet-500 w-20 text-center shadow-lg p-2 rounded-lg hover:bg-violet-600 active:border-violet-500 active:bg-violet-700 active:border-violet-800 focus:outline-none">Submit</button>
         </div>
      </form>

   </div>
</div>