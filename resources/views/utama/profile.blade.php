@extends('_default.app')

@section('content')
<div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
    <main class="w-full flex-grow p-6">
        <h1 class="w-full text-3xl text-black pb-6">Detail Data Proyek</h1>
        <div class="flex max-w-3xl flex-wrap bg-white p-10">
            <div class="w-full my-6 pr-0 lg:pr-2">
                <div class="leading-loose">
                    <div class="flex flex-col items-center p-10">
                        <img
                            class="w-24 h-24 mb-3 rounded-full shadow-lg border"
                            src="{{ auth()?->user()?->foto ? asset('storage/' . auth()?->user()?->foto) : asset('icon/default.jpg') }}"
                            alt="Profile Image"
                        />
                        <h5 class="mb-1 text-xl font-medium text-black">{{ auth()->user()->nama }}
                        </h5>
                        <div class="flex">
                            <i class="fa-solid fa-phone mr-3"></i>
                            <span class="text-sm text-gray-500">{{ auth()->user()->no_telp ?? 'Tidak ada' }}</span>
                        </div>
                        <div class="flex mb-3">
                            <i class="fa-regular fa-envelope mr-3"></i>
                            <span class="text-sm text-gray-500">{{ auth()->user()->email ?? 'Tidak ada' }}</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <a
                                href="{{ route('profile.ubah-password') }}"
                                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                            >
                                Ubah Password
                            </a>
                            <a
                                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                Update Biodata
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        $('#foto_uang_muka').change(function(e) {
            const canvas = document.getElementById('preview_image')
            canvas.src = URL.createObjectURL(this.files[0])
        })
    </script>

    @include('partials._footer')
</div>

@endsection
