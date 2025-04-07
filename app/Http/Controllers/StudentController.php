<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Menu Students - paparkan senarai pelajar
    public function index()
    {
        $students = Student::all(); // Mengambil semua data pelajar
        return view('students.index', compact('students')); // Menghantar data ke view
    }

    // Form untuk menambah pelajar baru
    public function create()
    {
        return view('students.create');
    }

    // Simpan pelajar baru dalam pangkalan data
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'matric_no' => 'required|string|max:20',
            'class' => 'required|string|max:50',
            'gender' => 'required|string|max:1',
            'admission_session' => 'required|string|max:4', // Validasi sesi kemasukan
        ]);

        // Menyimpan data pelajar
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->matric_no = $request->matric_no;
        $student->class = $request->class;
        $student->gender = $request->gender;
        $student->admission_session = $request->admission_session; // Menyimpan sesi kemasukan
        $student->created_by = auth()->id(); // Menetapkan ID pengguna yang log masuk secara automatik
        $student->updated_by = auth()->id(); // Menetapkan ID pengguna yang log masuk secara automatik
        $student->save();

        // Mesej kejayaan
        session()->flash('success', 'Student added successfully!');

        return redirect()->route('students.index');
    }

    // Paparkan maklumat pelajar
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));  // Pastikan 'admission_session' ada dalam 'student'
    }

    // Edit Matric No
    public function editMatric($student_id)
    {
        $student = Student::where('student_id', $student_id)->firstOrFail();
        return view('students.edit-matric', compact('student'));
    }

    // Edit Class
    public function editClass($student_id)
    {
        $student = Student::where('student_id', $student_id)->firstOrFail();
        return view('students.edit-class', compact('student'));
    }

    // Edit Gender
    public function editGender($student_id)
    {
        $student = Student::where('student_id', $student_id)->firstOrFail();
        return view('students.edit-gender', compact('student'));
    }

    // Form untuk mengedit maklumat pelajar
    public function edit($student_id)
    {
        // Cari student berdasarkan student_id
        $student = Student::where('student_id', $student_id)->firstOrFail();
        return view('students.edit', compact('student'));
    }

    // Kemaskini maklumat pelajar
    public function update(Request $request, Student $student)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'matric_no' => 'required|string|max:20',
            'class' => 'required|string|max:50',
            'gender' => 'required|string|max:1',
            'admission_session' => 'required|string|max:4',
        ]);

        // Kemaskini data pelajar
        $student->name = $request->name;
        $student->email = $request->email;
        $student->matric_no = $request->matric_no;
        $student->class = $request->class;
        $student->gender = $request->gender;
        $student->admission_session = $request->admission_session; // Kemas kini sesi kemasukan
        $student->updated_by = auth()->id(); // Menetapkan ID pengguna yang log masuk untuk kemaskini
        $student->save();

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    // Hapus pelajar
    public function destroy($student_id)
    {
        // Cari student berdasarkan student_id
        $student = Student::where('student_id', $student_id)->firstOrFail();
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }

    // Daftar exam untuk pelajar
    public function registerExam(Student $student)
    {
        // Logik untuk mendaftar exam
        return view('students.registerExam', compact('student'));
    }
}
