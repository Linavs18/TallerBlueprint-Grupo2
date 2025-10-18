<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\Task;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('project')->get();

        return view('task.index', [
            'tasks' => $tasks,
        ]);
    }

    public function create()
    {
        $projects = \App\Models\Project::all();
        return view('task.create', [
            'projects' => $projects,
        ]);
    }

    public function store(TaskStoreRequest $request)
    {
        $task = Task::create($request->validated());

        session()->flash('success', 'Registro creado exitosamente');

        return redirect()->route('tasks.index');
    }

    public function edit(Task $task)
    {
        $projects = Project::all();
        return view('task.edit', [
            'task' => $task,
            'projects' => $projects,
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
