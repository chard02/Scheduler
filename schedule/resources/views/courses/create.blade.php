<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Course') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Form untuk menambah mata kuliah -->
                    <form method="POST" action="{{ route('courses.store') }}">
                        @csrf

                        <!-- Nama Mata Kuliah -->
                        <div class="mb-4">
                            <label for="nama" class="block text-gray-700 dark:text-gray-300">Nama Mata Kuliah</label>
                            <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required class="w-full mt-1 p-2 border border-gray-300 rounded-md">
                            @error('nama')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        <!-- SKS -->
                        <div class="mb-4">
                            <label for="sks" class="block text-gray-700 dark:text-gray-300">SKS</label>
                            <input type="number" id="sks" name="sks" value="{{ old('sks') }}" required class="w-full mt-1 p-2 border border-gray-300 rounded-md" min="1" max="6">
                            @error('sks')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        <!-- Semester -->
                        <div class="mb-4">
                            <label for="semester" class="block text-gray-700 dark:text-gray-300">Semester</label>
                            <input type="number" id="semester" name="semester" value="{{ old('semester') }}" required class="w-full mt-1 p-2 border border-gray-300 rounded-md" min="1" max="8">
                            @error('semester')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        <!-- Jadwal -->
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-300">Jadwal</label>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="flex items-center">
                                    <input type="checkbox" id="senin" name="jadwal[]" value="Senin" class="mr-2" {{ in_array('Senin', old('jadwal', [])) ? 'checked' : '' }}>
                                    <label for="senin" class="text-gray-700 dark:text-gray-300">Senin</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="selasa" name="jadwal[]" value="Selasa" class="mr-2" {{ in_array('Selasa', old('jadwal', [])) ? 'checked' : '' }}>
                                    <label for="selasa" class="text-gray-700 dark:text-gray-300">Selasa</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="rabu" name="jadwal[]" value="Rabu" class="mr-2" {{ in_array('Rabu', old('jadwal', [])) ? 'checked' : '' }}>
                                    <label for="rabu" class="text-gray-700 dark:text-gray-300">Rabu</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="kamis" name="jadwal[]" value="Kamis" class="mr-2" {{ in_array('Kamis', old('jadwal', [])) ? 'checked' : '' }}>
                                    <label for="kamis" class="text-gray-700 dark:text-gray-300">Kamis</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="jumat" name="jadwal[]" value="Jumat" class="mr-2" {{ in_array('Jumat', old('jadwal', [])) ? 'checked' : '' }}>
                                    <label for="jumat" class="text-gray-700 dark:text-gray-300">Jumat</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="sabtu" name="jadwal[]" value="Sabtu" class="mr-2" {{ in_array('Sabtu', old('jadwal', [])) ? 'checked' : '' }}>
                                    <label for="sabtu" class="text-gray-700 dark:text-gray-300">Sabtu</label>
                                </div>
                            </div>
                            @error('jadwal')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        <!-- Nilai UTS -->
                        <div class="mb-4">
                            <label for="nilai_uts" class="block text-gray-700 dark:text-gray-300">Nilai UTS</label>
                            <input type="number" id="nilai_uts" name="nilai_uts" value="{{ old('nilai_uts') }}" class="w-full mt-1 p-2 border border-gray-300 rounded-md" min="0" max="100" step="0.01">
                            @error('nilai_uts')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        <!-- Nilai UAS -->
                        <div class="mb-4">
                            <label for="nilai_uas" class="block text-gray-700 dark:text-gray-300">Nilai UAS</label>
                            <input type="number" id="nilai_uas" name="nilai_uas" value="{{ old('nilai_uas') }}" class="w-full mt-1 p-2 border border-gray-300 rounded-md" min="0" max="100" step="0.01">
                            @error('nilai_uas')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        <!-- Nilai Praktikum -->
                        <div class="mb-4">
                            <label for="nilai_praktikum" class="block text-gray-700 dark:text-gray-300">Nilai Praktikum</label>
                            <input type="number" id="nilai_praktikum" name="nilai_praktikum" value="{{ old('nilai_praktikum') }}" class="w-full mt-1 p-2 border border-gray-300 rounded-md" min="0" max="100" step="0.01">
                            @error('nilai_praktikum')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        <!-- Nilai Teori -->
                        <div class="mb-4">
                            <label for="nilai_teori" class="block text-gray-700 dark:text-gray-300">Nilai Teori</label>
                            <input type="number" id="nilai_teori" name="nilai_teori" value="{{ old('nilai_teori') }}" class="w-full mt-1 p-2 border border-gray-300 rounded-md" min="0" max="100" step="0.01">
                            @error('nilai_teori')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        <!-- Nilai Tambahan -->
                        <div class="mb-4">
                            <label for="nilai_tambahan" class="block text-gray-700 dark:text-gray-300">Nilai Tambahan</label>
                            <input type="number" id="nilai_tambahan" name="nilai_tambahan" value="{{ old('nilai_tambahan') }}" class="w-full mt-1 p-2 border border-gray-300 rounded-md">
                            @error('nilai_tambahan')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        <!-- Tombol Submit -->
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Create Course
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
