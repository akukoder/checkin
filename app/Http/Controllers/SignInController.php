<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Station;
use Illuminate\Support\Carbon;

class SignInController extends Controller
{
    /**
     * @param Station $station
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function form(Station $station)
    {
        return view('sign-in', compact('station'));
    }

    /**
     * @param Station $station
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Station $station)
    {
        $attendance = Attendance::where('name', request()->input('name'))
            ->where('telephone', request()->input('telephone'))
            ->first();

        if (! $attendance OR $attendance->created_at->diffInMinutes(Carbon::now()) > setting('sign-in-interval', 5)) {
            $attendance = $station->attendances()->create(request()->all());
        }

        return view('thanks', compact('attendance'));
    }
}
