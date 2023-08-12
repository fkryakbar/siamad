<section style="background-image: url('{{ asset('assets/image/kampus.jpg') }}')"
    class="h-[550px] lg:h-[450px] bg-center bg-no-repeat bg-cover bg-fixed relative">
    <div class="bg-green-600 h-[550px] lg:h-[450px] w-full opacity-70 absolute">
    </div>
    <div class="absolute w-full">
        <div class="mt-10 flex flex-col p-5 items-center">
            <img width="150px" src="{{ asset('assets/image/logo.png') }}" class="ml-auto mr-auto">
            <div class="lg:w-[70%] ml-auto mr-auto mt-4 text-center">
                <h1 class="text-5xl font-bold text-white">SIAMAD</h1>
                <h2 class="text-3xl lg:text-3xl font-bold text-white mt-2">SISTEM INFORMASI AKADEMIK MAHASISWA DAN DOSEN
                </h2>
            </div>
            @if (auth()->user())
                <div class="flex justify-center mt-2 text-white gap-2 text-center rounded p-2 bg-green-500 drop-shadow">
                    <p class="font-bold text-xl">Selamat datang, {{ auth()->user()->name }}</p>
                </div>
            @else
                <div class="flex justify-center mt-2 text-white gap-2">
                    @if (!Request::is('change-password'))
                        <a
                            class="bg-green-500 uppercase font-semibold p-2 rounded-lg hover:bg-green-700 transition-all w-28 drop-shadow active:scale-105 text-center">Masuk</a>
                    @endif
                    <a class="bg-green-500 uppercase font-semibold p-2 rounded-lg hover:bg-green-700 transition-all w-28 drop-shadow active:scale-105 text-center"
                        href="#tentang">Tentang</a>
                </div>

                <div class="flex justify-center mt-8 text-white">
                    <a
                        @if (auth()->user()) href="#apps"
                    @else
                    href="#login" @endif>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-10 h-10 animate-bounce">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 13.5L12 21m0 0l-7.5-7.5M12 21V3" />
                        </svg>
                    </a>
                </div>
            @endif
        </div>
    </div>
</section>
