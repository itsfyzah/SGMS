<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    // Pastikan anda mendefinisikan kolum yang boleh diisi (mass assignable)
    protected $fillable = ['id', 'status', 'exam_id']; // Gantikan 'student_id' kepada 'id'

    // Hubungan dengan model Student (gunakan 'id' sebagai kunci utama)
    public function student()
    {
        return $this->belongsTo(Student::class, 'id');  // Gantikan 'student_id' kepada 'id'
    }

    // Hubungan dengan model Exam
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}
