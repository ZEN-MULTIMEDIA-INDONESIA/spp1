@extends('_default.app')

@section('content')
<div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
    <main class="w-full flex-grow p-6">
        <h1 class="w-full text-3xl text-black pb-6">
            {{ $rating ? 'Review Rating' : 'Tambah Review Rating' }}
        </h1>
        <form
            action="{{ route('pemantauan-proyek.rating.store', ['uuid' => $proyek->uuid]) }}"
            class="rounded"
            method="POST"
            data-parsley-validate
        >
            @csrf
            <div class="flex flex-wrap bg-white p-10 max-w-3xl">
                <div class="w-full my-6 pr-0 lg:pr-2">
                    <div class="leading-loose">
                        <div class="mb-[3rem]">
                        </div>
                        <div class="mb-[3rem]">
                            <label
                                for="rate"
                                class="block text-sm text-gray-600"
                            >Rating</label>
                            <div class="relative mb-6">
                                <label
                                    for="rate"
                                    class="sr-only"
                                >Labels range</label>
                                <input
                                    id="rate"
                                    name="rate"
                                    type="range"
                                    value="{{ $rating ? $rating->rate : '0' }}"
                                    min="0"
                                    max="5"
                                    class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer"
                                    {{ $rating ? 'readonly' : 'data-parsley-required' }}
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
                        </div>
                        <div class="mb-3">
                            <label
                                class="block text-sm text-gray-600"
                                for="nama"
                            >Review</label>
                            <textarea
                                class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded"
                                id="text"
                                name="text"
                                rows="6"
                                placeholder="Berikan review positif"
                                {{ $rating ? 'readonly' : 'data-parsley-required' }}
                            >{{ $rating ? $rating->text : '' }}</textarea>
                        </div>
                        <div class="mt-6 flex float-end gap-3">
                            @if (!$rating)
                            <button
                                class="px-4 py-1 text-white font-light tracking-wider bg-green-700 rounded"
                                type="submit"
                            >Submit</button>
                            <button
                                type="reset"
                                class="px-4 py-1 text-white font-light tracking-wider bg-yellow-500 rounded"
                            >Reset</button>
                            @endif
                            <a
                                href="{{ route('pemantauan-proyek') }}"
                                class="px-4 py-1 text-white font-light tracking-wider bg-red-500 rounded"
                            >{{ $rating ? 'Kembali' : 'Batalkan' }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>

    @include('partials._footer')
</div>

@endsection
