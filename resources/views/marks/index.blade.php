@extends('layouts.app')

@section('content')
<style>
    .marks-container {
        max-width: 900px;
        margin: 30px auto;
        padding: 20px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
        text-align: center;  /* Center the content */
    }

    .marks-container h2 {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .button-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr); /* 2 buttons per row */
        gap: 12px;
        margin-bottom: 30px;
        justify-items: center; /* Center align buttons horizontally */
    }

    .button {
        padding: 15px;
        border-radius: 8px;
        background-color: #2563EB;
        color: white;
        border: none;
        cursor: pointer;
        font-size: 16px;
        transition: 0.3s ease;
        width: 200px;
    }

    .button:hover {
        background-color: #1e40af;
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

<div class="marks-container">
    <h2>Mark</h2>

    <!-- Button Section for Marks -->
    <div class="button-grid">
        <!-- Mark List -->
        <a href="{{ route('marks.list') }}"><button class="button">Mark List</button></a>
        <!-- Input Marks -->
        <a href="{{ route('marks.input') }}"><button class="button">Input Marks</button></a>
    </div>

    <!-- Additional Buttons arranged below -->
    <div class="button-grid">
        <!-- Calculate Grades -->
        <a href="{{ route('marks.calculate') }}"><button class="button">Calculate Grades</button></a>
        <!-- Set Pass/Fail Status -->
        <a href="{{ route('marks.status') }}"><button class="button">Set Pass/Fail Status</button></a>
    </div>

    <!-- View Student Score Section -->
    <div>
        <a href="{{ route('marks.view') }}"><button class="attendance-button">View Student Score</button></a>
    </div>
</div>

@endsection
