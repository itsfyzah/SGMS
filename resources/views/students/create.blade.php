@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="max-w-lg w-full bg-gray-50 p-6 rounded-lg shadow-xl">
            <h1 class="text-3xl font-semibold text-center text-gray-800 mb-6">Add Student</h1>
            <form action="{{ route('students.store') }}" method="POST">
                @csrf

                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-gray-700 font-semibold">Name:</label>
                    <input type="text" name="name" id="name" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-gray-700 font-semibold">Email:</label>
                    <input type="email" name="email" id="email" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <!-- Matric No Field -->
                <div>
                    <label for="matric_no" class="block text-gray-700 font-semibold">Matric No:</label>
                    <input type="text" name="matric_no" id="matric_no" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <!-- Class Field -->
                <div>
                    <label for="class" class="block text-gray-700 font-semibold">Class:</label>
                    <input type="text" name="class" id="class" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <!-- Gender Field -->
                <div>
                    <label for="gender" class="block text-gray-700 font-semibold">Gender:</label>
                    <select name="gender" id="gender" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                </div>

                <!-- Admission Session Field -->
                <div>
                    <label for="admission_session" class="block text-gray-700 font-semibold">Admission Session:</label>
                    <input type="text" name="admission_session" id="admission_session" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <small class="text-gray-500">E.g., 2025/2026 or January 2025</small>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center mt-6">
                    <button type="submit" class="bg-blue-600 text-white py-3 px-6 rounded-lg hover:bg-blue-700 transition duration-300">Add Student</button>
                </div>
            </form>
        </div>
    </div>
@endsection
