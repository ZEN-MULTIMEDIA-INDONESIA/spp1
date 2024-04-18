@extends('_default.app')

@section('content')
<div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
    <main class="w-full flex-grow p-6">
        <h1 class="w-full text-3xl text-black pb-6">Form Edit Pengguna</h1>
        <form
            action="{{ route('pengguna.update', ['uuid' => $pengguna->uuid]) }}"
            class="rounded"
            method="POST"
            data-parsley-validate
        >
            @csrf
            @method('PUT')
            <div class="flex flex-wrap bg-white p-10 max-w-3xl">
                <div class="w-full my-6 pr-0 lg:pr-2">
                    <div class="leading-loose">
                        <div class="mb-3">
                            <label
                                class="block text-sm text-gray-600"
                                for="password"
                            >Password Baru</label>
                            <input
                                class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded"
                                id="new_password"
                                name="new_password"
                                type="password"
                                placeholder="Input password baru"
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
                                data-parsley-equalto="#new_password"
                            >
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
                                href="{{ route('pengguna') }}"
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
