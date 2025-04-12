@extends('layouts.app')

@section('content')
<style>
    .attendance-container {
        max-width: 900px;
        margin: 30px auto;
        padding: 20px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
        text-align: center;  /* Center the content */
    }

    .attendance-container h2 {
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

<div class="attendance-container">
    <h2>Attendance</h2>

    <!-- Button Section for Attendance -->
    <div class="button-grid">
        <!-- Student list -->
        <a href="{{ route('attendance.student_list') }}"><button class="button">Student List</button></a>
        <!-- Record Attendance -->
        <a href="{{ route('attendance.record') }}"><button class="button">Record Attendance</button></a>
    </div>

    <!-- Additional Buttons arranged below -->
    <div class="button-grid">
        <!-- Calculate Attendance % -->
        <a href="{{ route('attendance.calculate') }}"><button class="button">Calculate Attendance %</button></a>
        <!-- View Attendance Status -->
        <a href="{{ route('attendance.status') }}"><button class="button">View Attendance Status</button></a>
    </div>
@endsection

