<nav class="bg-sidebar fixed w-full z-20 top-0 start-0">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a
            href=""
            class="flex items-center space-x-3 p-1 rounded bg-white"
        >
            <img
                src="{{ asset('icon/zen.png') }}"
                class="h-12"
                alt="Flowbite Logo"
            >
        </a>
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            @guest
            <a
                href="{{ route('login') }}"
                class="text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-4 py-2 text-center bg-green-600 hover:bg-green-700 focus:ring-green-700"
            >Login</a>
            @endguest

            @auth
            <button
                id="dropdownAvatarNameButton"
                data-dropdown-toggle="dropdownAvatarName"
                class="flex items-center text-sm pe-1 font-medium text-white rounded-full hover:text-black md:me-0 focus:ring-4 focus:ring-transparent"
                type="button"
            >
                <span class="sr-only">Open user menu</span>
                <img
                    class="w-8 h-8 me-2 rounded-full"
                    src="{{ auth()->user()->foto ? asset('storage/' . auth()->user()->foto) : asset('icon/default.jpg') }}"
                    alt="user photo"
                >
                {{ auth()->user()->nama }}
                <i class="fa-solid fa-caret-down ml-3"></i>
            </button>
            @endauth

            <button
                data-collapse-toggle="navbar-sticky"
                type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400"
                aria-controls="navbar-sticky"
                aria-expanded="false"
            >
                <span class="sr-only">Open main menu</span>
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
        <div
            class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1"
            id="navbar-sticky"
        >
            <x-navbar-guest />
        </div>
    </div>
</nav>
