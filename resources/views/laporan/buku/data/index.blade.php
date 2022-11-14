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
            </tr>

         @endforeach

         <input type="hidden" name="hidden_page" id="hidden_page" value="1" />

      @endif

     </tbody>
 </table>
</div>

<div class="px-4">{{ $books->links() }}</div>