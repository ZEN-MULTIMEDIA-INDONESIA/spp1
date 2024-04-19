@extends('_default.app')

@section('content')
<div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
    <main class="w-full flex-grow p-6">
        <h1 class="w-full text-3xl text-black pb-6">Detail Data Proyek</h1>
        <div class="flex flex-wrap bg-white p-10">
            <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
                <div class="leading-loose">
                    <div class="w-full max-w-md bg-white border border-gray-200 rounded-lg shadow mb-3 mx-auto">
                        <div class="flex flex-col items-center p-10">
                            <img
                                class="w-24 h-24 mb-3 rounded-full shadow-lg border"
                                src="{{ $proyek->user->foto ? asset('storage/' . $proyek->user->foto) : asset('icon/default.jpg') }}"
                                alt="Profile Image"
                            />
                            <h5 class="mb-1 text-xl font-medium text-black">{{ $proyek->user->nama }}
                            </h5>
                            <div class="flex">
                                <i class="fa-solid fa-phone mr-3"></i>
                                <span class="text-sm text-gray-500">{{ $proyek->user->no_telp ?? 'Tidak ada' }}</span>
                            </div>
                            <div class="flex">
                                <i class="fa-regular fa-envelope mr-3"></i>
                                <span class="text-sm text-gray-500">{{ $proyek->user->email ?? 'Tidak ada' }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="w-full bg-white border border-gray-200 rounded-lg shadow">
                        <div class="flex flex-col items-center p-3">
                            <div class="flex w-full mb-3">
                                <span class="inline-flex items-center px-3 text-sm text-gray-900rounded-s-md">
                                    Biaya Proyek :
                                </span>
                                <input
                                    class="rounded-none rounded-e-lg text-gray-90 block flex-1 min-w-0 w-full text-sm p-2.5"
                                    readonly
                                    value="Rp. {{ number_format($proyek->biaya, 0, ',', '.') }}"
                                >
                            </div>
                            <div class="flex w-full mb-3">
                                <span class="inline-flex items-center px-3 text-sm text-gray-900rounded-s-md">
                                    Uang Muka :
                                </span>
                                <input
                                    class="rounded-none rounded-e-lg text-gray-90 block flex-1 min-w-0 w-full text-sm p-2.5"
                                    readonly
                                    value="Rp. {{ number_format($proyek->biaya, 0, ',', '.') }}"
                                >
                            </div>
                            <div class="flex w-full mb-3">
                                <span class="inline-flex items-center px-3 text-sm text-gray-900rounded-s-md">
                                    Bukti Transfer :
                                </span>
                                <img
                                    class="my-3 h-auto max-w-[10rem] mx-auto"
                                    src="{{ $proyek->foto_uang_muka ? asset('storage/' . $proyek->foto_uang_muka) : asset('icon/preview.jpg') }}"
                                    alt="image foto_uang_muka"
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/2 mt-6 pl-0 lg:pl-2">
                <div class="leading-loose">
                    <div class="w-full bg-white border border-gray-200 rounded-lg shadow mb-3 mx-auto">
                        <div class="flex flex-col items-center p-10">
                            <div class="flex w-full mb-3">
                                <span class="inline-flex items-center px-3 text-sm text-gray-900rounded-s-md">
                                    Judul Proyek :
                                </span>
                                <input
                                    class="rounded-none rounded-e-lg text-gray-90 block flex-1 min-w-0 w-full text-sm p-2.5"
                                    readonly
                                    value="{{ $proyek->nama }}"
                                >
                            </div>
                            <div class="flex w-full mb-3">
                                <span class="inline-flex items-start px-3 text-sm text-gray-900 rounded-s-md">
                                    Deskripsi :
                                </span>
                                <textarea
                                    rows=10
                                    class="rounded-none rounded-e-lg text-black block flex-1 min-w-0 w-full text-sm p-2.5 px-3 py-2 border-none"
                                    readonly
                                >{{ $proyek->deskripsi }}</textarea>
                            </div>
                            <div class="flex w-full mb-3">
                                <span class="inline-flex items-center px-3 text-sm text-gray-900 rounded-s-md">
                                    Tanggal Mulai :
                                </span>
                                <input
                                    class="rounded-none rounded-e-lg text-gray-90 block flex-1 min-w-0 w-full text-sm p-2.5"
                                    readonly
                                    value="{{ $proyek->tanggal_mulai }}"
                                >
                            </div>
                            <div class="flex w-full mb-3">
                                <span class="inline-flex items-center px-3 text-sm text-gray-900 rounded-s-md">
                                    Tanggal Deadline :
                                </span>
                                <input
                                    class="rounded-none rounded-e-lg text-gray-90 block flex-1 min-w-0 w-full text-sm p-2.5"
                                    readonly
                                    value="{{ $proyek->tanggal_tenggat }}"
                                >
                            </div>
                            <div class="flex w-full mb-3">
                                <span class="inline-flex items-center px-3 text-sm text-gray-900 rounded-s-md">
                                    File Pendukung :
                                </span>
                                @if ($proyek->file_pendukung)
                                <a
                                    href="{{ asset('storage/' . $proyek->file_pendukung) }}"
                                    target="_blank"
                                    class="rounded-lg text-white flex-1 min-w-0 w-full text-sm p-2.5 px-3 py-2 bg-green-600 text-center"
                                >
                                    Download
                                </a>
                                @else
                                <input
                                    class="rounded-none rounded-e-lg text-gray-90 block flex-1 min-w-0 w-full text-sm p-2.5"
                                    readonly
                                    value="Tidak ada"
                                >
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 flex float-end gap-3">
                        <a
                            href="{{ route('proyek') }}"
                            class="px-4 py-1 text-white font-light tracking-wider bg-red-500 rounded"
                        >Kembali</a>
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
