<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectUserStoreRequest;
use App\Http\Requests\ProjectUserUpdateRequest;
use App\Models\ProjectUser;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectUserController extends Controller
{
    public function index(Request $request): Response
    {
        $projectUsers = ProjectUser::all();

        return view('projectUser.index', [
            'projectUsers' => $projectUsers,
        ]);
    }

    public function store(ProjectUserStoreRequest $request): Response
    {
        $projectUser = ProjectUser::create($request->validated());

        $request->session()->flash('projectUser.id', $projectUser->id);

        return redirect()->route('projectUsers.index');
    }

    public function update(ProjectUserUpdateRequest $request, ProjectUser $projectUser): Response
    {
        $projectUser->update($request->validated());

        $request->session()->flash('projectUser.id', $projectUser->id);

        return redirect()->route('projectUsers.index');
    }

    public function destroy(Request $request, ProjectUser $projectUser): Response
    {
        $projectUser->delete();

        return redirect()->route('projectUsers.index');
    }
}
