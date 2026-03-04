<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Task Detail
            </h2>
            <a href="{{ route('tasks.index') }}" 
               class="bg-gray-400 text-white px-4 py-2 rounded-md hover:bg-gray-500">
                BACK
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Title --}}
                    <div class="mb-4">
                        <p class="text-sm font-medium text-gray-500">Title</p>
                        <p class="text-lg text-gray-800 mt-1">{{ $task->title }}</p>
                    </div>

                    <hr class="mb-4">

                    {{-- Description --}}
                    <div class="mb-4">
                        <p class="text-sm font-medium text-gray-500">Description</p>
                        <p class="text-lg text-gray-800 mt-1">
                            {{ $task->description ?? 'No description provided.' }}
                        </p>
                    </div>

                    <hr class="mb-4">

                    {{-- Status --}}
                    <div class="mb-4">
                        <p class="text-sm font-medium text-gray-500">Status</p>
                        <div class="mt-1">
                            @if ($task->status == 'pending')
                                <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm">
                                    Pending
                                </span>
                            @elseif ($task->status == 'in_progress')
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">
                                    In Progress
                                </span>
                            @else
                                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">
                                    Completed
                                </span>
                            @endif
                        </div>
                    </div>

                    <hr class="mb-4">

                    {{-- Timestamps --}}
                    <div class="mb-4">
                        <p class="text-sm font-medium text-gray-500">Created</p>
                        <p class="text-gray-800 mt-1">{{ $task->created_at->diffForHumans() }}</p>
                    </div>

                    <div class="mb-6">
                        <p class="text-sm font-medium text-gray-500">Last Updated</p>
                        <p class="text-gray-800 mt-1">{{ $task->updated_at->diffForHumans() }}</p>
                    </div>

                    <hr class="mb-4">

                    {{-- Action Buttons --}}
                    <div class="flex gap-2">
                        <a href="{{ route('tasks.edit', $task->id) }}" 
                           class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600">
                            EDIT
                        </a>
                        <form method="POST" action="{{ route('tasks.destroy', $task->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600"
                                    onclick="return confirm('Are you sure you want to delete this task?')">
                                DELETE
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>