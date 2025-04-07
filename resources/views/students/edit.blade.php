@extends('layouts.app')

@section('content')
    <h1>Edit Student</h1>
    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $student->name }}" required>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ $student->email }}" required>
        
        <button type="submit">Update Student</button>
    </form>
@endsection
