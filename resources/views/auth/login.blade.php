@extends('_default.guest')
@section('content')
<div class="flex flex-col items-center justify-center px-6 pt-8 mx-auto h-screen bg-slate-200 pt:mt-0">
    <!-- Card -->
    <div class="w-full max-w-xl p-6 space-y-8 sm:p-8 bg-sidebar rounded-lg shadow ">
        <h2 class="text-2xl font-bold text-white">
            Sign in to platform
        </h2>
        <form
            class="mt-8 space-y-6"
            method="POST"
            action="{{ route('credentials') }}"
            data-parsley-validate
        >
            @csrf
            <div>
                <label
                    for="email"
                    class="block mb-2 text-sm font-medium text-white"
                >Email</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                    placeholder="name@company.com"
                    data-parsley-required
                >
            </div>
            <div>
                <label
                    for="password"
                    class="block mb-2 text-sm font-medium text-white"
                >Password</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="••••••••"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                    data-parsley-required
                >
            </div>
            <button
                type="submit"
                class="w-full px-5 py-3 text-base font-medium text-center text-white bg-green-600 rounded-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 sm:w-auto"
            >Login</button>
        </form>
    </div>
</div>
@endsection
