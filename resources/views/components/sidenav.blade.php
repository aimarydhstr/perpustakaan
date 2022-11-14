<aside class="w-72 fixed top-0 left-0 bottom-0 shadow-2xl transition-all duration-300" id="sidebar">
   <div class="h-screen relative pt-6 bg-white pb-32 box-border overflow-hidden dark:bg-slate-700">
      <header class="flex justify-center mb-6 px-3">
         <h1 class="text-xl font-semibold whitespace-nowrap dark:text-white"><a href="{{ route('dashboard') }}">Perpustakaan</a></h1>
      </header>
      
      <nav class="overflow-hidden hover:overflow-y-scroll h-full pb-3">
         <ul class="space-y-3">
            @if($auth->role->nama == 'Admin')
            <li>
               <a href="{{ route('dashboard') }}" class="{{ Request::routeIs('dashboard.*') || Request::routeIs('dashboard') ? 'text-white bg-violet-500 rounded-lg dark:text-white hover:bg-violet-700 active:bg-violet-800' : 'text-slate-900 rounded-lg dark:text-slate-200 hover:bg-gray-200 active:bg-gray-300 dark:hover:bg-slate-600 dark:active:bg-slate-500' }} flex items-center p-3 mx-2">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h2.25a3 3 0 013 3v2.25a3 3 0 01-3 3H6a3 3 0 01-3-3V6zm9.75 0a3 3 0 013-3H18a3 3 0 013 3v2.25a3 3 0 01-3 3h-2.25a3 3 0 01-3-3V6zM3 15.75a3 3 0 013-3h2.25a3 3 0 013 3V18a3 3 0 01-3 3H6a3 3 0 01-3-3v-2.25zm9.75 0a3 3 0 013-3H18a3 3 0 013 3V18a3 3 0 01-3 3h-2.25a3 3 0 01-3-3v-2.25z" clip-rule="evenodd" />
                  </svg>
                  <span class="ml-3">Dashboard</span>
               </a>
            </li>
            @endif

            @if($auth->role->nama == 'Petugas')
            <li>
               <a href="{{ route('peminjaman') }}" class="{{ Request::routeIs('peminjaman.*') || Request::routeIs('peminjaman') ? 'text-white bg-violet-500 rounded-lg dark:text-white hover:bg-violet-700 active:bg-violet-800' : 'text-slate-900 rounded-lg dark:text-slate-200 hover:bg-gray-200 active:bg-gray-300 dark:hover:bg-slate-600 dark:active:bg-slate-500' }} flex items-center p-3 mx-2">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path d="M5.566 4.657A4.505 4.505 0 016.75 4.5h10.5c.41 0 .806.055 1.183.157A3 3 0 0015.75 3h-7.5a3 3 0 00-2.684 1.657zM2.25 12a3 3 0 013-3h13.5a3 3 0 013 3v6a3 3 0 01-3 3H5.25a3 3 0 01-3-3v-6zM5.25 7.5c-.41 0-.806.055-1.184.157A3 3 0 016.75 6h10.5a3 3 0 012.683 1.657A4.505 4.505 0 0018.75 7.5H5.25z"></path>
                  </svg>
                  <span class="flex-1 ml-3 whitespace-nowrap">Pinjam Buku</span>
               </a>
            </li>
            <li>
               <a href="{{ route('pengembalian') }}" class="{{ Request::routeIs('pengembalian.*') || Request::routeIs('pengembalian') ? 'text-white bg-violet-500 rounded-lg dark:text-white hover:bg-violet-700 active:bg-violet-800' : 'text-slate-900 rounded-lg dark:text-slate-200 hover:bg-gray-200 active:bg-gray-300 dark:hover:bg-slate-600 dark:active:bg-slate-500' }} flex items-center p-3 mx-2">
                  <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                     <path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"></path>
                     <path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path>
                  </svg>
                  <span class="flex-1 ml-3 whitespace-nowrap">Kembalikan Buku</span>
               </a>
            </li>
            <li>
               <a href="{{ route('anggota') }}" class="{{ Request::routeIs('anggota.*') || Request::routeIs('anggota') ? 'text-white bg-violet-500 rounded-lg dark:text-white hover:bg-violet-700 active:bg-violet-800' : 'text-slate-900 rounded-lg dark:text-slate-200 hover:bg-gray-200 active:bg-gray-300 dark:hover:bg-slate-600 dark:active:bg-slate-500' }} flex items-center p-3 mx-2">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z" />
                  </svg>
                  <span class="flex-1 ml-3 whitespace-nowrap">Anggota Perpustakaan</span>
               </a>
            </li>

            <li>
               <p class="pt-5 pb-1 px-5 mt-3 border-t dark:border-slate-600 uppercase text-slate-400 text-xs font-semibold">Manajemen Buku</p>
            </li>

            <li>
               <a href="{{ route('buku') }}" class="{{ Request::routeIs('buku.*') || Request::routeIs('buku') ? 'text-white bg-violet-500 rounded-lg dark:text-white hover:bg-violet-700 active:bg-violet-800' : 'text-slate-900 rounded-lg dark:text-slate-200 hover:bg-gray-200 active:bg-gray-300 dark:hover:bg-slate-600 dark:active:bg-slate-500' }} flex items-center p-3 mx-2">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                     <path d="M11.25 4.533A9.707 9.707 0 006 3a9.735 9.735 0 00-3.25.555.75.75 0 00-.5.707v14.25a.75.75 0 001 .707A8.237 8.237 0 016 18.75c1.995 0 3.823.707 5.25 1.886V4.533zM12.75 20.636A8.214 8.214 0 0118 18.75c.966 0 1.89.166 2.75.47a.75.75 0 001-.708V4.262a.75.75 0 00-.5-.707A9.735 9.735 0 0018 3a9.707 9.707 0 00-5.25 1.533v16.103z"></path>
                  </svg>
                  <span class="ml-3 whitespace-nowrap">Buku</span>
               </a>
            </li>
            <li>
               <a href="{{ route('kategori') }}" class="{{ Request::routeIs('kategori.*') || Request::routeIs('kategori') ? 'text-white bg-violet-500 rounded-lg dark:text-white hover:bg-violet-700 active:bg-violet-800' : 'text-slate-900 rounded-lg dark:text-slate-200 hover:bg-gray-200 active:bg-gray-300 dark:hover:bg-slate-600 dark:active:bg-slate-500' }} flex items-center p-3 mx-2">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M5.25 2.25a3 3 0 00-3 3v4.318a3 3 0 00.879 2.121l9.58 9.581c.92.92 2.39 1.186 3.548.428a18.849 18.849 0 005.441-5.44c.758-1.16.492-2.629-.428-3.548l-9.58-9.581a3 3 0 00-2.122-.879H5.25zM6.375 7.5a1.125 1.125 0 100-2.25 1.125 1.125 0 000 2.25z" clip-rule="evenodd"></path>
                  </svg>
                  <span class="flex-1 ml-3 whitespace-nowrap">Kategori</span>
               </a>
            </li>
            <li>
               <a href="{{ route('penulis') }}" class="{{ Request::routeIs('penulis.*') || Request::routeIs('penulis') ? 'text-white bg-violet-500 rounded-lg dark:text-white hover:bg-violet-700 active:bg-violet-800' : 'text-slate-900 rounded-lg dark:text-slate-200 hover:bg-gray-200 active:bg-gray-300 dark:hover:bg-slate-600 dark:active:bg-slate-500' }} flex items-center p-3 mx-2">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M8.25 6.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM15.75 9.75a3 3 0 116 0 3 3 0 01-6 0zM2.25 9.75a3 3 0 116 0 3 3 0 01-6 0zM6.31 15.117A6.745 6.745 0 0112 12a6.745 6.745 0 016.709 7.498.75.75 0 01-.372.568A12.696 12.696 0 0112 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 01-.372-.568 6.787 6.787 0 011.019-4.38z" clip-rule="evenodd"></path>
                    <path d="M5.082 14.254a8.287 8.287 0 00-1.308 5.135 9.687 9.687 0 01-1.764-.44l-.115-.04a.563.563 0 01-.373-.487l-.01-.121a3.75 3.75 0 013.57-4.047zM20.226 19.389a8.287 8.287 0 00-1.308-5.135 3.75 3.75 0 013.57 4.047l-.01.121a.563.563 0 01-.373.486l-.115.04c-.567.2-1.156.349-1.764.441z"></path>
                  </svg>

                  <span class="flex-1 ml-3 whitespace-nowrap">Penulis</span>
               </a>
            </li>
            <li>
               <a href="{{ route('penerbit') }}" class="{{ Request::routeIs('penerbit.*') || Request::routeIs('penerbit') ? 'text-white bg-violet-500 rounded-lg dark:text-white hover:bg-violet-700 active:bg-violet-800' : 'text-slate-900 rounded-lg dark:text-slate-200 hover:bg-gray-200 active:bg-gray-300 dark:hover:bg-slate-600 dark:active:bg-slate-500' }} flex items-center p-3 mx-2">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M3 2.25a.75.75 0 000 1.5v16.5h-.75a.75.75 0 000 1.5H15v-18a.75.75 0 000-1.5H3zM6.75 19.5v-2.25a.75.75 0 01.75-.75h3a.75.75 0 01.75.75v2.25a.75.75 0 01-.75.75h-3a.75.75 0 01-.75-.75zM6 6.75A.75.75 0 016.75 6h.75a.75.75 0 010 1.5h-.75A.75.75 0 016 6.75zM6.75 9a.75.75 0 000 1.5h.75a.75.75 0 000-1.5h-.75zM6 12.75a.75.75 0 01.75-.75h.75a.75.75 0 010 1.5h-.75a.75.75 0 01-.75-.75zM10.5 6a.75.75 0 000 1.5h.75a.75.75 0 000-1.5h-.75zm-.75 3.75A.75.75 0 0110.5 9h.75a.75.75 0 010 1.5h-.75a.75.75 0 01-.75-.75zM10.5 12a.75.75 0 000 1.5h.75a.75.75 0 000-1.5h-.75zM16.5 6.75v15h5.25a.75.75 0 000-1.5H21v-12a.75.75 0 000-1.5h-4.5zm1.5 4.5a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75h-.008a.75.75 0 01-.75-.75v-.008zm.75 2.25a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75v-.008a.75.75 0 00-.75-.75h-.008zM18 17.25a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75h-.008a.75.75 0 01-.75-.75v-.008z" clip-rule="evenodd"></path>
                  </svg>
                  <span class="flex-1 ml-3 whitespace-nowrap">Penerbit</span>
               </a>
            </li>
            @endif


            @if($auth->role->nama == 'Admin')
            <li>
               <p class="pt-5 pb-1 px-5 mt-3 border-t dark:border-slate-600 uppercase text-slate-400 text-xs font-semibold">Manajemen Laporan</p>
            </li>

            <li>
               <a href="{{ route('laporan.anggota') }}" class="{{ Request::routeIs('laporan.anggota') ? 'text-white bg-violet-500 rounded-lg dark:text-white hover:bg-violet-700 active:bg-violet-800' : 'text-slate-900 rounded-lg dark:text-slate-200 hover:bg-gray-200 active:bg-gray-300 dark:hover:bg-slate-600 dark:active:bg-slate-500' }} flex items-center p-3 mx-2">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M7.502 6h7.128A3.375 3.375 0 0118 9.375v9.375a3 3 0 003-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 00-.673-.05A3 3 0 0015 1.5h-1.5a3 3 0 00-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6zM13.5 3A1.5 1.5 0 0012 4.5h4.5A1.5 1.5 0 0015 3h-1.5z" clip-rule="evenodd"></path>
                    <path fill-rule="evenodd" d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 013 20.625V9.375zM6 12a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V12zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 15a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V15zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 18a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V18zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75z" clip-rule="evenodd"></path>
                  </svg>
                  <span class="flex-1 ml-3 whitespace-nowrap">Anggota</span>
               </a>
            </li>
            <li>
               <a href="{{ route('laporan.buku') }}" class="{{ Request::routeIs('laporan.buku') ? 'text-white bg-violet-500 rounded-lg dark:text-white hover:bg-violet-700 active:bg-violet-800' : 'text-slate-900 rounded-lg dark:text-slate-200 hover:bg-gray-200 active:bg-gray-300 dark:hover:bg-slate-600 dark:active:bg-slate-500' }} flex items-center p-3 mx-2">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M7.502 6h7.128A3.375 3.375 0 0118 9.375v9.375a3 3 0 003-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 00-.673-.05A3 3 0 0015 1.5h-1.5a3 3 0 00-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6zM13.5 3A1.5 1.5 0 0012 4.5h4.5A1.5 1.5 0 0015 3h-1.5z" clip-rule="evenodd"></path>
                    <path fill-rule="evenodd" d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 013 20.625V9.375zm9.586 4.594a.75.75 0 00-1.172-.938l-2.476 3.096-.908-.907a.75.75 0 00-1.06 1.06l1.5 1.5a.75.75 0 001.116-.062l3-3.75z" clip-rule="evenodd"></path>
                  </svg>
                  <span class="flex-1 ml-3 whitespace-nowrap">Buku</span>
               </a>
            </li>

            <li>
               <a href="{{ route('laporan.peminjaman') }}" class="{{ Request::routeIs('laporan.peminjaman') ? 'text-white bg-violet-500 rounded-lg dark:text-white hover:bg-violet-700 active:bg-violet-800' : 'text-slate-900 rounded-lg dark:text-slate-200 hover:bg-gray-200 active:bg-gray-300 dark:hover:bg-slate-600 dark:active:bg-slate-500' }} flex items-center p-3 mx-2">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M7.502 6h7.128A3.375 3.375 0 0118 9.375v9.375a3 3 0 003-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 00-.673-.05A3 3 0 0015 1.5h-1.5a3 3 0 00-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6zM13.5 3A1.5 1.5 0 0012 4.5h4.5A1.5 1.5 0 0015 3h-1.5z" clip-rule="evenodd"></path>
                    <path fill-rule="evenodd" d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 013 20.625V9.375zM6 12a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V12zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 15a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V15zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 18a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V18zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75z" clip-rule="evenodd"></path>
                  </svg>
                  <span class="flex-1 ml-3 whitespace-nowrap">Peminjaman</span>
               </a>
            </li>
            <li>
               <a href="{{ route('laporan.pengembalian') }}" class="{{ Request::routeIs('laporan.pengembalian') ? 'text-white bg-violet-500 rounded-lg dark:text-white hover:bg-violet-700 active:bg-violet-800' : 'text-slate-900 rounded-lg dark:text-slate-200 hover:bg-gray-200 active:bg-gray-300 dark:hover:bg-slate-600 dark:active:bg-slate-500' }} flex items-center p-3 mx-2">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M7.502 6h7.128A3.375 3.375 0 0118 9.375v9.375a3 3 0 003-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 00-.673-.05A3 3 0 0015 1.5h-1.5a3 3 0 00-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6zM13.5 3A1.5 1.5 0 0012 4.5h4.5A1.5 1.5 0 0015 3h-1.5z" clip-rule="evenodd"></path>
                    <path fill-rule="evenodd" d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 013 20.625V9.375zm9.586 4.594a.75.75 0 00-1.172-.938l-2.476 3.096-.908-.907a.75.75 0 00-1.06 1.06l1.5 1.5a.75.75 0 001.116-.062l3-3.75z" clip-rule="evenodd"></path>
                  </svg>
                  <span class="flex-1 ml-3 whitespace-nowrap">Pengembalian</span>
               </a>
            </li>
            @endif
            <li>
               <p class="pb-1 px-5 mt-3 border-t dark:border-slate-600 uppercase text-slate-400 text-xs font-semibold"></p>
            </li>
            <li>
               <form id="logout-form" action="{{ route('logout') }}" method="POST">
                      @csrf
                  <button type="submit" class="text-slate-900 rounded-lg dark:text-slate-200 hover:bg-gray-200 active:bg-gray-300 dark:hover:bg-slate-600 dark:active:bg-slate-500 flex items-center p-3 mx-2 w-64">
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                       <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                     </svg>
                     <span class="flex-1 ml-3 grow whitespace-nowrap text-left">Logout</span>
                  </button>
               </form>
            </li>
         </ul>
      </nav>                        

      <div class="flex items-center relative py-4 px-5 bg-slate-600 absolute bottom-0 w-full">
         <img src="{{ asset('/img/user/'.$auth->foto) }}" alt="{{ $auth->nama }}" class="w-10 h-10 mt-1 object-cover rounded-full mr-3">
         <span class="flex h-3 w-3 absolute left-12 bottom-5">
            <span class="animate-ping absolute flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
            <span class="relative flex rounded-full h-3 w-3 bg-emerald-500"></span>
         </span>
         <p class="grow truncate overflow-hidden">
            <span class="text-slate-100 text-sm block font-semibold">{{ $auth->nama }}</span>
            <span class="text-slate-300 text-xs block">{{ $auth->role->nama }} Perpustakaan</span>
         </p>
         <button id="toggle" title="Aktifkan Dark Mode" class="text-white bg-slate-200 bg-slate-500 hover:bg-slate-800 active:bg-slate-900 rounded-full text-sm p-2 focus:outline-none">
            <svg id="dark" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
               <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
            </svg>
            <svg id="light" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
               <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
            </svg>
         </button>
      </div>

   </div>
</aside>

<script>
$(document).ready(() => {
   $(document).on('click', '#navIcon', function(e){
      e.preventDefault()
      $('#sidebar').hide(300);
      $('#main').removeClass('pl-80')
      $(this).attr('id', 'navIconClose')
   })
   $(document).on('click', '#navIconClose', function(e){
      e.preventDefault()
      $('#sidebar').show(300);
      $('#main').addClass('pl-80')
      $(this).attr('id', 'navIcon')
   })
})
</script>
