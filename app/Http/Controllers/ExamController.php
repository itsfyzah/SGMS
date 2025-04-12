<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Subject;
use App\Models\Student;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {
        // Ambil semua peperiksaan dari database
        $exams = Exam::with('subject')->get();
        return view('exams.index', compact('exams'));
    }

    public function createExam()
    {
        $subjects = Subject::all(); // Ambil semua subjek dari database
        return view('exams.create', compact('subjects'));
    }

    public function examList()
    {
        $exams = Exam::with('subject')->get(); // Ambil semua peperiksaan
        return view('exams.list', compact('exams'));
    }

    public function assignSubject()
    {
        $subjects = Subject::all(); // Ambil semua subjek
        $exams = Exam::all(); // Ambil semua peperiksaan yang sudah dicipta
        return view('exams.assign_subject', compact('subjects', 'exams'));
    }

    public function assignStudent()
    {
        $students = Student::all(); // Ambil semua pelajar
        $exams = Exam::all(); // Ambil semua peperiksaan yang sudah dicipta
        return view('exams.assign_student', compact('students', 'exams'));
    }

    public function store(Request $request)
    {
    // Ambil data daripada form
    $exam = new Exam();
    $exam->exam_name = $request->exam_name;
    $exam->exam_date = $request->exam_date;
    $exam->subject_id = $request->subject_id;  // Pastikan nilai untuk subject_id disertakan
    $exam->save();

    return redirect()->route('exams.index');
    }

}