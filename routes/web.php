<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;  // Tambah import untuk StudentController

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

// Route untuk pengurusan pelajar
Route::prefix('students')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('students.index');  // Menu Students
    Route::get('/create', [StudentController::class, 'create'])->name('students.create');  // Add Students
    Route::post('/store', [StudentController::class, 'store'])->name('students.store');  // Store Students
    Route::get('/{student_id}', [StudentController::class, 'show'])->name('students.show'); // View student
    Route::get('/{student_id}/edit', [StudentController::class, 'edit'])->name('students.edit'); // Edit student
    Route::delete('/{student_id}', [StudentController::class, 'destroy'])->name('students.destroy'); // Delete student
    Route::put('/{student_id}', [StudentController::class, 'update'])->name('students.update');  // Update Student Info
    Route::get('/{student_id}/register-exam', [StudentController::class, 'registerExam'])->name('students.registerExam');  // Register Exam
})->middleware('auth');  // Pastikan hanya pengguna yang login dapat mengakses

// Route untuk pengurusan kehadiran
Route::get('/attendances', [DashboardController::class, 'attendances'])->middleware('auth');

// Route untuk pengurusan subjek
Route::get('/subjects', [DashboardController::class, 'subjects'])->middleware('auth');

// Route untuk pengurusan peperiksaan
Route::get('/exams', [DashboardController::class, 'exams'])->middleware('auth');

// Route untuk pengurusan markah
Route::get('/marks', [DashboardController::class, 'marks'])->middleware('auth');

// Route untuk logout - menggunakan POST untuk logout dan redirect ke login
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Laluan untuk edit Matric No
Route::get('/students/{student_id}/edit-matric', [StudentController::class, 'editMatric'])->name('students.matric_no.edit');

// Laluan untuk edit Class
Route::get('/students/{student_id}/edit-class', [StudentController::class, 'editClass'])->name('students.class.edit');

// Laluan untuk edit Gender
Route::get('/students/{student_id}/edit-gender', [StudentController::class, 'editGender'])->name('students.gender.edit');

