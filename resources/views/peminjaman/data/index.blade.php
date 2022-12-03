<div class="relative px-1 mb-5 overflow-hidden">
@if($books->isEmpty())
   <p class="py-4 px-6 text-center">Tidak ada data buku</p>
@else
   <div class="block w-full clear-both">
   @foreach($books as $book)

      <div class="book p-3">
         <a href="{{ route('peminjaman.create', $book->id_buku) }}">
            <div class="block bg-white dark:bg-slate-600 shadow-lg rounded-xl relative cursor-pointer">
               <img src="{{ asset('/img/buku/'.$book->foto) }}" class="h-64 w-full bg-slate-200 rounded-xl" alt="Buku {{ $book->judul }}">
               <div class="absolute left-0 right-0 bottom-0 top-0 bg-transparent hover:bg-opacity-25 hover:bg-slate-700 active:bg-opacity-25 active:bg-slate-900 rounded-xl"></div>
               <div class="flex text-center justify-center items-center p-3 absolute left-0 right-0 bottom-0 bg-slate-800 bg-opacity-75 rounded-b-xl">
                  <h2 class="text-sm text-white font-bold"><a href="{{ route('peminjaman.create', $book->id_buku) }}">{{ $book->judul }}</a></h2>
               </div>
               <p class="py-1 px-3 absolute right-1 top-1 bg-violet-500 bg-opacity-75 text-white text-xs font-bold rounded-lg">{{ $book->kategori->nama }}</p>
            </div>
         </a>
      </div>

   @endforeach
   </div>
   <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
@endif
</div>

<div class="px-4">{{ $books->links() }}</div>