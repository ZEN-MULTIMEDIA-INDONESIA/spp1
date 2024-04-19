@extends('_default.app')

@section('content')
<div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
    <main class="w-full flex-grow p-6">
        <h1 class="w-full text-3xl text-black pb-6">Review Rating dari {{ $rating->user->nama }}</h1>
        <div class="flex flex-wrap bg-white p-10 max-w-3xl">
            <div class="w-full my-6 pr-0 lg:pr-2">
                <div class="leading-loose">
                    <div class="mb-3">
                        <label
                            class="block text-sm text-gray-600"
                            for="password"
                        >Rate</label>
                        <div class="flex items-center">
                            @for ($i = 1; $i <=
                                5;
                                $i++)
                                <i
                                class="fa-solid fa-star {{ intval($rating->rate) >= $i ? 'text-yellow-400' : '' }}"
                            ></i>
                                @endfor
                        </div>

                    </div>
                    <div class="mb-3">
                        <label
                            class="block text-sm text-gray-600"
                            for="konfirmasi_password"
                        >Review</label>
                        <textarea
                            class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded"
                            id="catatan"
                            name="catatan"
                            rows="6"
                            placeholder="Berikan catatan untuk task ini"
                            readonly
                        >{{ $rating->text }}</textarea>
                    </div>
                    <div class="mt-6 flex float-end gap-3">
                        <a
                            href="{{ route('review-rating') }}"
                            class="px-4 py-1 text-white font-light tracking-wider bg-red-500 rounded"
                        >Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('partials._footer')
</div>

@endsection
