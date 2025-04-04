<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Course;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    /**
     * Tampilkan daftar tugas.
     */
    public function index()
    {
        $assignments = Assignment::with('course')->latest()->paginate(10);
        return view('assignments.index', compact('assignments'));
    }

    /**
     * Tampilkan form tambah tugas.
     */
    public function create()
    {
        $courses = Course::all();
        return view('assignments.create', compact('courses'));
    }

    /**
     * Simpan tugas baru.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'deadline' => 'required|date',
            'jenis' => 'required|string|in:teori,praktikum', // Menambahkan pilihan untuk jenis tugas
        ]);
        
        // Simpan data tugas menggunakan request->only()
        Assignment::create($request->only(['nama', 'course_id', 'deadline', 'jenis']));
        
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('assignments.index')->with('success', 'Tugas berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail tugas.
     */
    public function show(Assignment $assignment)
    {
        return view('assignments.show', compact('assignment'));
    }

    /**
     * Tampilkan form edit tugas.
     */
    public function edit(Assignment $assignment)
    {
        $courses = Course::all();
        return view('assignments.edit', compact('assignment', 'courses'));
    }

    /**
     * Update tugas yang ada.
     */
    public function update(Request $request, Assignment $assignment)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'deadline' => 'required|date',
            'jenis' => 'required|string|in:teori,praktikum', // Menambahkan pilihan untuk jenis tugas
        ]);

        // Update data tugas
        $assignment->update($request->only(['nama', 'course_id', 'deadline', 'jenis']));

        return redirect()->route('assignments.index')->with('success', 'Tugas berhasil diperbarui.');
    }

    /**
     * Hapus tugas.
     */
    public function destroy(Assignment $assignment)
    {
        $assignment->delete();

        return redirect()->route('assignments.index')->with('success', 'Tugas berhasil dihapus.');
    }
}
