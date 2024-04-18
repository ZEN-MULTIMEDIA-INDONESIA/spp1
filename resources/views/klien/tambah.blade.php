@extends('_default.app')

@section('content')
<div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
    <main class="w-full flex-grow p-6">
        <h1 class="w-full text-3xl text-black pb-6">Form Tambah Klien</h1>
        <form
            action="{{ route('klien.store') }}"
            class="rounded"
            method="POST"
            data-parsley-validate
        >
            @csrf
            <div class="flex flex-wrap bg-white p-10 max-w-3xl">
                <div class="w-full my-6 pr-0 lg:pr-2">
                    <div class="leading-loose">
                        <div class="mb-3">
                            <label
                                class="block text-sm text-gray-600"
                                for="nama"
                            >Nama Klien</label>
                            <input
                                class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded"
                                id="nama"
                                name="nama"
                                type="text"
                                placeholder="Inputkan nama klien"
                                data-parsley-required
                            >
                        </div>
                        <div class="mb-3">
                            <label
                                class="block text-sm text-gray-600"
                                for="email"
                            >Email</label>
                            <input
                                class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded"
                                id="email"
                                name="email"
                                type="email"
                                placeholder="Inputkan email klien"
                                data-parsley-required
                                data-parsley-type="email"
                            >
                            @error('email')
                            <small class="text-sm text-red-500">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label
                                class="block text-sm text-gray-600"
                                for="no_telp"
                            >Nomor Telepon</label>
                            <input
                                class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded"
                                id="no_telp"
                                name="no_telp"
                                type="text"
                                placeholder="6285123456789"
                                data-parsley-required
                                data-parsley-type="integer"
                            >
                        </div>
                        <div class="mb-3">
                            <label
                                class="block text-sm text-gray-600"
                                for="password"
                            >Password</label>
                            <input
                                class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded"
                                id="password"
                                name="password"
                                type="password"
                                placeholder="Input password"
                                data-parsley-required
                            >
                        </div>
                        <div class="mb-3">
                            <label
                                class="block text-sm text-gray-600"
                                for="konfirmasi_password"
                            >Konfirmasi Password</label>
                            <input
                                class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded"
                                id="konfirmasi_password"
                                name="konfirmasi_password"
                                type="password"
                                placeholder="Input ulang password"
                                data-parsley-required
                                data-parsley-equalto="#password"
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
                            <a
                                href="{{ route('klien') }}"
                                class="px-4 py-1 text-white font-light tracking-wider bg-red-500 rounded"
                            >Batalkan</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>

    @include('partials._footer')
</div>

@endsection