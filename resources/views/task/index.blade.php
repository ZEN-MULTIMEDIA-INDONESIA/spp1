@extends('_default.app')

@section('content')
{{-- Content --}}
<div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
    <main class="w-full flex-grow p-6">
        <h1 class="text-3xl text-black pb-6">Tabel Data Task</h1>
        @if (auth()?->user()->peran === '0')
        <div class="flex flex-wrap">
            <a
                href="{{ route('task.tambah') }}"
                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
            >
                <i class="fa-solid fa-plus mr-3"></i>
                Tambah Data
            </a>
            <a
                href="{{ route('task.restorasi') }}"
                class="focus:outline-none text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700"
            >
                <i class="fa-solid fa-trash-can mr-3"></i>
                Restorasi Data
            </a>
        </div>
        @endif

        <div class="w-full mt-6">
            <div class="bg-white overflow-auto p-[2rem]">
                <table
                    class="min-w-full bg-white"
                    id="tabel_task"
                >
                    <thead class="bg-slate-400">
                        <tr>
                            <th class="py-3 px-4 uppercase font-semibold text-sm">Task</th>
                            <th class="py-3 px-4 uppercase font-semibold text-sm">Proyek</th>
                            <th class="py-3 px-4 uppercase font-semibold text-sm">Kontributor</th>
                            <th class="py-3 px-4 uppercase font-semibold text-sm">Status</th>
                            <th class="py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($tasks as $key => $task)
                        <tr>
                            <td class="py-3 px-4">{{ $task->task }}</td>
                            <td class="py-3 px-4">{{ $task->proyek->nama }}</td>
                            <td class="py-3 px-4">{{ $task->user?->nama ? $task->user->nama : 'Belum Ada' }}</td>
                            <td class="py-3 px-4">
                                @switch($task->status)
                                @case('0')
                                <span class="p-1 bg-blue-400 rounded">Pengerjaan</span>
                                @break
                                @case('1')
                                <span class="p-1 bg-yellow-200 rounded">Menunggu Review</span>
                                @break
                                @case('2')
                                <span class="p-1 bg-green-400 rounded">Selesai</span>
                                @break
                                @default
                                <span class="p-1 bg-gray-300 rounded">Menunggu Konfirmasi</span>
                                @endswitch
                            </td>
                            <td class="py-3 px-4">
                                @if (in_array($task->status, [null, '0']))
                                <button
                                    id="dropdownHoverButton"
                                    data-dropdown-toggle="dropdownHover[{{$key}}]"
                                    data-dropdown-trigger="hover"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                                    type="button"
                                >
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                @elseif ($task->status === '1')
                                @if (auth()->user()->peran === '0')
                                <button
                                    id="dropdownHoverButton"
                                    data-dropdown-toggle="dropdownHover[{{$key}}]"
                                    data-dropdown-trigger="hover"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                                    type="button"
                                >
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                @else
                                <button
                                    class="text-white bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                                >
                                    <i class="fa-solid fa-hourglass-start"></i>
                                </button>
                                @endif

                                @else
                                <button
                                    class="text-white bg-green-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                                >
                                    <i class="fa-solid fa-check"></i>
                                </button>
                                @endif
                                <!-- Dropdown menu -->
                                <div
                                    id="dropdownHover[{{ $key }}]"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-white"
                                >
                                    <ul
                                        class="py-2 text-sm text-black dark:text-black"
                                        aria-labelledby="dropdownHoverButton"
                                    >
                                        @if (auth()->user()->peran === '0')
                                        @if ($task->status === '1')
                                        <li>
                                            <a
                                                href="{{ route('task.edit', ['uuid' => $task->uuid]) }}"
                                                class="block px-4 py-2 hover:bg-blue-600 hover:text-white dark:hover:bg-blue-600 dark:hover:text-white"
                                            >Berikan Catatan</a>
                                        </li>
                                        <li>
                                            <a
                                                onclick="handleFinishing('{{ $task->uuid }}')"
                                                class="block px-4 py-2 hover:bg-blue-600 hover:text-white dark:hover:bg-blue-600 dark:hover:text-white"
                                            >Finishing</a>
                                        </li>
                                        @else
                                        <li>
                                            <a
                                                href="{{ route('task.edit', ['uuid' => $task->uuid]) }}"
                                                class="block px-4 py-2 hover:bg-blue-600 hover:text-white dark:hover:bg-blue-600 dark:hover:text-white"
                                            >Edit</a>
                                        </li>
                                        <li>
                                            <a
                                                onclick="handleHapus('{{ $task->uuid }}')"
                                                class="block px-4 py-2 hover:bg-blue-600 hover:text-white dark:hover:bg-blue-600 dark:hover:text-white"
                                            >Hapus</a>
                                        </li>
                                        @endif
                                        @endif
                                        @if (auth()->user()->peran === '3')
                                        @if (!$task->user)
                                        <li>
                                            <a
                                                onclick="handleTerima('{{ $task->uuid }}')"
                                                class="block px-4 py-2 hover:bg-blue-600 hover:text-white dark:hover:bg-blue-600 dark:hover:text-white"
                                            >Terima
                                                Task</a>
                                        </li>
                                        @endif
                                        @if ($task->user_id == auth()->user()->id && $task->status === '0')
                                        <li>
                                            <a
                                                onclick="handleSelesai('{{ $task->uuid }}')"
                                                class="block px-4 py-2 hover:bg-blue-600 hover:text-white dark:hover:bg-blue-600 dark:hover:text-white"
                                            >Selesai</a>
                                        </li>
                                        @endif
                                        @endif
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
        new DataTable('#tabel_task');

        function handleTerima(uuid)
        {
            Swal.fire({
            title: "Menerima Task",
            text: "Apakah anda yakin ingin mengambil task tersebut?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ambil!"
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `{{ config('app.url') }}task/update/terima-task/${uuid}`,
                    method: `POST`,
                    data: {
                        _token: `{{ csrf_token() }}`,
                        _method: `PUT`,
                    },
                    success: function(result) {
                        if (result.icon == 'success') {
                            Swal.fire({
                                title: result.title,
                                icon: result.icon,
                                text: result.text
                            }).then((res) => {
                                if (res.isConfirmed) {
                                    window.location.href = `{{ config('app.url') }}task`
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

        function handleSelesai(uuid)
        {
            Swal.fire({
            title: "Menyelesaikan Task",
            text: "Apakah anda yakin telah menyelesaikan task?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Submit"
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `{{ config('app.url') }}task/update/penyelesaian-task/${uuid}`,
                    method: `POST`,
                    data: {
                        _token: `{{ csrf_token() }}`,
                        _method: `PUT`,
                    },
                    success: function(result) {
                        if (result.icon == 'success') {
                            Swal.fire({
                                title: result.title,
                                icon: result.icon,
                                text: result.text
                            }).then((res) => {
                                if (res.isConfirmed) {
                                    window.location.href = `{{ config('app.url') }}task`
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
