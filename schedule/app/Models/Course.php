<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    // Tentukan kolom yang dapat diisi secara massal
    protected $fillable = [
        'nama', 
        'sks', 
        'jadwal', 
        'semester', 
        'nilai_uts', 
        'nilai_uas', 
        'nilai_praktikum', 
        'nilai_teori', 
        'nilai_tambahan'
    ];

    // Mengubah 'jadwal' secara otomatis menjadi array saat diambil dari database
    protected $casts = [
        'jadwal' => 'json', // Bisa pakai 'array' juga, tergantung preferensi
    ];

    /**
     * Relasi ke tabel assignments
     * Satu mata kuliah bisa memiliki banyak tugas
     */
    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    /**
     * Relasi ke tabel schedules
     * Satu mata kuliah bisa memiliki banyak jadwal
     */
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
