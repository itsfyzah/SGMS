@extends('layouts.app')

@section('content')
    <h1>Students</h1>
    <a href="{{ route('students.create') }}" class="btn btn-primary">Add Student</a>

    <!-- Form Carian -->
    <form method="GET" action="{{ route('students.index') }}" class="mb-4">
        <input type="text" name="search" placeholder="Cari pelajar..." value="{{ request('search') }}" class="border p-2">
        <button type="submit" class="bg-blue-500 text-white p-2">Cari</button>
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
                        <a href="{{ route('students.edit', $student->student_id) }}" class="text-blue-600">Edit</a>
                        <form action="{{ route('students.destroy', $student->student_id) }}" method="POST" style="display:inline;">
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
