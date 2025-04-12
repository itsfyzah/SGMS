@extends('layouts.app')

@section('content')
    {{-- Display success message if available --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-semibold mb-6">Edit Student</h1>

        <!-- Update Form -->
        <form action="{{ route('students.update', $student->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <!-- Name Field -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="{{ $student->name }}" class="mt-1 p-2 w-full border border-gray-300 rounded-md" required>
            </div>

            <!-- Email Field -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ $student->email }}" class="mt-1 p-2 w-full border border-gray-300 rounded-md" required>
            </div>

            <!-- Matric No Field -->
            <div>
                <label for="matric_no" class="block text-sm font-medium text-gray-700">Matric No</label>
                <input type="text" name="matric_no" id="matric_no" value="{{ $student->matric_no }}" class="mt-1 p-2 w-full border border-gray-300 rounded-md" required>
            </div>

            <!-- Class Field -->
            <div>
                <label for="class" class="block text-sm font-medium text-gray-700">Class</label>
                <input type="text" name="class" id="class" value="{{ $student->class }}" class="mt-1 p-2 w-full border border-gray-300 rounded-md" required>
            </div>

            <!-- Gender Field -->
            <div>
                <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                <select name="gender" id="gender" class="mt-1 p-2 w-full border border-gray-300 rounded-md" required>
                    <option value="M" {{ $student->gender == 'M' ? 'selected' : '' }}>Male</option>
                    <option value="F" {{ $student->gender == 'F' ? 'selected' : '' }}>Female</option>
                </select>
            </div>

            <!-- Admission Session Field -->
            <div>
                <label for="admission_session" class="block text-sm font-medium text-gray-700">Admission Session</label>
                <input type="text" name="admission_session" id="admission_session" value="{{ $student->admission_session }}" class="mt-1 p-2 w-full border border-gray-300 rounded-md" required>
            </div>

            <!-- Update Button -->
            <div class="mt-6">
                <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Update Student</button>
            </div>
        </form>
    </div>
@endsection
