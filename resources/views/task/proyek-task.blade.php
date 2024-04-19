@extends('_default.app')

@section('content')
{{-- Content --}}
<div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
    <main class="w-full flex-grow p-6">
        <h1 class="text-3xl text-black pb-6">Tabel Data Task</h1>
        <div class="flex flex-wrap">
            <a
                href="{{ route('task') }}"
                class="focus:outline-none text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-300"
            >
                <i class="fa-solid fa-arrow-left mr-3"></i>
                Kembali
            </a>
        </div>

        <div class="flex flex-wrap justify-evenly bg-white p-10">
            @if (auth()?->user()?->peran === '0')
            <div class="w-full lg:w-1/2 mt-6">
                <form
                    action="{{ route('task.store', ['uuid' => $proyek->uuid]) }}"
                    class="rounded"
                    method="POST"
                    data-parsley-validate
                >
                    @csrf
                    <div class="">
                        <label
                            for="task"
                            class="block text-sm text-gray-600"
                        >Task</label>
                        <input
                            class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded"
                            id="task"
                            name="task"
                            type="text"
                            placeholder="Inputkan task"
                            data-parsley-required
                        >
                    </div>
                    <div class="mt-2">
                        <label
                            for="tanggal_tenggat"
                            class="block text-sm text-gray-600"
                        >Deadline</label>
                        <input
                            class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded"
                            id="tanggal_tenggat"
                            name="tanggal_tenggat"
                            type="date"
                            data-parsley-required
                        >
                    </div>
                    <div class="mt-6 flex float-end gap-3">
                        <button
                            class="px-4 py-1 text-white font-light tracking-wider bg-green-700 rounded"
                            type="submit"
                        >Tambah Data</button>
                        <button
                            type="reset"
                            class="px-4 py-1 text-white font-light tracking-wider bg-yellow-500 rounded"
                        >Reset</button>
                    </div>
                </form>
            </div>
            @endif
            <div class="w-full {{ auth()?->user()?->peran === '0' ? 'lg:w-1/2' : 'lg:w-full' }} mt-6">
                <div class="bg-white overflow-auto p-[2rem]">
                    <table
                        class="min-w-full bg-white"
                        id="tabel_task"
                    >
                        <thead class="bg-slate-400">
                            <tr>
                                <th class="py-3 px-4 uppercase font-semibold text-sm">Task</th>
                                <th class="py-3 px-4 uppercase font-semibold text-sm">Kontributor</th>
                                <th class="py-3 px-4 uppercase font-semibold text-sm">Deadline</th>
                                <th class="py-3 px-4 uppercase font-semibold text-sm">Status</th>
                                <th class="py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach ($tasks as $key => $task)
                            <tr>
                                <td class="py-3 px-4">{{ $task->task }}</td>
                                <td class="py-3 px-4">{{ $task->user?->nama ? $task->user->nama : 'Belum Ada' }}</td>
                                <td class="py-3 px-4">{{ $task->tanggal_tenggat }}</td>
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
                                    @switch($task->status)
                                    @case('0')
                                    @if (auth()->user()->peran === '0')
                                    <button
                                        class="text-white bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                                    >
                                        <i class="fa-solid fa-hourglass-start"></i>
                                    </button>
                                    @elseif(auth()->user()->peran === '3')
                                    <button
                                        onclick="handleSelesai('{{$task->uuid}}')"
                                        class="text-white bg-green-400 hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                                    >
                                        Selesai
                                    </button>
                                    @else
                                    <button
                                        class="text-white bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                                    >
                                        <i class="fa-solid fa-hourglass-start"></i>
                                    </button>
                                    @endif
                                    @break
                                    @case('1')
                                    @if (auth()->user()->peran === '0')
                                    <div class="flex flex-wrap gap-2">
                                        <a
                                            href="{{ route('catatan.task', ['uuid' => $task->uuid]) }}"
                                            class="text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                                        >
                                            Tambah Catatan
                                        </a>
                                        <button
                                            onclick="handleFinishing('{{$task->uuid}}')"
                                            class="text-white bg-green-400 hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                                        >
                                            Selesai
                                        </button>
                                    </div>
                                    @else
                                    <button
                                        class="text-white bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                                    >
                                        <i class="fa-solid fa-hourglass-start"></i>
                                    </button>
                                    @endif
                                    @break
                                    @case('2')
                                    <button
                                        class="text-white bg-green-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                                    >
                                        <i class="fa-solid fa-check"></i>
                                    </button>
                                    @break

                                    @default
                                    @if (auth()->user()->peran === '0')
                                    <button
                                        onclick="handleHapus('{{$task->uuid}}')"
                                        class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                                    >
                                        Hapus
                                    </button>
                                    @elseif(auth()->user()->peran === '3')
                                    <button
                                        onclick="handleTerima('{{$task->uuid}}')"
                                        class="text-white bg-green-400 hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                                    >
                                        Terima Task
                                    </button>
                                    @endif
                                    @endswitch
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <script>
        new DataTable('#tabel_task');

        function handleHapus(uuid)
        {
            Swal.fire({
            title: "Menghapus Task",
            text: "Apakah anda yakin ingin menghapus task tersebut?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Hapus!"
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `{{ config('app.url') }}task/hapus/${uuid}`,
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
                                    window.location.reload()
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
                                    window.location.reload()
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
                                    window.location.reload()
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

        function handleFinishing(uuid)
        {
            Swal.fire({
            title: "Konfirmasi task",
            text: "Apakah task yang dipilih telah terpenuhi?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Submit"
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `{{ config('app.url') }}task/update/finishing/${uuid}`,
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
                                    window.location.reload()
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
