<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    // Pastikan nama jadual yang betul jika tidak mengikuti penamaan default
    protected $table = 'subjects';  // Ganti dengan nama jadual anda jika berbeza

    // Tentukan kolum-kolum yang boleh diisi (optional)
    protected $fillable = ['subject_name']; // Sesuaikan dengan kolum dalam jadual
}
