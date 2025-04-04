<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    // Daftar kolom yang dapat diisi (Mass Assignment)
    protected $fillable = ['course_id', 'hari', 'waktu_mulai', 'waktu_selesai', 'tipe'];

    /**
     * Relasi ke model Course
     */
    public function course()
    {
        return $this->belongsTo(Course::class);  // Menunjukkan bahwa jadwal ini milik course tertentu
    }

    /**
     * Scope untuk mendapatkan jadwal berdasarkan tipe tertentu.
     */
    public function scopeTipe($query, $tipe)
    {
        return $query->where('tipe', $tipe);  // Membatasi hasil query berdasarkan tipe (misalnya teori atau praktikum)
    }

    /**
     * Mutator untuk waktu mulai.
     * Format waktu mulai jika ingin memiliki format khusus.
     */
    public function getWaktuMulaiAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('H:i');  // Mengembalikan waktu dalam format 24 jam
    }

    /**
     * Mutator untuk waktu selesai.
     */
    public function getWaktuSelesaiAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('H:i');  // Mengembalikan waktu dalam format 24 jam
    }
}
