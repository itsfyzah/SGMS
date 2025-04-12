<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Attendance;  // Ensure Attendance model is included
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    // Halaman utama kehadiran
    public function index()
    {
        // Menyediakan paparan untuk senarai kehadiran
        return view('attendance.index');
    }

    // Senarai pelajar
    public function studentList()
    {
        // Ambil data pelajar dari database
        $students = Student::all();  // Mengambil semua data pelajar dari database
        return view('attendance.student_list', compact('students'));
    }

    // Rekod kehadiran
    public function recordAttendance()
    {
        // Ambil semua pelajar
        $students = Student::all(); // Ambil semua data pelajar dari database

        // Simpan rekod kehadiran baru berdasarkan input dari form (contoh)
        foreach ($students as $student) {
            // Contoh cara menyimpan kehadiran berdasarkan status
            Attendance::create([
                'student_id' => $student->id,   // Pastikan ada hubungan dengan student_id
                'status' => 'Present',  // Sebagai contoh, status hadir
            ]);
        }

        return redirect()->route('attendance.index')->with('success', 'Attendance recorded successfully!');
    }

    // Kira kehadiran
    public function calculateAttendance()
    {
        // Ambil semua pelajar dari database
        $students = Student::all();

        // Contoh logik untuk mengira kehadiran berdasarkan data kehadiran
        $attendanceStats = [];
        foreach ($students as $student) {
            // Kirakan peratusan kehadiran berdasarkan rekod dalam Attendance model
            $totalClasses = Attendance::where('student_id', $student->id)->count();
            $presentClasses = Attendance::where('student_id', $student->id)->where('status', 'Present')->count();
            $attendancePercentage = ($totalClasses > 0) ? ($presentClasses / $totalClasses) * 100 : 0;

            $attendanceStats[] = [
                'name' => $student->name,
                'attendance' => number_format($attendancePercentage, 2) . '%',
            ];
        }

        return view('attendance.calculate', compact('attendanceStats'));
    }

    // Status kehadiran pelajar
    public function viewAttendanceStatus()
    {
        // Ambil semua pelajar dari database
        $students = Student::all();
        
        // Menyediakan status kehadiran bagi setiap pelajar
        $attendanceStatuses = [];
        foreach ($students as $student) {
            // Periksa status kehadiran pelajar berdasarkan data dalam Attendance
            $attendanceStatus = Attendance::where('student_id', $student->id)->latest()->first();
            $status = $attendanceStatus ? $attendanceStatus->status : 'Absent';

            $attendanceStatuses[] = [
                'name' => $student->name,
                'status' => $status,
            ];
        }

        return view('attendance.status', compact('attendanceStatuses'));
    }

    // Menunjukkan maklumat kehadiran pelajar
    public function show($student_id)
    {
        // Cari pelajar berdasarkan student_id
        $student = Student::where('id', $student_id)->firstOrFail();

        // Ambil data kehadiran berdasarkan student_id
        $attendance = Attendance::where('student_id', $student_id)->get();

        // Kira jumlah kehadiran
        $presentCount = $attendance->where('status', 'present')->count();
        $absentCount = $attendance->where('status', 'absent')->count();
        $lateCount = $attendance->where('status', 'late')->count();
        $excusedCount = $attendance->where('status', 'excused')->count();

        // Hantar data pelajar dan jumlah kehadiran ke view
        return view('attendance.show', compact('student', 'attendance', 'presentCount', 'absentCount', 'lateCount', 'excusedCount'));
    }
}
