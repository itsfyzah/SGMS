@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Subjects Menu</h1>

    <!-- Butang Tambah Subjek -->
    <a href="{{ route('subjects.create') }}" class="btn btn-success mb-3">Add Subject</a>

    <!-- Table Senarai Subjek -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Subject Name</th>
                <th>Subject Code</th>
                <th>Credit Hour</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subjects as $subject)
            <tr>
                <td>{{ $subject->name }}</td>
                <td>{{ $subject->code }}</td>
                <td>{{ $subject->credit_hours }}</td>
                <td>
                    <!-- Butang Kemaskini -->
                    <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-warning btn-sm">Update</a>

                    <!-- Butang Padam -->
                    <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection




