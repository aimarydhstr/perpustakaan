<div class="overflow-x-auto relative px-4 mb-5">
 <table class="w-full text-sm text-left text-slate-600 dark:text-slate-200">
     <thead class="text-xs text-slate-500 uppercase bg-gray-100 dark:bg-slate-800 dark:text-slate-300">
         <tr>
            <th scope="col" class="py-3 px-6">Nama Peminjam</th>
            <th scope="col" class="py-3 px-6">Judul Buku</th>
         </tr>
     </thead>
     <tbody>

      @if($borrows->isEmpty())

         <tr class="bg-white border-b dark:bg-slate-700 dark:border-slate-600">
            <td class="py-4 px-6 text-center" colspan="6">Tidak ada data peminjaman</td>
         </tr>

      @else

         @foreach($borrows as $borrow)

            <tr class="bg-white border-b dark:bg-slate-700 dark:border-slate-600">
               <td class="py-4 px-6">
                  <div class="flex relative items-center">
                     <img src="{{ asset('/img/anggota/'.$borrow->anggota->foto) }}" alt="{{ $borrow->anggota->nama }}" class="w-12 h-12 rounded-full mr-3 object-cover">
                     <span class="flex h-3 w-3 absolute left-9 bottom-1">
                     @if($borrow->anggota->isActive == 1)
                        <span class="animate-ping absolute flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative flex rounded-full h-3 w-3 bg-emerald-500"></span>
                     @else
                        <span class="animate-ping absolute flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                        <span class="relative flex rounded-full h-3 w-3 bg-red-500"></span>
                     @endif
                     </span>
                     <div>
                        <p class="font-semibold">{{ $borrow->anggota->nama }}</p>
                        <p>{{ $borrow->anggota->email }}</p>
                     </div>
                  </div>
               </th>
               <td class="py-4 px-6">{{ $borrow->buku->judul }}</td>
            </tr>

         @endforeach

         <input type="hidden" name="hidden_page" id="hidden_page" value="1" />

      @endif

     </tbody>
 </table>
</div>

<div class="px-4">{{ $borrows->links() }}</div>