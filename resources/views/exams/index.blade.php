@extends('layouts.app')

@section('content')
<style>
    .exam-container {
        max-width: 600px;
        margin: 30px auto;
        padding: 20px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
        text-align: center; /* Letakkan teks tengah */
    }

    .exam-container h2 {
        font-size: 22px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .button-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 12px;
        margin-bottom: 30px;
    }

    .button {
        padding: 12px;
        border-radius: 8px;
        background-color: #2563EB;
        color: white;
        border: none;
        cursor: pointer;
        font-size: 16px;
        transition: 0.3s ease;
    }

    .button:hover {
        background-color: #1e40af;
    }

    .section {
        margin-bottom: 30px;
    }

    .input-time {
        padding: 10px;
        width: 47%;
        margin-right: 10px;
        border-radius: 6px;
        border: 1px solid #ccc;
    }

    .attendance-button {
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        background-color: #2563EB;
        color: white;
        border: none;
        font-size: 16px;
    }

    label {
        font-weight: 600;
    }
</style>

<div class="exam-container">
    <h2>Exam</h2>
    
    <div class="button-grid">
        <a href="{{ route('exams.create') }}"><button class="button">Create Exam</button></a>
        <a href="{{ route('exams.list') }}"><button class="button">Exam List</button></a>
        <a href="{{ route('exams.assign_subject') }}"><button class="button">Assign Subject</button></a>
        <a href="{{ route('exams.assign_student') }}"><button class="button">Assign Student</button></a>
    </div>
</div>
@endsection


