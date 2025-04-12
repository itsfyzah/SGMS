@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-semibold mb-6">Maklumat Pelajar: {{ $student->name }}</h1>

        <div class="mb-4">
            <strong>Email:</strong> {{ $student->email }}
        </div>

        <div class="mb-4">
            <strong>Matric No:</strong> {{ $student->matric_no }}
        </div>

        <div class="mb-4">
            <strong>Class:</strong> {{ $student->class }}
        </div>

        <div class="mb-4">
            <strong>Gender:</strong> {{ $student->gender }}
        </div>

        <div class="mb-4">
            <strong>Admission Session:</strong> {{ $student->admission_session }}
        </div>

        <h2 class="text-xl font-semibold mb-4">Kehadiran Pelajar</h2>

        <div class="mb-4">
            <strong>Jumlah Kehadiran:</strong> {{ $presentCount }} kali
        </div>

        <div class="mb-4">
            <strong>Jumlah Tidak Hadir:</strong> {{ $absentCount }} kali
        </div>

        <div class="mb-4">
            <strong>Jumlah Lewat:</strong> {{ $lateCount }} kali
        </div>

        <div class="mb-4">
            <strong>Jumlah Dikecualikan:</strong> {{ $excusedCount }} kali
        </div>

        <a href="{{ route('students.index') }}" class="text-blue-500 hover:text-blue-800">Kembali ke Senarai Pelajar</a>
    </div>
@endsection
