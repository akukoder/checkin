<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::orderBy('name')->paginate(setting('item-per-page', 20));

        return view('admin.users.index', compact('users'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id');

        return view('admin.users.create', compact('roles'));
    }

    /**
     * @param UserStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserStoreRequest $request)
    {
        $input = $request->except('roles');

        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);

        $user->syncRoles($request->input('roles'));

        toast(__('User created!'), 'success');

        return redirect()->route('user.index');
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'id');

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * @param UserUpdateRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $input = $request->except('roles');

        if (! $request->has('password') OR empty($request->input('password'))) {
            unset($input['password']);
        }
        else {
            $input['password'] = bcrypt($input['password']);
        }

        $user->update($input);

        $user->syncRoles($request->input('roles'));

        toast(__('User updated!'), 'success');

        return redirect()->route('user.index');
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();

        toast(__('User deleted!'), 'success');

        return redirect()->back();
    }
}
