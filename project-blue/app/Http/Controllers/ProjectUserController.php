<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectUserStoreRequest;
use App\Http\Requests\ProjectUserUpdateRequest;
use App\Models\ProjectUser;
use Blueprint\Models\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectUserController extends Controller
{
    public function index()
    {
        $projectUsers = ProjectUser::all();

        return view('projectUser.index', [
            'projectUsers' => $projectUsers,
        ]);
    }

    public function store(ProjectUserStoreRequest $request)
    {
        $projectUser = ProjectUser::create($request->validated());

        session()->flash('success', 'Registro creado exitosamente');

        return redirect()->route('projectUsers.index');
    }

    public function update(ProjectUserUpdateRequest $request, ProjectUser $projectUser)
    {
        $projectUser->update($request->validated());

        session()->flash('success', 'Registro actualizado exitosamente');

        return redirect()->route('projectUsers.index');
    }

    public function destroy(ProjectUser $projectUser)
    {
        $projectUser->delete();

        session()->flash('success', 'Registro eliminado exitosamente');

        return redirect()->route('projectUsers.index');
    }
}
