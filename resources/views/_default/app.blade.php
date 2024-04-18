<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <title>{{ $title ? $title : config('app.name') }}</title>
    <meta
        name="author"
        content="David Grzyb"
    >
    <meta
        name="description"
        content=""
    >

    <!-- Tailwind -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link
        rel="stylesheet"
        href="{{ asset('css/dataTables.dataTables.min.css') }}"
    >

    {{-- Fontawesome --}}
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <!-- jQuery & dataTables -->
    <script src="{{ asset('jquery/jquery.min.js') }}"></script>
    <script src="https://cdn.tailwindcss.com/"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.tailwindcss.js"></script>

    {{--  Flowbite --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    {{-- Sweetalert2 --}}
    <script src="{{ asset('js/sweetalert2.all.js') }}"></script>

    {{-- Form Validator --}}
    <script src="{{ asset('js/parsley.min.js') }}"></script>
    {{-- <script
        src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"
        integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    ></script> --}}

    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }

        .bg-sidebar {
            background: #3d68ff;
        }

        .cta-btn {
            color: #3d68ff;
        }

        .upgrade-btn {
            background: #1947ee;
        }

        .upgrade-btn:hover {
            background: #0038fd;
        }

        .active-nav-link {
            background: #1947ee;
        }

        .nav-item:hover {
            background: #1947ee;
        }

        .account-link:hover {
            background: #3d68ff;
        }

        @media (prefers-color-scheme: dark) {
            #dt-length-0 {
                background-color: white;
                color: black;
            }

            ul.pagination>a {
                background-color: white;
                color: black;
                border: 1px solid gray;
            }

            ul.pagination>a:hover {
                background-color: #2563EB;
                color: white;
            }

            ul.pagination>a:active {
                background-color: #2563EB;
                color: white;
            }
        }

        @media (prefers-color-scheme: light) {
            ul.pagination>a {
                background-color: white;
                color: black;
                border: 1px solid gray;
            }

            ul.pagination>a:hover {
                background-color: #2563EB;
                color: white;
            }

            ul.pagination>a:active {
                background-color: #2563EB;
                color: white;
            }
        }
    </style>
</head>

<body class="bg-gray-100 font-family-karla flex">

    <x-sidebar />

    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        @include('partials._desktop-header')

        <x-mobile-header />

        @yield('content')

    </div>

    @include('partials._script')

</body>

</html>