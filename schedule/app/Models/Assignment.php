<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'course_id', 'deadline', 'jenis'];

    // Pastikan untuk menambahkan cast pada field deadline
    protected $casts = [
        'deadline' => 'datetime',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
 