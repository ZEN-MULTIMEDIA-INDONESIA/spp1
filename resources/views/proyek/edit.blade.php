@extends('_default.app')

@section('content')
<div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
    <main class="w-full flex-grow p-6">
        <h1 class="w-full text-3xl text-black pb-6">Form Edit Data Proyek</h1>
        <form
            action="{{ route('proyek.update', ['uuid' => $proyek->uuid]) }}"
            class="rounded"
            method="POST"
            enctype="multipart/form-data"
            data-parsley-validate
        >
            @csrf
            @method('PUT')
            <div class="flex flex-wrap bg-white p-10">
                <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
                    <div class="leading-loose">
                        <div class="">
                            <label
                                for="user_id"
                                class="block text-sm text-gray-600"
                            >Pilih Karyawan</label>
                            <select
                                id="user_id"
                                name="user_id"
                                class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded"
                                data-parsley-required
                            >
                                <option
                                    selected
                                    value=''
                                >Pilih Klien</option>
                                @foreach ($klien as $key => $k)
                                <option
                                    value="{{ $k->id }}"
                                    {{ $proyek->user_id == $k->id ? 'selected' : '' }}
                                >{{ $k->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-2">
                            <label
                                class="block text-sm text-gray-600"
                                for="nama"
                            >Nama Proyek</label>
                            <input
                                class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded"
                                id="nama"
                                name="nama"
                                type="text"
                                placeholder="Inputkan nama proyek"
                                value="{{ $proyek->nama }}"
                                data-parsley-required
                            >
                        </div>
                        <div class="mt-2">
                            <label
                                class="block text-sm text-gray-600"
                                for="deskripsi"
                            >Deskripsi</label>
                            <textarea
                                class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded"
                                id="deskripsi"
                                name="deskripsi"
                                rows="6"
                                placeholder="Inputkan deskripsi proyek"
                                data-parsley-required
                            >{{ $proyek->deskripsi }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-1/2 mt-6 pl-0 lg:pl-2">
                    <div class="leading-loose">
                        <div class="mt-2">
                            <label
                                class="block text-sm text-gray-600"
                                for="tanggal_mulai"
                            >Tanggal Mulai</label>
                            <input
                                class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded"
                                id="tanggal_mulai"
                                name="tanggal_mulai"
                                type="date"
                                placeholder="Pilih tanggal mulai"
                                data-parsley-required
                                data-parsley-type="date"
                                value="{{ $proyek->tanggal_mulai }}"
                            >
                        </div>
                        <div class="mt-2">
                            <label
                                class="block text-sm text-gray-600"
                                for="tanggal_tenggat"
                            >Tanggal Tenggat</label>
                            <input
                                class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded"
                                id="tanggal_tenggat"
                                name="tanggal_tenggat"
                                type="date"
                                placeholder="Pilih tanggal tenggat"
                                data-parsley-required
                                data-parsley-type="date"
                                value="{{ $proyek->tanggal_tenggat }}"
                            >
                        </div>
                        <div class="mt-2">
                            <label
                                class=" block text-sm text-gray-600"
                                for="biaya"
                            >Total biaya yang ditawarkan</label>
                            <input
                                class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded"
                                id="biaya"
                                name="biaya"
                                type="number"
                                placeholder="Inputkan jumlah biaya"
                                data-parsley-required
                                data-parsley-type="integer"
                                value="{{ $proyek->biaya }}"
                            >
                        </div>
                        <div class="mt-2">
                            <label
                                class="block text-sm text-gray-600"
                                for="foto_uang_muka"
                            >Bukti transfer uang muka</label>
                            <input
                                class="block w-full text-gray-700 rounded bg-gray-200"
                                id="foto_uang_muka"
                                type="file"
                                name="foto_uang_muka"
                            >
                            <p
                                class="mt-1 text-sm text-gray-600"
                                id="foto_uang_muka_help"
                            >SVG, PNG, JPG or GIF (MAX. 4MB).</p>
                            <img
                                class="my-3 h-auto max-w-[15rem] mx-auto"
                                src="{{ $proyek->foto_uang_muka ? asset('storage/' . $proyek->foto_uang_muka) : asset('icon/preview.jpg') }}"
                                alt="image foto_uang_muka"
                                id="preview_image"
                            >
                            <input
                                class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded"
                                id="uang_muka"
                                name="uang_muka"
                                type="number"
                                placeholder="Jumlah uang muka"
                                data-parsley-required
                                data-parsley-type="integer"
                                value="{{ $proyek->uang_muka }}"
                            >
                        </div>
                        <div class="mt-2">
                            <label
                                class=" block text-sm text-gray-600"
                                for="biaya"
                            >Jenis Proyek</label>
                            @php
                            $jenisProyek = ['Pembuatan Aplikasi Android & IOS', 'Pembuatan Website', 'Pembuatan Robot
                            Trading', 'Pembuatan Animasi Explainer', 'Layanan Jasa Multimedia'];
                            @endphp
                            <select
                                id="jenis_proyek"
                                name="jenis_proyek"
                                class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded"
                                data-parsley-required
                            >
                                <option
                                    selected
                                    value=''
                                >Pilih Jenis Proyek</option>
                                @foreach ($jenisProyek as $j)
                                <option
                                    value="{{ $j }}"
                                    {{ $proyek->jenis_proyek === $j ? 'selected' : '' }}
                                >{{ $j }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-2">
                            <label
                                class="block text-sm text-gray-600"
                                for="file_pendukung"
                            >Upload berkas</label>
                            <input
                                class="block w-full text-gray-700 rounded bg-gray-200"
                                id="file_pendukung"
                                type="file"
                                name="file_pendukung"
                            >
                            <p
                                class="mt-1 text-sm text-gray-600"
                                id="file_pendukung_help"
                            >PDF, zip, atau rar (MAX. 10MB).</p>
                        </div>
                        <div class="mt-6 flex float-end gap-3">
                            <button
                                class="px-4 py-1 text-white font-light tracking-wider bg-green-700 rounded"
                                type="submit"
                            >Edit Data</button>
                            <button
                                type="reset"
                                class="px-4 py-1 text-white font-light tracking-wider bg-yellow-500 rounded"
                            >Reset</button>
                            <a
                                href="{{ route('proyek') }}"
                                class="px-4 py-1 text-white font-light tracking-wider bg-red-500 rounded"
                            >Batalkan</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
