@extends('_default.app')

@section('content')
{{-- Content --}}
<div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
    <main class="w-full flex-grow p-6">
        <h1 class="text-3xl text-black pb-6">Tabel Data Proyek</h1>
        <div class="flex flex-wrap">
            <a
                href="{{ route('proyek.tambah') }}"
                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
            >
                <i class="fa-solid fa-plus mr-3"></i>
                Tambah Data
            </a>
            <a
                href="{{ route('proyek.restorasi') }}"
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
                    id="tabel_proyek"
                >
                    <thead class="bg-slate-400">
                        <tr>
                            <th class="py-3 px-4 uppercase font-semibold text-sm">Klien</th>
                            <th class="py-3 px-4 uppercase font-semibold text-sm">Judul Proyek</th>
                            <th class="py-3 px-4 uppercase font-semibold text-sm">Tanggal Mulai</th>
                            <th class="py-3 px-4 uppercase font-semibold text-sm">Deadline</th>
                            <th class="py-3 px-4 uppercase font-semibold text-sm">Uang Muka</td>
                            <th class="py-3 px-4 uppercase font-semibold text-sm">Status</td>
                            <th class="py-3 px-4 uppercase font-semibold text-sm">Berkas</td>
                            <th class="py-3 px-4 uppercase font-semibold text-sm">Aksi</td>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($proyek as $key => $proyek)
                        <tr>
                            <td class="py-3 px-4">{{ $proyek->user->nama }}</td>
                            <td class="py-3 px-4">{{ $proyek->nama }}</td>
                            <td class="py-3 px-4">{{ substr($proyek->tanggal_mulai, 0, 10) }}</td>
                            <td class="py-3 px-4">{{ substr($proyek->tanggal_tenggat, 0, 10) }}</td>
                            <td class="py-3 px-4">Rp. {{ number_format($proyek->uang_muka, 0, ',', '.') }}</td>
                            <td class="py-3 px-4">
                                @switch($proyek->status)
                                @case('1')
                                <span class="p-1 bg-blue-300 rounded">Di Proses</span>
                                @break
                                @case('2')
                                <span class="p-1 bg-yellow-200 rounded">Review</span>
                                @break
                                @case('3')
                                <span class="p-1 bg-green-400 rounded">Selesai</span>
                                @break
                                @default
                                <span class="p-1 bg-slate-300 rounded">Menunggu Konfirmasi</span>
                                @endswitch
                            </td>
                            <td class="py-3 px-4">
                                @if ($proyek->file_pendukung)
                                <span class="p-1 bg-green-400 rounded">Lengkap</span>
                                @else
                                <span class="p-1 bg-red-300 rounded">Belum Lengkap</span>
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
                                                href="{{ route('proyek.detail', ['uuid' => $proyek->uuid]) }}"
                                                class="block px-4 py-2 hover:bg-blue-600 hover:text-white dark:hover:bg-blue-600 dark:hover:text-white"
                                            >Detail</a>
                                        </li>
                                        <li>
                                            <a
                                                href="{{ route('proyek.edit', ['uuid' => $proyek->uuid]) }}"
                                                class="block px-4 py-2 hover:bg-blue-600 hover:text-white dark:hover:bg-blue-600 dark:hover:text-white"
                                            >Edit</a>
                                        </li>
                                        <li>
                                            <a
                                                onclick="handleHapus('{{ $proyek->uuid }}')"
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
        new DataTable('#tabel_proyek');

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
                    url: `{{ config('app.url') }}proyek/hapus/${uuid}`,
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
                                    window.location.href = `{{ config('app.url') }}proyek`
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
