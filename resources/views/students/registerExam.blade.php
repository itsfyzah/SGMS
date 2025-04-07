@extends('layouts.app')

@section('content')
    <h1>Register Exam for {{ $student->name }}</h1>
    <form action="{{ route('students.registerExam', $student->id) }}" method="POST">
        @csrf
        <!-- Form untuk mendaftar exam -->
        <label for="exam">Exam:</label>
        <input type="text" name="exam" id="exam" required>

        <button type="submit">Register Exam</button>
    </form>
@endsection
