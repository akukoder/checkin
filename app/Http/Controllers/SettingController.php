<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.settings.index');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update()
    {
        foreach (request()->except('_token') as $key => $value) {
            if (request()->hasFile($key)) {
                $path = request()->file($key)->store('public/site');

                setting([$key => $path]);
            }
            else {
                setting([$key => $value]);
            }
        }

        setting()->save();

        toast(__('Settings updated!'), 'success');

        return redirect()->back();
    }
}
