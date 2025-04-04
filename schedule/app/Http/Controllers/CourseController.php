<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Pastikan hanya user yang login bisa mengakses controller ini.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Tampilkan daftar mata kuliah.
     */
    public function index()
    {
        $courses = Course::latest()->paginate(10);
        return view('courses.index', compact('courses'));
    }

    /**
     * Tampilkan form tambah mata kuliah.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Simpan mata kuliah baru.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'sks' => 'required|integer|min:1|max:6',
            'semester' => 'required|integer|min:1|max:8',
            'jadwal' => 'required|array', // Jadwal harus dikirim sebagai array
            'jadwal.*' => 'string|max:255', // Setiap elemen dalam jadwal harus string
            'nilai_uts' => 'nullable|numeric|min:0|max:100',
            'nilai_uas' => 'nullable|numeric|min:0|max:100',
            'nilai_praktikum' => 'nullable|numeric|min:0|max:100',
            'nilai_teori' => 'nullable|numeric|min:0|max:100',
            'nilai_tambahan' => 'nullable|numeric|min:0|max:100',
        ]);

        // Simpan data ke dalam database
        Course::create([
            'nama' => $validated['nama'],
            'sks' => $validated['sks'],
            'jadwal' => $validated['jadwal'], // Laravel akan otomatis menyimpan sebagai JSON
            'semester' => $validated['semester'],
            'nilai_uts' => $validated['nilai_uts'],
            'nilai_uas' => $validated['nilai_uas'],
            'nilai_praktikum' => $validated['nilai_praktikum'],
            'nilai_teori' => $validated['nilai_teori'],
            'nilai_tambahan' => $validated['nilai_tambahan'],
        ]);

        return redirect()->route('courses.index')->with('success', 'Mata kuliah berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail mata kuliah.
     */
    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    /**
     * Tampilkan form edit mata kuliah.
     */
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    /**
     * Update data mata kuliah.
     */
    public function update(Request $request, Course $course)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'sks' => 'required|integer|min:1|max:6',
            'semester' => 'required|integer|min:1|max:8',
            'jadwal' => 'required|array',
            'jadwal.*' => 'string|max:255',
            'nilai_uts' => 'nullable|numeric|min:0|max:100',
            'nilai_uas' => 'nullable|numeric|min:0|max:100',
            'nilai_praktikum' => 'nullable|numeric|min:0|max:100',
            'nilai_teori' => 'nullable|numeric|min:0|max:100',
            'nilai_tambahan' => 'nullable|numeric|min:0|max:100',
        ]);

        // Update data mata kuliah
        $course->update([
            'nama' => $validated['nama'],
            'sks' => $validated['sks'],
            'jadwal' => json_encode($validated['jadwal']),
            'semester' => $validated['semester'],
            'nilai_uts' => $validated['nilai_uts'],
            'nilai_uas' => $validated['nilai_uas'],
            'nilai_praktikum' => $validated['nilai_praktikum'],
            'nilai_teori' => $validated['nilai_teori'],
            'nilai_tambahan' => $validated['nilai_tambahan'],
        ]);

        return redirect()->route('courses.index')->with('success', 'Mata kuliah berhasil diperbarui.');
    }

    /**
     * Hapus mata kuliah.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Mata kuliah berhasil dihapus.');
    }
}
