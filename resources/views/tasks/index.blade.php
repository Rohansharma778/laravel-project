    <x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tasks
            </h2>
                <a href="{{ route('tasks.create') }}" 
                 class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                    + ADD TASK
                </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="border-collapse table-auto w-full text-sm">
                        <thead>
                            <tr>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">#</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">Title</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">Description</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">Status</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">Created</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @forelse ($tasks as $task)
                            <tr>
                                <td class="border-b p-4 pl-8 text-slate-500">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="border-b p-4 pl-8 text-slate-500">
                                    {{ $task->title }}
                                </td>
                                <td class="border-b p-4 pl-8 text-slate-500">
                                    {{ $task->description ?? '-' }}
                                </td>
                                <td class="border-b p-4 pl-8 text-slate-500">
                                    @if ($task->status == 'pending')
                                        <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs">Pending</span>
                                    @elseif ($task->status == 'in_progress')
                                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs">In Progress</span>
                                    @else
                                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Completed</span>
                                    @endif
                                </td>
                                <td class="border-b p-4 pl-8 text-slate-500">
                                    {{ $task->created_at->diffForHumans() }}
                                </td>
                                <td class="border-b p-4 pl-8 text-slate-500">
                                    <a href="{{ route('tasks.show', $task->id) }}" 
                                       class="border border-blue-500 hover:bg-blue-500 hover:text-white mr-1 px-3 py-1 rounded-md text-xs">
                                       VIEW
                                    </a>
                                    <a href="{{ route('tasks.edit', $task->id) }}" 
                                       class="border border-yellow-500 hover:bg-yellow-500 hover:text-white mr-1 px-3 py-1 rounded-md text-xs">
                                       EDIT
                                    </a>
                                    <form method="post" action="{{ route('tasks.destroy', $task->id) }}" class="inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" 
                                                class="border border-red-500 hover:bg-red-500 hover:text-white mr-1 px-3 py-1 rounded-md text-xs"
                                                onclick="return confirm('Are you sure?')">
                                            DELETE
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="border-b p-4 pl-8 text-slate-500 text-center">
                                    No tasks found. Create one!
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{-- Pagination links --}}
                    <div class="mt-4">
                        {{ $tasks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>