<!-- Mobile Header & Nav -->
<header
    x-data="{ isOpen: false }"
    class="w-full bg-sidebar py-5 px-6 sm:hidden"
>
    <div class="flex items-center justify-between">
        <a
            href="index.html"
            class="text-white text-3xl font-semibold uppercase hover:text-gray-300"
        >
            <img
                class="bg-white w-[10rem] mx-auto rounded p-1 object-cover"
                src="{{ asset('icon/zen.png') }}"
                alt="Logo Zen Multimedia Indonesia"
            >
        </a>
        <button
            @click="isOpen = !isOpen"
            class="text-white text-3xl focus:outline-none"
        >
            <i
                x-show="!isOpen"
                class="fas fa-bars"
            ></i>
            <i
                x-show="isOpen"
                class="fas fa-times"
            ></i>
        </button>
    </div>

    <!-- Dropdown Nav -->
    <nav
        :class="isOpen ? 'flex': 'hidden'"
        class="flex flex-col pt-4"
    >
        @php
        $urlArray = array_slice(explode('/', request()->url()), 3);
        @endphp
        @foreach ($menus as $key => $menu)
        <a
            href="#"
            class="flex items-center text-white py-2 pl-4 nav-item
            @if (request()->route()->getName() == $menu['url'] || in_array($menu['slugName'] ,$urlArray))
            active-nav-link
            @endif
            "
        >
            {!! $menu['icon'] !!}
            {{ $menu['name'] }}
        </a>
        @endforeach
        <a
            onclick="handleLogout()"
            class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item"
        >
            <i class="fas fa-sign-out-alt mr-3"></i>
            Logout
        </a>
    </nav>
    {{-- <button
    class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center"
  >
    <i class="fas fa-plus mr-3"></i> New Report
  </button> --}}
</header>
