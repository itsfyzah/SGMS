<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    // Pastikan nama jadual yang betul jika tidak mengikuti penamaan default
    protected $table = 'exams';  // Ganti dengan nama jadual anda jika berbeza

    // Tentukan kolum-kolum yang boleh diisi (optional)
    protected $fillable = ['subject_id', 'exam_date', 'total_marks']; // Sesuaikan mengikut keperluan
}
