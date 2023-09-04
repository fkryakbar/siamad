@extends('layouts.landing')

@section('title', 'SIAMAD STIT Assunniyyah Tambarangan')

@section('content')
    <section class="mt-10 lg:w-[50%] mx-auto w-full px-2">
        @if (session()->has('message'))
            <div class="p-3 rounded-lg bg-green-400 my-2  flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                </svg>
                <p>{{ session('message') }}</p>
            </div>
        @endif
        <div class="flex gap-2 lg:flex-row flex-col flex-wrap-reverse lg:items-center">
            <div class="lg:basis-[59%]" id="apps">
                <h1 class="text-2xl font-semibold text-green-500">Daftar Aplikasi</h1>
                @if (auth()->user()->role == 'superAdmin')
                    @include('components.apps.superAdmin')
                @endif
                @if (auth()->user()->role == 'dosen')
                    @include('components.apps.dosen')
                @endif
                @if (auth()->user()->role == 'mahasiswa')
                    @include('components.apps.mahasiswa')
                @endif
            </div>
            <div class="lg:basis-[39%]">
                <img src="{{ asset('assets/image/landing-page.svg') }}" alt="landing Illustration" class="w-full">
            </div>
        </div>
        @if (auth()->user()->role == 'dosen' || auth()->user()->role == 'mahasiswa')
            <div class="flex gap-2 lg:flex-row flex-col flex-wrap-reverse lg:items-center">
                <div class="lg:basis-[59%]">
                    <h1 class="text-2xl font-semibold text-green-500">Ganti Password</h1>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="p-3 rounded-lg bg-red-400 my-2  flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                </svg>
                                <p>{{ $error }}</p>
                            </div>
                        @endforeach
                    @endif
                    <div class="bg-white drop-shadow rounded-lg p-5 mt-2">
                        <form action="/reset-password" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="old_password" class="block mb-2 text-sm font-medium text-gray-900 ">Password
                                    Lama</label>
                                <input type="password" id="old_password" name="old_password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:outline-green-500 active:outline-green-500 active:ring-blue-500 block w-full p-2.5">
                            </div>
                            <div class="mb-3">
                                <label for="new_password" class="block mb-2 text-sm font-medium text-gray-900 ">Password
                                    Baru</label>
                                <input type="password" id="new_password" name="new_password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:outline-green-500 active:outline-green-500 active:ring-blue-500 block w-full p-2.5">
                            </div>
                            <div class="mb-3">
                                <label for="new_password_confirmation"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Ulangi Password Baru</label>
                                <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:outline-green-500 active:outline-green-500 active:ring-blue-500 block w-full p-2.5">
                            </div>
                            <button type="submit"
                                class="bg-green-500 font-semibold p-2 rounded-lg hover:bg-green-700 transition-all w-fit drop-shadow active:scale-105 text-white text-sm">Ganti
                                Password</button>
                        </form>
                    </div>
                </div>
                <div class="lg:basis-[39%]">
                    <img src="{{ asset('assets/image/Reset password-rafiki.svg') }}" alt="Change Password" class="w-full">
                </div>
            </div>
        @endif
    </section>
@endsection
