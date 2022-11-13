@extends('app')

@section('content')

<section id="login" class="flex items-center flex-col justify-center min-h-screen bg-violet-500 text-slate-500 dark:text-slate-200">
	<div class="shadow-xl p-12 flex justify-around items-center max-w-5xl w-full bg-white relative dark:bg-slate-800 rounded-2xl">
		<button id="toggle" title="Aktifkan Dark Mode" class="text-slate-500 dark:text-white bg-slate-200 dark:bg-slate-600 hover:bg-slate-300 active:bg-slate-400 dark:hover:bg-slate-500 dark:active:bg-slate-400 rounded-xl text-sm p-2 focus:outline-none absolute top-3 left-3">
            <svg id="dark" class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
               <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
            </svg>
            <svg id="light" class="w-7 h-7 hidden" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
               <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
            </svg>
         </button>

		<div class="block p-3 basis-2/5 ">
			<img class="w-full h-auto" src="{{ asset('img/theme/login.webp') }}" alt="Masuk ke perpustakaan">
		</div>
		<div class="block p-3 basis-1/2">
			<div class="border-b dark:border-slate-600 pb-5 block mb-3">
				<div class="flex">
					<p class="font-medium text-slate-900 dark:text-white text-3xl pb-4 mr-1.5">Masuk</p>
					<h1 class="font-medium text-slate-900 dark:text-white text-3xl pb-4">Perpustakaan<h1>
				</div>
				<p>Silahkan login dengan menggunakan akun Perpustakaanmu</p>
			</div>

			@error('name')
			
				<div class="py-4 px-5 bg-red-200 text-red-700 rounded-lg mt-5 mb-2">{{ $message }}</div>
			
			@enderror

            <form method="POST" action="{{ route('login') }}">
                @csrf
				<div class="pt-3">
					<label for="username">Username</label>
					<input name="username" id="username" type="text" class="p-3 focus:outline-none focus:ring focus:ring-violet-500 rounded-lg w-full border my-3 dark:bg-slate-700 dark:border-slate-600" placeholder="Ketik username..." required autocomplete="off" autofocus>
				</div>
				<div class="pt-3">
					<label for="password">Password</label>
					<input name="password" id="password" type="password" class="p-3 focus:outline-none focus:ring focus:ring-violet-500 rounded-lg w-full border my-3 dark:bg-slate-700 dark:border-slate-600" placeholder="Ketik password..." required>
				</div>
				<div class="pt-3">
					<button type="submit" class="p-3 w-full bg-violet-500 hover:bg-violet-700 active:bg-violet-800 text-white uppercase font-bold rounded-lg text-sm mt-3 focus:outline-none focus:ring focus:ring-violet-500">Submit</button>
				</div>
			</form>
		</div>
	</div>
</section>

@endsection