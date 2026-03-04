<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($task) ? 'Edit Task' : 'Create Task' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" 
                          action="{{ isset($task) ? route('tasks.update', $task->id) : route('tasks.store') }}" 
                          class="mt-6 space-y-6">
                        @csrf
                        @isset($task)
                            @method('PUT')
                        @endisset

                        {{-- Title Field --}}
                        <div>
                            <x-input-label for="title" value="Title *" />
                            <x-text-input 
                                id="title" 
                                name="title" 
                                type="text" 
                                class="mt-1 block w-full" 
                                :value="old('title', $task->title ?? '')" 
                                required 
                                autofocus
                                placeholder="Enter task title"
                            />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        {{-- Description Field --}}
                        <div>
                            <x-input-label for="description" value="Description" />
                            <textarea 
                                id="description" 
                                name="description" 
                                rows="4"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200"
                                placeholder="Enter task description (optional)"
                            >{{ old('description', $task->description ?? '') }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>

                        {{-- Status Field --}}
                        <div>
                            <x-input-label for="status" value="Status *" />
                            <select 
                                id="status" 
                                name="status"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200"
                                required
                            >
                                <option value="">-- Select Status --</option>
                                <option value="pending" 
                                    {{ old('status', $task->status ?? '') == 'pending' ? 'selected' : '' }}>
                                    Pending
                                </option>
                                <option value="in_progress" 
                                    {{ old('status', $task->status ?? '') == 'in_progress' ? 'selected' : '' }}>
                                    In Progress
                                </option>
                                <option value="completed" 
                                    {{ old('status', $task->status ?? '') == 'completed' ? 'selected' : '' }}>
                                    Completed
                                </option>
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('status')" />
                        </div>

                        {{-- Buttons --}}
                        <div class="flex items-center gap-2">
                            <x-primary-button>
                                {{ isset($task) ? 'UPDATE TASK' : 'CREATE TASK' }}
                            </x-primary-button>
                            <x-secondary-button onclick="history.back()">
                                Cancel
                            </x-secondary-button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>