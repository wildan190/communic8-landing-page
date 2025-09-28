@extends('layouts.web')

@section('content')
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex flex-col justify-center items-center">
        <div class="text-center">
            <h1 class="text-9xl font-extrabold text-gray-800 dark:text-gray-200 tracking-widest">403</h1>
            <div class="bg-red-600 px-2 text-sm rounded rotate-12 absolute">
                Akses Ditolak
            </div>
            <p class="mt-4 text-lg text-gray-600 dark:text-gray-400">Maaf, Anda tidak memiliki izin untuk mengakses halaman ini.</p>

            <a href="{{ route('home.index') }}" class="mt-8 inline-block bg-indigo-600 text-white font-semibold px-6 py-3 rounded-md hover:bg-indigo-700 transition-colors duration-300">
                Kembali ke Beranda
            </a>
        </div>
    </div>
@endsection
