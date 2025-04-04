<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Assignment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('assignments.store') }}">
                        @csrf

                        <!-- Course Select -->
                        <div class="mb-4">
                            <label for="course_id" class="block text-gray-400 font-semibold">Course</label>
                            <select name="course_id" id="course_id" 
                                class="w-full p-2 rounded-md bg-gray-800 text-white border border-gray-700 focus:ring-2 focus:ring-green-500 focus:outline-none">
                                <option value="">Select Course</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}" 
                                        {{ old('course_id') == $course->id ? 'selected' : '' }}>
                                        {{ $course->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('course_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Assignment Name -->
                        <div class="mb-4">
                            <label for="nama" class="block text-gray-400 font-semibold">Assignment Name</label>
                            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required 
                                class="w-full p-2 rounded-md bg-gray-800 text-white border border-gray-700 focus:ring-2 focus:ring-green-500 focus:outline-none">
                            @error('nama')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Assignment Type -->
                        <div class="mb-4">
                            <label for="jenis" class="block text-gray-400 font-semibold">Jenis</label>
                            <select name="jenis" id="jenis" required 
                                class="w-full p-2 rounded-md bg-gray-800 text-white border border-gray-700 focus:ring-2 focus:ring-green-500 focus:outline-none">
                                <option value="teori" {{ old('jenis') == 'teori' ? 'selected' : '' }}>Teori</option>
                                <option value="praktikum" {{ old('jenis') == 'praktikum' ? 'selected' : '' }}>Praktikum</option>
                            </select>
                            @error('jenis')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Deadline -->
                        <div class="mb-4">
                            <label for="deadline" class="block text-gray-400 font-semibold">Deadline</label>
                            <input type="datetime-local" name="deadline" id="deadline" value="{{ old('deadline') }}" required 
                                class="w-full p-2 rounded-md bg-gray-800 text-white border border-gray-700 focus:ring-2 focus:ring-green-500 focus:outline-none">
                            @error('deadline')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-6 flex justify-end">
                            <button type="submit" 
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300">
                                Create Assignment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
