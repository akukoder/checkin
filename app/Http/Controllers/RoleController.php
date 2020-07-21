<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleStoreRequest;
use App\Role;

class RoleController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $roles = Role::orderBy('name')->paginate(setting('item-per-page', 20));

        return view('admin.roles.index', compact('roles'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * @param RoleStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RoleStoreRequest $request)
    {
        Role::create($request->all());

        toast(__('Role created!'), 'success');

        return redirect()->route('role.index');
    }

    /**
     * @param Role $role
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    /**
     * @param RoleStoreRequest $request
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(RoleStoreRequest $request, Role $role)
    {
        $role->update($request->all());

        toast(__('Role updated!'), 'success');

        return redirect()->route('role.index');
    }

    /**
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Role $role)
    {
        if ($role->users()->count()) {
            toast(__('Error deleting role. Remove any users attached to this role first.'), 'error');
        }
        else {
            $role->delete();

            toast(__('Role deleted!'), 'success');
        }

        return back();
    }
}
