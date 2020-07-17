<?php

namespace App\Http\Controllers;

use App\Station;

class AttendanceController extends Controller
{
    /**
     * @param Station $station
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Station $station)
    {
        $attendances = $station->attendances()->paginate(15);

        return view('admin.attendances.index', compact('station', 'attendances'));
    }
}
