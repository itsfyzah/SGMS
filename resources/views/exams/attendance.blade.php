@extends('layouts.app')

@section('content')
<h1>Mark Attendance: {{ $exam->name }}</h1>
<form method="POST" action="{{ route('exams.attendance.store', $exam->id) }}">
    @csrf
    <table>
        <tr>
            <th>Student</th>
            <th>Attended</th>
        </tr>
        @foreach($students as $student)
        <tr>
            <td>{{ $student->name }}</td>
            <td>
                <input type="checkbox" name="attendance[{{ $student->id }}]" value="1">
            </td>
        </tr>
        @endforeach
    </table>
    <button type="submit">Submit Attendance</button>
</form>
@endsection