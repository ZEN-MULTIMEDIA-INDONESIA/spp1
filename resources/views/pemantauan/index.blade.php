@extends('_default.app')

@section('content')
<div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
    <main class="w-full flex-grow p-6">
        <h1 class="w-full text-3xl text-black pb-6">Pemantauan Proyek</h1>
        <div class="flex flex-wrap bg-white p-10">
            <div class="w-full my-6 pr-0">
                <div class="leading-loose flex flex-wrap gap-2 justify-center mb-3">
                    @php
                    $progres = [
                    ['status' => '0', 'progres' => '0%'],
                    ['status' => '1', 'progres' => '25%'],
                    ['status' => '2', 'progres' => '75%'],
                    ['status' => '3', 'progres' => '100%'],
                    ]
                    @endphp
                    @foreach ($proyeks as $key => $proyek)
                    <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                        <div class="flex flex-col items-center p-10">
                            <img
                                class="w-24 h-24 mb-3 rounded-full shadow-lg border"
                                src="{{ $proyek->user->foto ? asset('storage/'.$proyek->user->foto) : asset('icon/default.jpg') }}"
                                alt="User Foto"
                            />
                            <h5 class="mb-1 text-lg font-medium text-gray-900">{{ $proyek->user->nama }}</h5>
                            <h5 class="mb-1 text-xl font-medium text-gray-900">Proyek {{ $proyek->nama }}</h5>
                            @foreach ($progres as $p)
                            @if($proyek->status == $p['status'])
                            <div class="w-full flex justify-between mt-3">
                                <span class="text-base font-medium text-blue-700">Progress Bar</span>
                                <span class="text-sm font-medium text-blue-700">{{ $p['progres'] }}</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div
                                    class="bg-blue-600 h-2.5 rounded-full"
                                    style="width: {{ $p['progres'] }}"
                                ></div>
                            </div>
                            @endif
                            @endforeach
                            <div class="flex mt-4 md:mt-6">
                                <a
                                    href="#"
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-400"
                                >Lihat Rating</a>
                                <a
                                    href="#"
                                    class="py-2 px-4 ms-2 text-sm font-medium text-white focus:outline-none bg-blue-500 rounded-lg border border-gray-200 hover:bg-blue-600 hover:text-white focus:z-10 focus:ring-4 focus:ring-blue-400"
                                >Detail</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{ $proyeks->links() }}
            </div>
        </div>
    </main>
    @include('partials._footer')
</div>

@endsection
