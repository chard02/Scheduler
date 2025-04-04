<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Course') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('courses.update', $course) }}">
                        @csrf
                        @method('PUT')

                        <!-- Nama Mata Kuliah -->
                        <label class="block">Nama Mata Kuliah</label>
                        <input type="text" name="nama" value="{{ old('nama', $course->nama) }}" required class="w-full mb-4">

                        <!-- SKS -->
                        <label class="block">SKS</label>
                        <input type="number" name="sks" value="{{ old('sks', $course->sks) }}" required class="w-full mb-4">

                        <!-- Jadwal -->
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-300">Jadwal</label>
                            <div class="grid grid-cols-2 gap-4">
                                @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] as $day)
                                    <div class="flex items-center">
                                        <input type="checkbox" id="{{ strtolower($day) }}" name="jadwal[]" value="{{ $day }}"
                                               class="mr-2"
                                               {{ in_array($day, old('jadwal', is_array($course->jadwal) ? $course->jadwal : json_decode($course->jadwal, true) ?? []))                                               }}>
                                        <label for="{{ strtolower($day) }}" class="text-gray-700 dark:text-gray-300">{{ $day }}</label>
                                    </div>
                                @endforeach
                            </div>
                            @error('jadwal')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        <!-- Semester -->
                        <label class="block">Semester</label>
                        <input type="number" name="semester" value="{{ old('semester', $course->semester) }}" required class="w-full mb-4">

                        <!-- Nilai UTS -->
                        <label class="block">Nilai UTS</label>
                        <input type="number" step="0.01" name="nilai_uts" value="{{ old('nilai_uts', $course->nilai_uts) }}" class="w-full mb-4">

                        <!-- Nilai UAS -->
                        <label class="block">Nilai UAS</label>
                        <input type="number" step="0.01" name="nilai_uas" value="{{ old('nilai_uas', $course->nilai_uas) }}" class="w-full mb-4">

                        <!-- Nilai Praktikum -->
                        <label class="block">Nilai Praktikum</label>
                        <input type="number" step="0.01" name="nilai_praktikum" value="{{ old('nilai_praktikum', $course->nilai_praktikum) }}" class="w-full mb-4">

                        <!-- Nilai Teori -->
                        <label class="block">Nilai Teori</label>
                        <input type="number" step="0.01" name="nilai_teori" value="{{ old('nilai_teori', $course->nilai_teori) }}" class="w-full mb-4">

                        <!-- Nilai Tambahan -->
                        <label class="block">Nilai Tambahan</label>
                        <input type="number" step="0.01" name="nilai_tambahan" value="{{ old('nilai_tambahan', $course->nilai_tambahan) }}" class="w-full mb-4">

                        <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
