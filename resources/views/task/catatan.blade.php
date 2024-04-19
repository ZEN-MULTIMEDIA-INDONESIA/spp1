@extends('_default.app')

@section('content')
<div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
    <main class="w-full flex-grow p-6">
        <h1 class="w-full text-3xl text-black pb-6">Form Berikan Catatan</h1>
        <form
            action="{{ route('catata.task.store', ['id' => $task->id]) }}"
            class="rounded"
            method="POST"
            enctype="multipart/form-data"
            data-parsley-validate
        >
            @csrf
            <div class="flex flex-wrap justify-evenly bg-white p-10">
                <div class="w-full lg:max-w-xl my-6 pr-0 lg:pr-2">
                    <div class="leading-loose">
                        <div class="mt-2">
                            <label
                                class="block text-sm text-gray-600"
                                for="task"
                            >Task</label>
                            <input
                                class="w-full px-5 py-4 text-gray-700 bg-gray-200 rounded"
                                id="task"
                                name="task"
                                type="text"
                                value="{{ $task->task }}"
                                readonly
                                data-parsley-required
                            >
                        </div>
                        <div class="mt-2">
                            <label
                                class="block text-sm text-gray-600"
                                for="catatan"
                            >Catatan</label>
                            <textarea
                                class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded"
                                id="catatan"
                                name="catatan"
                                rows="6"
                                placeholder="Berikan catatan untuk task ini"
                                data-parsley-required
                            ></textarea>
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
                            <a
                                href="{{ route('task.detail', ['uuid' => $proyek->uuid]) }}"
                                class="px-4 py-1 text-white font-light tracking-wider bg-red-500 rounded"
                            >Batalkan</a>
                        </div>

                    </div>
                </div>
                <div class="w-full lg:w-1/2 mt-6 pl-0 lg:pl-2">
                    <div class="leading-loose">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-3">
                            <table
                                class="w-full text-sm text-left"
                                id="tabel_catatan"
                            >
                                <thead class="text-xs text-black uppercase bg-gray-50">
                                    <tr>
                                        <th
                                            scope="col"
                                            class="px-6 py-3"
                                        >
                                            Catatan
                                        </th>
                                        <th
                                            scope="col"
                                            class="px-6 py-3"
                                        >
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($catatans as $key => $catatan)
                                    <tr class="odd:bg-white even:bg-gray-200">
                                        <th
                                            scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                                        >{{ $catatan->catatan }}</th>
                                        <td class="px-6 py-4">
                                            <a
                                                onclick="handleHapus('{{ $catatan->uuid }}')"
                                                class="font-medium text-blue-600 hover:underline"
                                            >Hapus</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </main>

    <script>
        new DataTable('#tabel_catatan');
        function handleHapus(uuid)
        {
            Swal.fire({
            title: "Menghapus Catatan",
            text: "Apakah anda yakin ingin menghapus catatan tersebut?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Hapus!"
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `{{ config('app.url') }}task/detail/catatan/hapus/${uuid}`,
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
    </script>

    @include('partials._footer')
</div>

@endsection
