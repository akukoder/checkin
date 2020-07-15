<?php

namespace App\Http\Controllers;

use App\Http\Requests\StationStoreRequest;
use App\Station;
use Illuminate\Http\Request;

class StationController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $stations = Station::where('published', true)->orderBy('ordering')->get();

        return view('stations.index', compact('stations'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('stations.create');
    }

    /**
     * @param StationStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StationStoreRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('logo')) {
            $filename = '';

            $input['logo'] = $request->file('logo')->storeAs('logo', $filename);
        }
        else {
            unset($input['logo']);
        }

        flash()->success(__('Station created!'));

        Station::create($input);

        return redirect()->route('station.index');
    }
}
