<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Schedules') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('schedules.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4">
                        Create New Schedule
                    </a>
                    
                    <table class="min-w-full table-auto">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-400">Course</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-400">Hari</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-400">Waktu Mulai</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-400">Waktu Selesai</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-400">Tipe</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-400">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schedules as $schedule)
                                <tr class="border-b border-gray-200 dark:border-gray-600">
                                    <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-100">{{ $schedule->course->nama }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-100">{{ $schedule->hari }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-100">{{ \Carbon\Carbon::parse($schedule->waktu_mulai)->format('H:i') }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-100">{{ \Carbon\Carbon::parse($schedule->waktu_selesai)->format('H:i') }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-100">{{ ucfirst($schedule->tipe) }}</td>
                                    <td class="px-4 py-2 text-sm">
                                        <a href="{{ route('schedules.edit', $schedule->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a> |
                                        <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $schedules->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
