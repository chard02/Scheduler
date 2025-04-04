<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Schedule') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('schedules.update', $schedule->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="course_id" class="block text-gray-400 font-semibold">Course</label>
                            <select name="course_id" id="course_id" class="w-full p-2 rounded-md bg-gray-800 text-white border border-gray-700 focus:ring-2 focus:ring-green-500 focus:outline-none">
                                <option value="">Select Course</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}" {{ $course->id == $schedule->course_id ? 'selected' : '' }}>{{ $course->nama }}</option>
                                @endforeach
                            </select>
                            @error('course_id')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="hari" class="block text-gray-400 font-semibold">Hari</label>
                            <input type="text" name="hari" id="hari" value="{{ old('hari', $schedule->hari) }}" required
                                class="w-full p-2 rounded-md bg-gray-800 text-white border border-gray-700 focus:ring-2 focus:ring-green-500 focus:outline-none">
                            @error('hari')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="waktu_mulai" class="block text-gray-400 font-semibold">Waktu Mulai</label>
                            <input type="time" name="waktu_mulai" id="waktu_mulai" value="{{ old('waktu_mulai', $schedule->waktu_mulai) }}" required
                                class="w-full p-2 rounded-md bg-gray-800 text-white border border-gray-700 focus:ring-2 focus:ring-green-500 focus:outline-none">
                            @error('waktu_mulai')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="waktu_selesai" class="block text-gray-400 font-semibold">Waktu Selesai</label>
                            <input type="time" name="waktu_selesai" id="waktu_selesai" value="{{ old('waktu_selesai', $schedule->waktu_selesai) }}" required
                                class="w-full p-2 rounded-md bg-gray-800 text-white border border-gray-700 focus:ring-2 focus:ring-green-500 focus:outline-none">
                            @error('waktu_selesai')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="tipe" class="block text-gray-400 font-semibold">Tipe</label>
                            <select name="tipe" id="tipe" required
                                class="w-full p-2 rounded-md bg-gray-800 text-white border border-gray-700 focus:ring-2 focus:ring-green-500 focus:outline-none">
                                <option value="teori" {{ old('tipe', $schedule->tipe) == 'teori' ? 'selected' : '' }}>Teori</option>
                                <option value="praktikum" {{ old('tipe', $schedule->tipe) == 'praktikum' ? 'selected' : '' }}>Praktikum</option>
                            </select>
                            @error('tipe')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-6 flex justify-end">
                            <button type="submit"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300">
                                Update Schedule
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
