<div class="bg-green-700 py-2 lg:px-5 px-2 flex justify-between items-center text-white">
    <a href="/" class="flex gap-2 hover:bg-green-900 rounded-lg p-2 items-center">
        <img src="{{ asset('assets/image/logo.png') }}" alt="logo" class="w-10">
        <div class="uppercase font-bold lg:text-sm text-xs">
            <p>STIT Assunniyyah</p>
            <p> Tambarangan</p>
        </div>
    </a>
    @if (auth()->user())
        <a href="/logout" class="p-2 rounded-md hover:bg-green-900 font-semibold lg:text-base text-sm">
            LOGOUT
        </a>
    @else
        <a href="#login" class="p-2 rounded-md hover:bg-green-900 font-semibold lg:text-base text-sm">
            LOGIN
        </a>
    @endif
</div>
