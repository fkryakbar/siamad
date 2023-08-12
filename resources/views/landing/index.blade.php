@extends('layouts.landing')

@section('title', 'SIAMAD STIT Assunniyyah Tambarangan')

@section('content')
    <section class="mt-10 lg:w-[50%] mx-auto w-full px-2">
        <div class="flex gap-2 lg:flex-row flex-col flex-wrap-reverse lg:items-center">
            <div class="lg:basis-[59%]">
                <div class="p-5 rounded-lg bg-white drop-shadow ">
                    <h3 class="text-green-500 text-2xl font-bold text-center">MASUK SIAMAD</h3>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="p-3 rounded-lg bg-red-400 my-2  flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                </svg>
                                <p>{{ $error }}</p>
                            </div>
                        @endforeach
                    @endif
                    <form action="" method="post" class="mt-3" id="login">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 ">Username</label>
                            <input type="text" id="username" placeholder="Masukkan username" name="username"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:outline-green-500 active:outline-green-500 active:ring-blue-500 block w-full p-2.5">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                            <input type="password" id="username" placeholder="Masukkan password" name="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:outline-green-500 active:outline-green-500 active:ring-blue-500 block w-full p-2.5">
                        </div>
                        <div class="mb-3 flex justify-between items-center">
                            <button type="submit"
                                class="bg-green-500 font-semibold p-2 rounded-lg hover:bg-green-700 transition-all w-28 drop-shadow active:scale-105 text-white text-sm">Masuk</button>
                            <a class=" text-green-500 hover:text-green-700 text-sm" href="">Lupa
                                Password?</a>
                        </div>
                        <div class="flex justify-center">
                        </div>
                    </form>
                </div>
            </div>
            <div class="lg:basis-[39%]">
                <img src="{{ asset('assets/image/login.svg') }}" alt="Login Illustration" class="w-full">
            </div>
        </div>
    </section>
@endsection
