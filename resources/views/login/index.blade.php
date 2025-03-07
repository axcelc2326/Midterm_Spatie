@extends('layout.layout')

@section('content')
    <div class="w-screen h-screen flex flex-col justify-start items-center pt-20">

        <form class="flex flex-col bg-white p-6 rounded-lg shadow-md w-full max-w-sm mx-auto space-y-4"
            action="{{ route('signin') }}" method="POST">
            @csrf

            <h2 class="text-2xl font-bold text-gray-700 text-center">Log in</h2>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input type="email" id="email" name="email" required
                    class="mt-1 w-full p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 outline-none">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <input type="password" id="password" name="password" required
                    class="mt-1 w-full p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 outline-none">
            </div>

            <button type="submit"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 rounded-lg transition duration-300">
                Log in
            </button>

        </form>

        @if (session('error'))
            <div class="text-red-500 p-3 rounded-md">{{ session('error') }}</div>
        @endif
    </div>
@endsection
