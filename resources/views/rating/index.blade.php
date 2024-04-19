@extends('_default.app')

@section('content')
{{-- Content --}}
<div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
    <main class="w-full flex-grow p-6">
        <h1 class="text-3xl text-black pb-6">Tabel Data Task</h1>
        <div class="w-full flex justify-center mt-6">
            <div class="w-full lg:w-1/2 bg-white overflow-auto p-[2rem]">
                <table
                    class="min-w-full bg-white"
                    id="tabel_task"
                >
                    <thead class="bg-slate-400">
                        <tr>
                            <th class="py-3 px-4 uppercase font-semibold text-sm">Klien</th>
                            <th class="py-3 px-4 uppercase font-semibold text-sm">Proyek</th>
                            <th class="py-3 px-4 uppercase font-semibold text-sm">Rate</th>
                            <th class="py-3 px-4 uppercase font-semibold text-sm">Publish</th>
                            <th class="py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($ratings as $key => $rating)
                        <tr>
                            <td class="py-3 px-4">{{ $rating->user->nama }}</td>
                            <td class="py-3 px-4">{{ $rating->proyek->nama }}</td>
                            <td class="py-3 px-4">{{ $rating->rate }}</td>
                            <td class="py-3 px-4">{{ $rating->publish === '1' ? 'Ya' : 'Tidak' }}</td>
                            <td class="py-3 px-4">
                                <a
                                    href="{{ route('review-rating.detail', ['uuid' => $rating->uuid]) }}"
                                    class="text-white bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                                >
                                    Detail
                                </a>
                                @if (auth()->user()->peran === '0')
                                <a
                                    class="text-white bg-green-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                                    Publish
                                </a>
                                @endif
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
