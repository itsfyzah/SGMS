@extends('layouts.app')

@section('content')
    {{-- Display success message if available --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="mb-4">Students List</h1>

    <table class="min-w-full table-auto border-collapse bg-white shadow-md rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 border-b text-left text-sm font-medium text-gray-700">Name</th>
                <th class="px-4 py-2 border-b text-left text-sm font-medium text-gray-700">Matric No</th>
                <th class="px-4 py-2 border-b text-left text-sm font-medium text-gray-700">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td class="px-4 py-2">{{ $student->name }}</td> <!-- Use $student->name instead of $student['name'] -->
                    <td class="px-4 py-2">{{ $student->matric_no }}</td> <!-- Use $student->matric_no instead of $student['id'] -->
                    <td class="px-4 py-2">
                        <a href="{{ route('students.show', $student->id) }}" class="text-blue-600 hover:text-blue-800">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
