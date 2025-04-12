@extends('layouts.app')

@section('content')
    {{-- Display success message if available --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="mb-4">Students</h1>
    <a href="{{ route('students.create') }}" class="btn btn-primary mb-4">Add Student</a>

    <!-- Search Form -->
    <form method="GET" action="{{ route('students.index') }}" class="mb-4">
        <input type="text" name="search" placeholder="Search student..." value="{{ request('search') }}" class="border p-2 w-full max-w-md mb-4">
        <button type="submit" class="bg-blue-500 text-white p-2">Search</button>
    </form>

    <table class="min-w-full table-auto border-collapse bg-white shadow-md rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 border-b text-left text-sm font-medium text-gray-700">Name</th>
                <th class="px-4 py-2 border-b text-left text-sm font-medium text-gray-700">Email</th>
                <th class="px-4 py-2 border-b text-left text-sm font-medium text-gray-700">Matric No</th>
                <th class="px-4 py-2 border-b text-left text-sm font-medium text-gray-700">Class</th>
                <th class="px-4 py-2 border-b text-left text-sm font-medium text-gray-700">Gender</th>
                <th class="px-4 py-2 border-b text-left text-sm font-medium text-gray-700">Admission Session</th>
                <th class="px-4 py-2 border-b text-left text-sm font-medium text-gray-700">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td class="px-4 py-2">{{ $student->name }}</td>
                    <td class="px-4 py-2">{{ $student->email }}</td>
                    <td class="px-4 py-2">{{ $student->matric_no }}</td>
                    <td class="px-4 py-2">{{ $student->class }}</td>
                    <td class="px-4 py-2">{{ $student->gender }}</td>
                    <td class="px-4 py-2">{{ $student->admission_session }}</td>
                    <td class="px-4 py-2">
                        <!-- Update route edited to use student->id -->
                        <a href="{{ route('students.edit', $student->id) }}" class="text-blue-600">Edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
