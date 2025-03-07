@extends('layout.layout')

@section('content')
<div class="container mx-auto p-5">
    <h1 class="text-2xl font-bold mb-4">Edit Record</h1>

    {{-- Corrected form action to use records.update --}}
    <form action="{{ route('records.update', $record->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium">Name</label>
            <input type="text" name="name" value="{{ $record->name }}" class="w-full p-2 border rounded-md" required>
        </div>

        <div>
            <label class="block font-medium">Address</label>
            <input type="text" name="address" value="{{ $record->address }}" class="w-full p-2 border rounded-md" required>
        </div>

        <div>
            <label class="block font-medium">Email</label>
            <input type="email" name="email" value="{{ $record->email }}" class="w-full p-2 border rounded-md" required>
        </div>

        <div>
            <label class="block font-medium">Phone</label>
            <input type="text" name="phone" value="{{ $record->phone }}" class="w-full p-2 border rounded-md" required>
        </div>

        <div>
            <label class="block font-medium">Course</label>
            <input type="text" name="course" value="{{ $record->course }}" class="w-full p-2 border rounded-md" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
            Update Record
        </button>
    </form>
</div>
@endsection
