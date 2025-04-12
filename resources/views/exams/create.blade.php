@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Exam</h1>
        
        <!-- Form untuk Create Exam -->
        <form method="POST" action="{{ route('exams.store') }}">
            @csrf
            <!-- Form fields for exam creation -->
            <div class="mb-3">
                <label for="exam_name" class="form-label">Exam Name</label>
                <input type="text" name="exam_name" id="exam_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="exam_date" class="form-label">Exam Date</label>
                <input type="date" name="exam_date" id="exam_date" class="form-control" required>
            </div>

            <!-- Add more fields as needed -->

            <button type="submit" class="btn btn-primary">Create Exam</button>
        </form>
    </div>
@endsection
