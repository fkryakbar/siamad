@extends('layouts.landing')

@section('title', 'SIAMAD STIT Assunniyyah Tambarangan')

@section('content')
    <section class="mt-10 lg:w-[50%] mx-auto w-full px-2">
        <div class="flex gap-2 lg:flex-row flex-col flex-wrap-reverse lg:items-center">
            <div class="lg:basis-[59%]" id="apps">
                <h1 class="text-2xl font-semibold text-green-500">Daftar Aplikasi</h1>
                @if (auth()->user()->role == 'superAdmin')
                    @include('components.apps.superAdmin')
                @endif
                @if (auth()->user()->role == 'dosen')
                    @include('components.apps.dosen')
                @endif
            </div>
            <div class="lg:basis-[39%]">
                <img src="{{ asset('assets/image/landing-page.svg') }}" alt="landing Illustration" class="w-full">
            </div>
        </div>
    </section>
@endsection
