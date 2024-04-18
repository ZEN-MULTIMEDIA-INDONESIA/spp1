<ul
    class="flex flex-col gap-1 p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-sidebar md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-sidebar ">
    <li>
        <a
            href="#"
            class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-black md:p-0 "
            aria-current="page"
        >Home</a>
    </li>
    <li>
        <a
            href="#"
            class="block py-2 px-3 text-white rounded hover:bg-blue-700 md:hover:bg-transparent md:hover:text-black md:p-0"
        >About</a>
    </li>
    <li>
        <a
            href="#"
            class="block py-2 px-3 text-white rounded hover:bg-blue-700 md:hover:bg-transparent md:hover:text-black md:p-0"
        >Services</a>
    </li>
    <li>
        <a
            href="#"
            class="block py-2 px-3 text-white rounded hover:bg-blue-700 md:hover:bg-transparent md:hover:text-black md:p-0"
        >Contact</a>
    </li>
</ul>

<!-- Dropdown menu -->
<div
    id="dropdownAvatarName"
    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44"
>
    <div class="px-4 py-3 text-sm text-black">
        <div class="truncate">{{ auth()?->user()?->email }}</div>
    </div>
    <ul
        class="py-2 text-sm text-black"
        aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton"
    >
        <li>
            <a
                href="{{ route('dashboard') }}"
                class="block px-4 py-2 hover:bg-gray-100 "
            >Dashboard</a>
        </li>
        <li>
            <a
                href="#"
                class="block px-4 py-2 hover:bg-gray-100 "
            >Kelola Akun</a>
        </li>
    </ul>
    <div class="py-2">
        <a
            onclick="handleLogout()"
            class="block px-4 py-2 text-sm text-black hover:bg-gray-100"
        >Logout</a>
    </div>
</div>
