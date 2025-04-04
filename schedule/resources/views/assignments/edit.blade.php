<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Assignment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('assignments.update', $assignment->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block text-gray-400 font-semibold">Course</label>
                            <select name="course_id" class="w-full p-2 rounded-md bg-gray-800 text-white border border-gray-700 focus:ring-2 focus:ring-green-500 focus:outline-none">
                                <option value="">Select Course</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}" {{ $course->id == $assignment->course_id ? 'selected' : '' }}>{{ $course->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-400 font-semibold">Assignment Name</label>
                            <input type="text" name="nama" value="{{ old('nama', $assignment->nama) }}" required 
                                class="w-full p-2 rounded-md bg-gray-800 text-white border border-gray-700 focus:ring-2 focus:ring-green-500 focus:outline-none">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-400 font-semibold">Jenis</label>
                            <select name="jenis" required 
                                class="w-full p-2 rounded-md bg-gray-800 text-white border border-gray-700 focus:ring-2 focus:ring-green-500 focus:outline-none">
                                <option value="teori" {{ old('jenis', $assignment->jenis) == 'teori' ? 'selected' : '' }}>Teori</option>
                                <option value="praktikum" {{ old('jenis', $assignment->jenis) == 'praktikum' ? 'selected' : '' }}>Praktikum</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-400 font-semibold">Deadline</label>
                            <input type="datetime-local" name="deadline" value="{{ old('deadline', $assignment->deadline->format('Y-m-d\TH:i')) }}" required 
                                class="w-full p-2 rounded-md bg-gray-800 text-white border border-gray-700 focus:ring-2 focus:ring-green-500 focus:outline-none">
                        </div>

                        <div class="mt-6 flex justify-end">
                            <button type="submit" 
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300">
                                Update Assignment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
