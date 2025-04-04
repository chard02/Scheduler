<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Selamat Datang, ') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Waktu Saat Ini -->
                    <div class="mb-6">
                        <h3 class="text-lg font-medium">Waktu Sekarang:</h3>
                        <p class="text-xl">{{ now()->format('l, F j, Y H:i') }}</p>
                    </div>

                    <!-- Tugas Mendekati Deadline -->
                    <div class="mb-6">
                        <h3 class="text-lg font-medium">Tugas yang Mendekati Deadline</h3>
                        @if ($assignments->isEmpty())
                            <p class="text-sm text-gray-500">Tidak ada tugas yang mendekati deadline.</p>
                        @else
                            <ul>
                                @foreach ($assignments as $assignment)
                                    <li class="flex justify-between items-center mb-4">
                                        <span class="font-semibold">{{ $assignment->nama }}</span>
                                        <span class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($assignment->deadline)->diffForHumans() }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <!-- Jadwal dengan Semester Tertinggi -->
                    <div class="mb-6">
                        <h3 class="text-lg font-medium">Jadwal Semester Tertinggi</h3>
                        @if ($schedules->isEmpty())
                            <p class="text-sm text-gray-500">Tidak ada jadwal untuk semester tertinggi.</p>
                        @else
                            <ul>
                                @foreach ($schedules as $schedule)
                                    <li class="flex justify-between items-center mb-4">
                                        <span class="font-semibold">{{ $schedule->course->nama }} ({{ $schedule->course->semester }})</span>
                                        <span class="text-sm text-gray-500">
                                            {{ $schedule->hari }} - {{ $schedule->waktu_mulai }} s/d {{ $schedule->waktu_selesai }}
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
