<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Task;
use App\Http\Requests\Task\StoreRequest;
use App\Http\Requests\Task\UpdateRequest;

class TaskController extends Controller
{
    //show list of task
    public function index(): Response
    {
        return response()->view('tasks.index', [
            'tasks' => Task::orderBy('created_at', 'desc')->paginate(10),
        ]);
    }

    //display create form
    public function create(): Response
    {
        return response()->view('tasks.form');
    }

    //stores the created task
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $create = Task::create($validated);

        if($create) {
            session()->flash('notif.success', 'Task created successfully!');
            return redirect()->route('tasks.index');
        }

        return abort(500);
    }

    //display a specific required task
    public function show(string $id): Response
    {
        return response()->view('tasks.show', [
            'task' => Task::findOrFail($id),
        ]);
    }

    //display a form pre-filled form to edit
    public function edit(string $id): Response
    {
        return response()->view('tasks.form', [
            'task' => Task::findOrFail($id),
        ]);
    }

    //update the task with new edit data
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $task = Task::findOrFail($id);
        $validated = $request->validated();
        $update = $task->update($validated);

        if($update) {
            session()->flash('notif.success', 'Task updated successfully!');
            return redirect()->route('tasks.index');
        }

        return abort(500);
    }

    //delete the specified task 
    public function destroy(string $id): RedirectResponse
    {
        $task = Task::findOrFail($id);
        $delete = $task->delete();

        if($delete) {
            session()->flash('notif.success', 'Task deleted successfully!');
            return redirect()->route('tasks.index');
        }

        return abort(500);
    }
}