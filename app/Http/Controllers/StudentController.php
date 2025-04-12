<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Menu Students - paparkan senarai pelajar
    public function index(Request $request)
    {
        $search = $request->input('search');  // Ambil nilai carian
        
        if ($search) {
            $students = Student::where('name', 'like', "%{$search}%")
                                ->orWhere('email', 'like', "%{$search}%")
                                ->orWhere('matric_no', 'like', "%{$search}%")
                                ->get();
        } else {
            // Jika tiada carian, ambil semua pelajar
            $students = Student::all();
        }

        return view('students.index', compact('students'));
    }

    // Form untuk menambah pelajar baru
    public function create()
    {
        return view('students.create');
    }

    // Simpan pelajar baru dalam pangkalan data
    public function store(Request $request)
    {
        // Validate data (optional tapi bagus ada)
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'matric_no' => 'required',
            'class' => 'required',
            'gender' => 'required',
            'admission_session' => 'required',
        ]);

        // Buat objek pelajar baru
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->matric_no = $request->matric_no;
        $student->class = $request->class;
        $student->gender = $request->gender;
        $student->admission_session = $request->admission_session;
        $student->created_by = now();  // Timestamp semasa untuk created_by
        $student->updated_by = now();  // Timestamp semasa untuk updated_by

        // Simpan data pelajar ke dalam pangkalan data
        $student->save(); // <-- penting ni!

        return redirect()->route('students.index')->with('success', 'Student added successfully!');
    }

    // Paparkan maklumat pelajar
    public function show($id) // Tukar student_id kepada id
    {
        $student = Student::where('id', $id)->firstOrFail(); // Tukar student_id kepada id
        return view('students.show', compact('student'));  // Pastikan 'admission_session' ada dalam 'student'
    }

    // Edit Matric No
    public function editMatric($id) // Tukar student_id kepada id
    {
        $student = Student::where('id', $id)->firstOrFail(); // Tukar student_id kepada id
        return view('students.edit-matric', compact('student'));
    }

    // Edit Class
    public function editClass($id) // Tukar student_id kepada id
    {
        $student = Student::where('id', $id)->firstOrFail(); // Tukar student_id kepada id
        return view('students.edit-class', compact('student'));
    }

    // Edit Gender
    public function editGender($id) // Tukar student_id kepada id
    {
        $student = Student::where('id', $id)->firstOrFail(); // Tukar student_id kepada id
        return view('students.edit-gender', compact('student'));
    }

    // Form untuk mengedit maklumat pelajar
    public function edit($id) // Tukar student_id kepada id
    {
        // Cari student berdasarkan id
        $student = Student::where('id', $id)->firstOrFail(); // Tukar student_id kepada id
        return view('students.edit', compact('student'));
    }

    // Kemaskini maklumat pelajar
    public function update(Request $request, $id) // Tukar student_id kepada id
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $id,  // Menggunakan id
            'matric_no' => 'required|string|max:20',
            'class' => 'required|string|max:50',
            'gender' => 'required|string|max:1',
            'admission_session' => 'required|string|max:4',
        ]);

        // Cari pelajar berdasarkan id
        $student = Student::where('id', $id)->firstOrFail(); // Tukar student_id kepada id

        // Kemaskini data pelajar
        $student->name = $request->name;
        $student->email = $request->email;
        $student->matric_no = $request->matric_no;
        $student->class = $request->class;
        $student->gender = $request->gender;
        $student->admission_session = $request->admission_session;
        $student->updated_by = now(); // Timestamp semasa untuk updated_by

        // Simpan perubahan
        $student->save();

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    // Hapus pelajar
    public function destroy($id) // Tukar student_id kepada id
    {
        // Cari student berdasarkan id
        $student = Student::where('id', $id)->firstOrFail(); // Tukar student_id kepada id
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
