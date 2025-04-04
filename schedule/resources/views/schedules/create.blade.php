<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Schedule') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('schedules.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label class="block text-gray-400 font-semibold">Course</label>
                            <select name="course_id" class="w-full p-2 rounded-md bg-gray-800 text-white border border-gray-700 focus:ring-2 focus:ring-green-500 focus:outline-none">
                                <option value="">Select Course</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-400 font-semibold">Hari</label>
                            <input type="text" name="hari" value="{{ old('hari') }}" required
                                class="w-full p-2 rounded-md bg-gray-800 text-white border border-gray-700 focus:ring-2 focus:ring-green-500 focus:outline-none">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-400 font-semibold">Waktu Mulai</label>
                            <input type="time" name="waktu_mulai" value="{{ old('waktu_mulai') }}" required
                                class="w-full p-2 rounded-md bg-gray-800 text-white border border-gray-700 focus:ring-2 focus:ring-green-500 focus:outline-none">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-400 font-semibold">Waktu Selesai</label>
                            <input type="time" name="waktu_selesai" value="{{ old('waktu_selesai') }}" required
                                class="w-full p-2 rounded-md bg-gray-800 text-white border border-gray-700 focus:ring-2 focus:ring-green-500 focus:outline-none">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-400 font-semibold">Tipe</label>
                            <select name="tipe" required
                                class="w-full p-2 rounded-md bg-gray-800 text-white border border-gray-700 focus:ring-2 focus:ring-green-500 focus:outline-none">
                                <option value="teori" {{ old('tipe') == 'teori' ? 'selected' : '' }}>Teori</option>
                                <option value="praktikum" {{ old('tipe') == 'praktikum' ? 'selected' : '' }}>Praktikum</option>
                            </select>
                        </div>

                        <div class="mt-6 flex justify-end">
                            <button type="submit"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300">
                                Create Schedule
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
