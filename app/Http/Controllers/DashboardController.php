<?php

namespace App\Http\Controllers;

use App\Models\Student;  // Pastikan model Student ada
use App\Models\Exam;     // Pastikan model Exam ada
use App\Models\Subject;  // Pastikan model Subject ada

class DashboardController extends Controller
{
    // Paparkan dashboard utama
    public function index()
    {
        // Dapatkan jumlah pelajar, peperiksaan, dan subjek
        $totalStudents = Student::count();    // Mengambil jumlah pelajar dari model Student
        $totalExams = Exam::count();          // Mengambil jumlah peperiksaan dari model Exam
        $totalSubjects = Subject::count();    // Mengambil jumlah subjek dari model Subject

        // Hantar data ke view
        return view('dashboard', compact('totalStudents', 'totalExams', 'totalSubjects'));
    }

    // Paparkan menu students
    public function students()
    {
        return view('students'); // Sediakan view 'students.blade.php'
    }

    // Paparkan menu attendances
    public function attendances()
    {
        return view('attendances'); // Sediakan view 'attendances.blade.php'
    }

    // Paparkan menu subjects
    public function subjects()
    {
        return view('subjects'); // Sediakan view 'subjects.blade.php'
    }

    // Paparkan menu exams
    public function exams()
    {
        return view('exams'); // Sediakan view 'exams.blade.php'
    }

    // Paparkan menu marks
    public function marks()
    {
        return view('marks'); // Sediakan view 'marks.blade.php'
    }
}
