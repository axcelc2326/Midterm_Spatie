@extends('layout.layout')


@section('content')
<div class="container mx-auto p-5">
    <h1 class="text-2xl font-bold mb-4">Create a New Record</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-600 p-3 rounded-md mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('records.store') }}" method="POST" class="bg-gray-100 p-5 rounded-md shadow-md">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700">Name:</label>
            <input type="text" name="name" class="w-full p-2 border rounded-md" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Address:</label>
            <input type="text" name="address" class="w-full p-2 border rounded-md" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Email:</label>
            <input type="email" name="email" class="w-full p-2 border rounded-md" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Phone:</label>
            <input type="text" name="phone" class="w-full p-2 border rounded-md" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Course:</label>
            <input type="text" name="course" class="w-full p-2 border rounded-md" required>
        </div>

        <button type="submit" class="bg-green-500 text-white p-2 rounded-md hover:bg-green-600">
            Create Record
        </button>
    </form>
</div>
@endsection
