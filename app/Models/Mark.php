<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id', // pastikan ini adalah lajur yang betul dalam jadual anda
        'marks',
        'subject',
    ];

    // Definisikan hubungan dengan model Student
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');  // Sesuaikan jika nama lajur adalah berbeza
    }
}
