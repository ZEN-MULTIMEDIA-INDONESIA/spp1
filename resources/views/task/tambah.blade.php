@extends('_default.app')

@section('content')
<div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
    <main class="w-full flex-grow p-6">
        <h1 class="w-full text-3xl text-black pb-6">Forms</h1>
        <form
            action="{{ route('task.store') }}"
            class="rounded"
            method="POST"
            data-parsley-validate
        >
            @csrf
            <div class="flex flex-wrap bg-white p-10 max-w-3xl">
                <div class="w-full my-6 pr-0 lg:pr-2">
                    <div class="leading-loose">
                        {{-- <div class="mb-3">
                            <label
                                for="task"
                                class="block text-sm text-gray-600"
                            >Rating</label>
                            <div class="relative mb-6">
                                <label
                                    for="labels-range-input"
                                    class="sr-only"
                                >Labels range</label>
                                <input
                                    id="labels-range-input"
                                    type="range"
                                    value="1"
                                    min="0"
                                    max="5"
                                    class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer"
                                >
                                <div class="w-full flex justify-between text-sm text-gray-600 absolute -bottom-6">
                                    <span class="">Min
                                        (0)</span>
                                    <span class="">1</span>
                                    <span class="">2</span>
                                    <span class="">3</span>
                                    <span class="">4</span>
                                    <span class="">Max(5)</span>
                                </div>
                            </div>
                        </div> --}}
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
                                class="block text-sm text-gray-600"
                                for="nama"
                            >Nama Proyek</label>
                            <select
                                id="proyek_id"
                                name="proyek_id"
                                class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded"
                                data-parsley-required
                            >
                                <option
                                    selected
                                    value=''
                                >Pilih Proyek</option>
                                @foreach ($proyeks as $key => $proyek)
                                <option value="{{ $proyek->id }}">{{ $proyek->nama }}</option>
                                @endforeach
                            </select>
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
                                href="{{ route('task') }}"
                                class="px-4 py-1 text-white font-light tracking-wider bg-red-500 rounded"
                            >Batalkan</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>

    <footer class="w-full bg-white text-right p-4">
        Built by <a
            target="_blank"
            href="https://davidgrzyb.com"
            class="underline"
        >David Grzyb</a>.
    </footer>
</div>

@endsection
