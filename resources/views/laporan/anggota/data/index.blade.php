<div class="overflow-x-auto relative px-4 mb-5">
 <table class="w-full text-sm text-left text-slate-600 dark:text-slate-200">
     <thead class="text-xs text-slate-500 uppercase bg-gray-100 dark:bg-slate-800 dark:text-slate-300">
         <tr>
            <th scope="col" class="py-3 px-6">#</th>
            <th scope="col" class="py-3 px-6">Nama Anggota</th>
            <th scope="col" class="py-3 px-6">Jenis Kelamin</th>
         </tr>
     </thead>
     <tbody>

      @if($members->isEmpty())

         <tr class="bg-white border-b dark:bg-slate-700 dark:border-slate-600">
            <td class="py-4 px-6 text-center" colspan="6">Tidak ada data anggota</td>
         </tr>

      @else

         @foreach($members as $member)

            <tr class="bg-white border-b dark:bg-slate-700 dark:border-slate-600">
               <td class="py-4 px-6">{{ ++$i }}</td>
               <td class="py-4 px-6">
                  <div class="flex relative items-center">
                     <img src="{{ asset('/img/anggota/'.$member->foto) }}" alt="{{ $member->nama }}" class="w-12 h-12 rounded-full mr-3 object-cover">
                     <span class="flex h-3 w-3 absolute left-9 bottom-1">
                     @if($member->isActive == 1)
                        <span class="animate-ping absolute flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative flex rounded-full h-3 w-3 bg-emerald-500"></span>
                     @else
                        <span class="animate-ping absolute flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                        <span class="relative flex rounded-full h-3 w-3 bg-red-500"></span>
                     @endif
                     </span>
                     <div>
                        <p class="font-semibold">{{ $member->nama }}</p>
                        <p>{{ $member->email }}</p>
                     </div>
                  </div>
               </th>
               @if($member->jenis_kelamin == 'L')
               <td class="py-4 px-6">Laki-Laki</td>
               @else
               <td class="py-4 px-6">Perempuan</td>
               @endif
            </tr>

         @endforeach

         <input type="hidden" name="hidden_page" id="hidden_page" value="1" />

      @endif

     </tbody>
 </table>
</div>

<div class="px-4">{{ $members->links() }}</div>