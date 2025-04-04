<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Courses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('courses.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Add New Course
                    </a>

                    @php
                        // Mengelompokkan kursus berdasarkan semester
                        $groupedCourses = $courses->groupBy('semester')->sortKeysDesc();
                    @endphp

                    @foreach ($groupedCourses as $semester => $coursesInSemester)
                        <div class="mt-8">
                            <h3 class="text-2xl font-bold mb-4">Semester {{ $semester }}</h3>

                            <table class="min-w-full table-auto">
                                <thead class="bg-gray-100 dark:bg-gray-700">
                                    <tr>
                                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-400">#</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-400">Nama</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-400">SKS</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-400">Jadwal</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-400">Nilai UTS</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-400">Nilai UAS</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-400">Nilai Praktikum</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-400">Nilai Teori</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-400">Nilai Tambahan</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-400">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coursesInSemester as $course)
                                        <tr>
                                            <td class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-400">{{ $loop->iteration }}</td>
                                            <td class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-400">{{ $course->nama }}</td>
                                            <td class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-400">{{ $course->sks }}</td>
                                            <td class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-400">
                                                @if($course->jadwal)
                                                    @php
                                                        $jadwalArray = is_string($course->jadwal) ? json_decode($course->jadwal, true) : $course->jadwal;
                                                    @endphp
                                                    @foreach ($jadwalArray as $day)
                                                        <span class="block">{{ $day }}</span>
                                                    @endforeach
                                                @else
                                                    <span>-</span>
                                                @endif
                                            </td>
                                            <td class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-400">{{ $course->nilai_uts ?? '-' }}</td>
                                            <td class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-400">{{ $course->nilai_uas ?? '-' }}</td>
                                            <td class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-400">{{ $course->nilai_praktikum ?? '-' }}</td>
                                            <td class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-400">{{ $course->nilai_teori ?? '-' }}</td>
                                            <td class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-400">{{ $course->nilai_tambahan ?? '-' }}</td>
                                            <td class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-400">
                                                <a href="{{ route('courses.edit', $course) }}" class="text-yellow-500">Edit</a>
                                                <form action="{{ route('courses.destroy', $course) }}" method="POST" class="inline">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="text-red-500">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
