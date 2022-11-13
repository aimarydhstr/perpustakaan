<div class="overflow-x-auto relative px-4 mb-5">
 <table class="w-full text-sm text-left text-slate-600 dark:text-slate-200">
     <thead class="text-xs text-slate-500 uppercase bg-gray-100 dark:bg-slate-800 dark:text-slate-300">
         <tr>
            <th scope="col" class="py-3 px-6">#</th>
            <th scope="col" class="py-3 px-6">Judul Buku</th>
            <th scope="col" class="py-3 px-6">Kategori</th>
            <th scope="col" class="py-3 px-6">Penulis</th>
            <th scope="col" class="py-3 px-6">Penerbit</th>
            <th scope="col" class="py-3 px-6">Sisa Stok</th>
            <th scope="col" class="py-3 w-40 text-center">Aksi</th>
         </tr>
     </thead>
     <tbody>

      @if($books->isEmpty())

         <tr class="bg-white border-b dark:bg-slate-700 dark:border-slate-600">
            <td class="py-4 px-6 text-center" colspan="8">Tidak ada data buku</td>
         </tr>

      @else

         @foreach($books as $book)

            <tr class="bg-white border-b dark:bg-slate-700 dark:border-slate-600">
               <td class="py-4 px-6">{{ ++$i }}</td>
               <td class="py-4 px-6">{{ $book->judul }}</th>
               <td class="py-4 px-6">{{ $book->kategori->nama }}</td>
               <td class="py-4 px-6">{{ $book->penulis->nama }}</td>
               <td class="py-4 px-6">{{ $book->penerbit->nama }}</td>
               <td class="py-4 px-6">{{ $book->stok }} buku</td>
               <td class="py-4 w-40 text-center">
                  <a href="{{ route('buku.edit', $book->id_buku) }}" class="bg-emerald-500 text-white p-2 inline-block mr-1 w-14 text-center rounded-lg shadow-lg text-xs hover:bg-emerald-700 active:bg-emerald-800">Ubah</a>
                  <button id="hapus" data-id="{{ $book->id_buku }}" class="bg-red-500 text-white p-2 inline-block w-14 text-center rounded-lg shadow-lg text-xs hover:bg-red-700 active:bg-red-800">Hapus</button>
               </td>
            </tr>

         @endforeach

         <input type="hidden" name="hidden_page" id="hidden_page" value="1" />

      @endif

     </tbody>
 </table>
</div>

<div class="px-4">{{ $books->links() }}</div>

@if(!$books->isEmpty())

<div id="deleteData">
   @include('buku.data.delete')
</div>

@endif