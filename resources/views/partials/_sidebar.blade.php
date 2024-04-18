{{-- Sidebar --}}
<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
    <div class="p-6">
        {{-- <a
            href=""
            class="text-white text-3xl font-semibold uppercase hover:text-gray-300"
        ></a> --}}
        <img
            class="bg-white mx-auto rounded p-1 object-cover"
            src="{{ asset('icon/zen.png') }}"
            alt="Logo Zen Multimedia Indonesia"
        >
    </div>
    @php
    $urlArray = array_slice(explode('/', request()->url()), 3);
    @endphp
    <nav class="text-white text-base font-semibold pt-3">
        @foreach ($menus as $key => $menu)
        <a
            href="{{ route($menu['url']) }}"
            class="flex items-center text-white py-4 pl-6 nav-item
            @if (request()->route()->getName() == $menu['url'] || in_array($menu['slugName'] ,$urlArray))
            active-nav-link
            @endif
            "
        >
            {!! $menu['icon'] !!}
            {{ $menu['name'] }}
        </a>
        @endforeach
    </nav>
</aside>