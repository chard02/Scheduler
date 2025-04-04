<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Course;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Pastikan hanya user yang login bisa mengakses controller ini.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Tampilkan daftar jadwal.
     */
    public function index()
    {
        $schedules = Schedule::with('course')->latest()->paginate(10);
        return view('schedules.index', compact('schedules'));
    }

    /**
     * Tampilkan form tambah jadwal.
     */
    public function create()
    {
        $courses = Course::all();
        return view('schedules.create', compact('courses'));
    }

    /**
     * Simpan jadwal baru.
     */
    public function store(Request $request)
    {
        // Validasi data yang masuk
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'hari' => 'required|string|max:50',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',  // Memastikan waktu selesai setelah waktu mulai
            'tipe' => 'required|string|in:teori,praktikum',  // Pastikan tipe hanya bisa 'teori' atau 'praktikum'
        ]);

        // Simpan jadwal
        Schedule::create($validated);

        return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail jadwal.
     */
    public function show(Schedule $schedule)
    {
        return view('schedules.show', compact('schedule'));
    }

    /**
     * Tampilkan form edit jadwal.
     */
    public function edit(Schedule $schedule)
    {
        $courses = Course::all();
        return view('schedules.edit', compact('schedule', 'courses'));
    }

    /**
     * Update data jadwal.
     */
    public function update(Request $request, Schedule $schedule)
    {
        // Validasi data yang masuk
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'hari' => 'required|string|max:50',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',  // Memastikan waktu selesai setelah waktu mulai
            'tipe' => 'required|string|in:teori,praktikum',  // Pastikan tipe hanya bisa 'teori' atau 'praktikum'
        ]);

        // Update jadwal
        $schedule->update($validated);

        return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    /**
     * Hapus jadwal.
     */
    public function destroy(Schedule $schedule)
    {
        // Hapus jadwal
        $schedule->delete();

        return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
