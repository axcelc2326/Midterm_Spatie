@extends('layout.layout')

@section('content')
<div class="container mx-auto p-5">
    <h1 class="text-2xl font-bold mb-4">Records List</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('records.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md mb-4 inline-block hover:bg-blue-600">
        + Add Record
    </a>

    <table class="w-full border-collapse border border-gray-300 mt-4">
        <thead>
            <tr class="bg-gray-200">
                <th class="border p-2">Name</th>
                <th class="border p-2">Address</th>
                <th class="border p-2">Email</th>
                <th class="border p-2">Phone</th>
                <th class="border p-2">Course</th>
                @canany(['edit-records', 'delete-records'])
                    <th class="border p-2">Actions</th>
                @endcanany
            </tr>
        </thead>
        <tbody>
            @foreach ($records as $record)
            <tr class="border">
                <td class="border p-2">{{ $record->name }}</td>
                <td class="border p-2">{{ $record->address }}</td>
                <td class="border p-2">{{ $record->email }}</td>
                <td class="border p-2">{{ $record->phone }}</td>
                <td class="border p-2">{{ $record->course }}</td>

                @canany(['edit-records', 'delete-records'])
                <td class="border p-2 flex gap-2">
                    @can('edit-records')
                        <a href="{{ route('records.edit', $record->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600">
                            Edit
                        </a>
                    @endcan

                    @can('delete-records')
                        <form action="{{ route('records.destroy', $record->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600"
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
@endsection
