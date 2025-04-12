<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;  // Tambah import untuk StudentController
use App\Http\Controllers\AttendanceController; // Tambah import untuk AttendanceController
use App\Http\Controllers\SubjectController;  // Tambah import untuk SubjectController
use App\Http\Controllers\ExamController;  // Tambah import untuk ExamController
use App\Http\Controllers\MarksController;  // Tambah import untuk MarksController

// Route untuk mengarahkan pengguna ke halaman login apabila aplikasi dimulakan
Route::get('/', function () {
    return redirect('/login'); // Redirect to login page on startup
});

// Route untuk login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Route untuk register
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Route untuk dashboard - hanya boleh diakses selepas login (menggunakan middleware 'auth')
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

// Route untuk pengurusan pelajar menggunakan resource controller
Route::resource('students', StudentController::class)->middleware('auth');

// Route untuk pengurusan kehadiran
Route::get('/attendances', [AttendanceController::class, 'index'])->middleware('auth')->name('attendances.index'); // Kemaskini route kehadiran
Route::post('/attendances/record', [AttendanceController::class, 'recordAttendance'])->middleware('auth')->name('attendances.record'); // Kemaskini route rekod kehadiran

// Route untuk pengurusan subjek
Route::get('/subjects', [SubjectController::class, 'index'])->middleware('auth')->name('subjects.index');  // Kemaskini route subjek
Route::get('/subjects/create', [SubjectController::class, 'create'])->middleware('auth')->name('subjects.create');  // Kemaskini route tambah subjek
Route::post('/subjects', [SubjectController::class, 'store'])->middleware('auth')->name('subjects.store');  // Kemaskini route simpan subjek
Route::get('/subjects/{id}/edit', [SubjectController::class, 'edit'])->middleware('auth')->name('subjects.edit');  // Kemaskini route edit subjek
Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');  // Pastikan route update pelajar
Route::delete('/subjects/{id}', [SubjectController::class, 'destroy'])->middleware('auth')->name('subjects.destroy');  // Kemaskini route padam subjek

// Route untuk pengurusan peperiksaan
Route::get('/exams', [ExamController::class, 'index'])->name('exams.index');
Route::get('/exams/create', [ExamController::class, 'createExam'])->name('exams.create');
Route::get('/exams/list', [ExamController::class, 'examList'])->name('exams.list');
Route::get('/exams/assign-subject', [ExamController::class, 'assignSubject'])->name('exams.assign_subject');
Route::get('/exams/assign-student', [ExamController::class, 'assignStudent'])->name('exams.assign_student');
Route::post('/exams', [ExamController::class, 'store'])->name('exams.store');


Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
Route::get('/attendance/mark', [AttendanceController::class, 'markAttendance'])->name('attendance.mark');
Route::get('/attendance/view', [AttendanceController::class, 'viewAttendance'])->name('attendance.view');

// Route untuk pengurusan markah
Route::get('/marks', [MarksController::class, 'index'])->middleware('auth')->name('marks.index'); // Kemaskini route senarai markah
Route::get('/marks/list', [MarksController::class, 'markList'])->middleware('auth')->name('marks.list'); // Kemaskini route senarai markah
Route::get('/marks/input', [MarksController::class, 'inputMark'])->middleware('auth')->name('marks.input'); // Kemaskini route input markah
Route::get('/marks/calculate', [MarksController::class, 'calculateGrades'])->middleware('auth')->name('marks.calculate'); // Kemaskini route kira gred
Route::get('/marks/status', [MarksController::class, 'setPassFailStatus'])->middleware('auth')->name('marks.status'); // Kemaskini route status pass/fail
Route::get('/marks/view', [MarksController::class, 'viewStudentScore'])->middleware('auth')->name('marks.view'); // Kemaskini route lihat markah pelajar

// Route untuk logout - menggunakan POST untuk logout dan redirect ke login
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Laluan untuk edit Matric No
Route::get('/students/{student}/edit-matric', [StudentController::class, 'editMatric'])->name('students.matric_no.edit');

// Laluan untuk edit Class
Route::get('/students/{student}/edit-class', [StudentController::class, 'editClass'])->name('students.class.edit');

// Laluan untuk edit Gender
Route::get('/students/{student}/edit-gender', [StudentController::class, 'editGender'])->name('students.gender.edit');

// Routes for Attendance
Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
Route::get('/attendance/student-list', [AttendanceController::class, 'studentList'])->name('attendance.student_list');
Route::get('/attendance/record', [AttendanceController::class, 'recordAttendance'])->name('attendance.record');
Route::get('/attendance/calculate', [AttendanceController::class, 'calculateAttendance'])->name('attendance.calculate');
Route::get('/attendance/status', [AttendanceController::class, 'viewAttendanceStatus'])->name('attendance.status');
Route::get('/attendance/show/{student_id}', [AttendanceController::class, 'show'])->name('attendance.show');
