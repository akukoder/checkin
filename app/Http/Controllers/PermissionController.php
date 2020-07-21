<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionStoreRequest;
use App\Permission;

class PermissionController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $permissions = Permission::orderBy('name')->paginate(setting('item-per-page', 20));

        return view('admin.permissions.index', compact('permissions'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.permissions.create');
    }

    /**
     * @param PermissionStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PermissionStoreRequest $request)
    {
        Permission::create($request->all());

        toast(__('Permission created!'), 'success');

        return redirect()->route('permission.index');
    }

    /**
     * @param Permission $permission
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', compact('permission'));
    }

    /**
     * @param PermissionStoreRequest $request
     * @param Permission $permission
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PermissionStoreRequest $request, Permission $permission)
    {
        $permission->update($request->all());

        toast(__('Permission updated!'), 'success');

        return redirect()->route('permission.index');
    }

    /**
     * @param Permission $permission
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Permission $permission)
    {
        if ($permission->users()->count()) {
            toast(__('Error deleting permission. Remove any users attached to this permission first.'), 'error');
        }
        elseif ($permission->roles()->count()) {
            toast(__('Error deleting permission. Remove any roles attached to this permission first.'), 'error');
        }
        else {
            $permission->delete();

            toast(__('Permission deleted!'), 'success');
        }

        return back();
    }
}
