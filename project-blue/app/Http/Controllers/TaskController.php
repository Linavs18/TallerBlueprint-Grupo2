<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\Task;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('task.index', [
            'tasks' => $tasks,
        ]);
    }

    public function create()
    {
        return view('task.create');
    }

    public function store(TaskStoreRequest $request)
    {
        $task = Task::create($request->validated());

        session()->flash('success', 'Registro creado exitosamente');

        return redirect()->route('tasks.index');
    }

    public function edit(Task $task)
    {
        return view('task.edit', [
            'task' => $task,
        ]);
    }

    public function update(TaskUpdateRequest $request, Task $task)
    {
        $task->update($request->validated());

        session()->flash('success', 'Registro actualizado exitosamente');

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        session()->flash('success', 'Registro eliminado exitosamente');

        return redirect()->route('tasks.index');
    }
}
