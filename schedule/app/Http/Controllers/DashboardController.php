<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Course;
use App\Models\Schedule;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil tugas yang memiliki deadline dalam 7 hari ke depan
        $now = now();
        $sevenDaysFromNow = now()->addDays(7);

        $assignments = Assignment::where('deadline', '>=', $now)
                    ->where('deadline', '<=', $sevenDaysFromNow)
                    ->with('course')
                    ->orderBy('deadline', 'asc')
                    ->select('id', 'nama', 'course_id', 'deadline', 'jenis')
                    ->get();

        // Mendapatkan semester tertinggi
        $highestSemester = Course::max('semester');

        // Mengambil jadwal yang terkait dengan kursus dengan semester tertinggi
        $schedules = Schedule::whereHas('course', function ($query) use ($highestSemester) {
            $query->where('semester', $highestSemester);
        })->with('course') // Menyertakan data kursus
          ->get();

        // Mengirim data ke tampilan
        return view('dashboard', compact('assignments', 'schedules'));
    }
}
