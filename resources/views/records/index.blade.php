@extends('layout.layout')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Records List</h1>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    @can('create-records')
        <a href="{{ route('records.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
            + Add Record
        </a>
    @endcan

    <div class="mt-6 overflow-x-auto">
        <table class="min-w-full bg-white shadow-lg rounded-lg border border-gray-300">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="py-3 px-6 text-left text-gray-700 font-semibold">Name</th>
                    <th class="py-3 px-6 text-left text-gray-700 font-semibold">Address</th>
                    <th class="py-3 px-6 text-left text-gray-700 font-semibold">Email</th>
                    <th class="py-3 px-6 text-left text-gray-700 font-semibold">Phone</th>
                    <th class="py-3 px-6 text-left text-gray-700 font-semibold">Course</th>
                    @canany(['edit-records', 'delete-records'])
                        <th class="py-3 px-6 text-center text-gray-700 font-semibold">Actions</th>
                    @endcanany
                </tr>
            </thead>
            <tbody>
                @foreach ($records as $record)
                <tr class="border-b hover:bg-gray-50 transition">
                    <td class="py-4 px-6">{{ $record->name }}</td>
                    <td class="py-4 px-6">{{ $record->address }}</td>
                    <td class="py-4 px-6">{{ $record->email }}</td>
                    <td class="py-4 px-6">{{ $record->phone }}</td>
                    <td class="py-4 px-6">{{ $record->course }}</td>

                    @canany(['edit-records', 'delete-records'])
                    <td class="py-4 px-6 flex justify-center gap-3">
                        @can('edit-records')
                            <a href="{{ route('records.edit', $record->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded-lg hover:bg-yellow-600 transition duration-300">
                                Edit
                            </a>
                        @endcan

                        @can('delete-records')
                            <form action="{{ route('records.destroy', $record->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded-lg hover:bg-red-700 transition duration-300"
                                        onclick="return confirm('Are you sure you want to delete this record?');">
                                    Delete
                                </button>
                            </form>
                        @endcan
                    </td>
                    @endcanany
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
