<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Assignments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('assignments.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4">
                        Create New Assignment
                    </a>
                    
                    <table class="min-w-full table-auto">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-400">Course</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-400">Assignment Name</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-400">Jenis</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-400">Deadline</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-400">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assignments as $assignment)
                                <tr class="border-b border-gray-200 dark:border-gray-600">
                                    <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-100">{{ $assignment->course->nama }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-100">{{ $assignment->nama }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-100">{{ ucfirst($assignment->jenis) }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-100">
                                        {{ $assignment->deadline->format('d-m-Y H:i') }}
                                    </td>
                                    
                                    <td class="px-4 py-2 text-sm">
                                        <a href="{{ route('assignments.edit', $assignment->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a> |
                                        <form action="{{ route('assignments.destroy', $assignment->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
