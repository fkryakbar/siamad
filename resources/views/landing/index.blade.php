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
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:outline-green-500 active:outline-green-500 active:ring-green-500 block w-full p-2.5">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                            <input type="password" id="password" placeholder="Masukkan password" name="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:outline-green-500 active:outline-green-500 active:ring-green-500 block w-full p-2.5">
                            <div class="mt-2 flex items-center gap-2">
                                <input id="checkBox" type="checkbox" onclick="lihatPassword()">
                                <label for="checkBox" style="cursor: pointer" class="text-sm">
                                    Lihat Password
                                </label>
                            </div>
                        </div>
                        <div class="mb-3 flex justify-between items-center">
                            <button type="submit"
                                class="bg-green-500 font-semibold p-2 rounded-lg hover:bg-green-700 transition-all w-28 drop-shadow active:scale-105 text-white text-sm">Masuk</button>
                            <a data-modal-target="defaultModal" data-modal-toggle="defaultModal"
                                class="cursor-pointer text-green-500 hover:text-green-700 text-sm">Lupa
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
    <div id="defaultModal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Lupa Password?
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                        data-modal-hide="defaultModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="p-6 space-y-6">
                    <p class="text-base leading-relaxed text-gray-500">
                        Jika anda lupa password, silahkan hubungi administrator anda untuk melakukan reset password
                    </p>
                </div>
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b">

                    <button data-modal-hide="defaultModal" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        const x = document.getElementById('password')

        function lihatPassword() {
            if (x.type == 'password') {
                x.type = 'text'
            } else {
                x.type = 'password'
            }
        }
    </script>

@endsection
