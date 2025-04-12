<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'matric_no',
        'class',
        'gender',
        'admission_session',
    ];

    // Hubungan dengan Mark (pelajar boleh mempunyai lebih daripada satu markah)
    public function marks()
    {
        return $this->hasMany(Mark::class); // Pastikan ada 'student_id' dalam jadual marks
    }
}
