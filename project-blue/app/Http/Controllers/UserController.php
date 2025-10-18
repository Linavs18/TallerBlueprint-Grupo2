<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $users = User::all();
        return view('user.index', [
            'users' => $users,
        ]);
    }

    public function create()
    {
        return view('user.create');
    }

    public function edit(User $user)
    {
        return view('user.edit', [
            'user' => $user,
        ]);
    }

    public function store(UserStoreRequest $request)
    {
        $user = User::create($request->validated());

        session()->flash('success', 'Registro creado exitosamente');

        return redirect()->route('users.index');
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update($request->validated());

        session()->flash('success', 'Registro actualizado exitosamente');

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }
}
