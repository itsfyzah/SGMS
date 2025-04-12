<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Mark;  // Pastikan Model untuk markah
use Illuminate\Http\Request;

class MarksController extends Controller
{
    // Halaman utama markah
    public function index()
    {
        return view('marks.index');
    }

    // Senarai pelajar dan markah
    public function markList()
    {
    // Ambil semua pelajar bersama dengan markah mereka menggunakan hubungan yang betul
    $students = Student::with('marks')->get();  // Pastikan 'marks' telah didefinisikan dengan betul dalam model Student

    return view('marks.mark_list', compact('students'));
    }


    // Papar borang untuk input markah
    public function inputMark()
    {
        return view('marks.input_mark');
    }

    // Kira gred
    public function calculateGrades()
    {
        return view('marks.calculate_grades');
    }

    // Tetapkan status lulus/gagal
    public function setPassFailStatus()
    {
        return view('marks.set_pass_fail');
    }

    // Paparkan markah pelajar
    public function viewStudentScore()
    {
        return view('marks.view_student_score');
    }
}
