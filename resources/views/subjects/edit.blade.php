@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Update Subject</h1>

    <form action="{{ route('subjects.update', $subject->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Subject Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $subject->name }}" required>
        </div>
        <div class="mb-3">
            <label for="code" class="form-label">Subject Code</label>
            <input type="text" class="form-control" id="code" name="code" value="{{ $subject->code }}" required>
        </div>
        <div class="mb-3">
            <label for="credit_hours" class="form-label">Credit Hours</label>
            <input type="number" class="form-control" id="credit_hours" name="credit_hours" value="{{ $subject->credit_hours }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
