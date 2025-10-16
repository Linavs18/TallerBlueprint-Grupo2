<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Models\Project;
use Blueprint\Models\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('project.index', [
            'projects' => $projects,
        ]);
    }

    public function create()
    {
        return view('project.create');
    }

    public function store(ProjectStoreRequest $request)
    {
        $project = Project::create($request->validated());

        session()->flash('success', 'Registro creado exitosamente');

        return redirect()->route('projects.index');
    }

    public function edit(Project $project)
    {
        return view('project.edit', [
            'project' => $project,
        ]);
    }

    public function update(ProjectUpdateRequest $request, Project $project)
    {
        $project->update($request->validated());

        session()->flash('success', 'Registro actualizado exitosamente');

        return redirect()->route('projects.index');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index');
    }
}