@extends('_default.app')

@section('content')
{{-- Content --}}
<div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
    <main class="w-full flex-grow p-6">
        <h1 class="text-3xl text-black pb-6">Tabel Data Klien</h1>
        <div class="flex flex-wrap">
            <a
                href="{{ route('klien.tambah') }}"
                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
            >
                <i class="fa-solid fa-plus mr-3"></i>
                Tambah Data
            </a>
            <a
                href="{{ route('klien.restorasi') }}"
                class="focus:outline-none text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700"
            >
                <i class="fa-solid fa-trash-can mr-3"></i>
                Restorasi Data
            </a>
        </div>

        <div class="w-full mt-6">
            <div class="bg-white overflow-auto p-[2rem]">
                <table
                    class="min-w-full bg-white"
                    id="tabel_klien"
                >
                    <thead class="bg-slate-400">
                        <tr>
                            <th class="py-3 px-4 uppercase font-semibold text-sm">Nama</th>
                            <th class="py-3 px-4 uppercase font-semibold text-sm">Email</th>
                            <th class="py-3 px-4 uppercase font-semibold text-sm">Status</th>
                            <th class="py-3 px-4 uppercase font-semibold text-sm">Aksi</td>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($kliens as $key => $klien)
                        <tr>
                            <td class="py-3 px-4">{{ $klien->nama }}</td>
                            <td class="py-3 px-4">{{ $klien->email }}</td>
                            <td class="py-3 px-4">
                                @if ($klien->status == '0')
                                <span class="p-1 bg-slate-400 rounded">Belum Aktif</span>
                                @else
                                <span class="p-1 bg-green-400 rounded">Aktif</span>
                                @endif
                            </td>
                            <td class="py-3 px-4">
                                <button
                                    id="dropdownHoverButton"
                                    data-dropdown-toggle="dropdownHover[{{$key}}]"
                                    data-dropdown-trigger="hover"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                    type="button"
                                >
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>

                                <!-- Dropdown menu -->
                                <div
                                    id="dropdownHover[{{ $key }}]"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-white"
                                >
                                    <ul
                                        class="py-2 text-sm text-black dark:text-black"
                                        aria-labelledby="dropdownHoverButton"
                                    >
                                        <li>
                                            <a
                                                href="{{ route('klien.edit', ['uuid' => $klien->uuid]) }}"
                                                class="block px-4 py-2 hover:bg-blue-600 hover:text-white dark:hover:bg-blue-600 dark:hover:text-white"
                                            >Edit</a>
                                        </li>
                                        <li>
                                            <a
                                                onclick="handleHapus('{{ $klien->uuid }}')"
                                                class="block px-4 py-2 hover:bg-blue-600 hover:text-white dark:hover:bg-blue-600 dark:hover:text-white"
                                            >Hapus</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script>
        new DataTable('#tabel_klien');

        function handleHapus(uuid)
        {
            Swal.fire({
            title: "Menghapus data",
            text: "Apakah anda yakin ingin menghapus data tersebut?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Hapus!"
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `{{ config('app.url') }}klien/hapus/${uuid}`,
                    method: `POST`,
                    data: {
                        _token: `{{ csrf_token() }}`,
                        _method: `DELETE`,
                    },
                    success: function(result) {
                        if (result.icon == 'success') {
                            Swal.fire({
                                title: result.title,
                                icon: result.icon,
                                text: result.text
                            }).then((res) => {
                                if (res.isConfirmed) {
                                    window.location.href = `{{ config('app.url') }}klien`
                                }
                            })
                        }
                    },
                    error: function(error) {
                        console.error(error)
                    }
                })
            }
            });
        }
    </script>

    @include('partials._footer')
</div>
@endsection