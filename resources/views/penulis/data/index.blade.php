<div class="overflow-x-auto relative px-4 mb-5">
 <table class="w-full text-sm text-left text-slate-600 dark:text-slate-200">
     <thead class="text-xs text-slate-500 uppercase bg-gray-100 dark:bg-slate-800 dark:text-slate-300">
         <tr>
            <th scope="col" class="py-3 px-6">#</th>
            <th scope="col" class="py-3 px-6">Nama Penulis</th>
            <th scope="col" class="py-3 px-6">Jumlah Buku</th>
            <th scope="col" class="py-3 w-40 text-center">Aksi</th>
         </tr>
     </thead>
     <tbody>

      @if($authors->isEmpty())

         <tr class="bg-white border-b dark:bg-slate-700 dark:border-slate-600">
            <td class="py-4 px-6 text-center" colspan="4">Tidak ada data penulis</td>
         </tr>

      @else
         
         @foreach($authors as $author)
            <tr class="bg-white border-b dark:bg-slate-700 dark:border-slate-600">
               <td class="py-4 px-6">{{ ++$i }}</td>
               <td class="py-4 px-6">{{ $author->nama }}</th>
               @if($author->buku_count == 0)
                  <td class="py-4 px-6">Tidak ada</td>
               @else
                  <td class="py-4 px-6">{{ $author->buku_count }} buku</td>
               @endif
               <td class="py-4 w-40 text-center">
                  <button id="edit" data-id="{{ $author->id_penulis }}" class="bg-emerald-500 text-white p-2 inline-block mr-1 w-14 text-center rounded-lg shadow-lg text-xs hover:bg-emerald-700 active:bg-emerald-800">Ubah</button>
                  <button id="hapus" data-id="{{ $author->id_penulis }}" class="bg-red-500 text-white p-2 inline-block w-14 text-center rounded-lg shadow-lg text-xs hover:bg-red-700 active:bg-red-800">Hapus</button>
               </td>
            </tr>

         @endforeach
         
         <input type="hidden" name="hidden_page" id="hidden_page" value="1" />

      @endif

     </tbody>
 </table>
</div>

<div class="px-4">{{ $authors->links() }}</div>

@if(!$authors->isEmpty())

<div id="createData">
   @include('penulis.data.create')
</div>

<div id="editData">
   @include('penulis.data.edit')
</div>

<div id="deleteData">
   @include('penulis.data.delete')
</div>

@endif