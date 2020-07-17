<?php

namespace App\Http\Controllers;

use App\Station;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    /**
     * @param Station $station
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Station $station)
    {
        $keyword = request()->input('keyword', '');

        $start = request()->input('start', date('Y-m-d'));
        $end = request()->input('end', date('Y-m-d'));

        $attendances = $station->attendances()
            ->where( function ($query) use ($keyword) {
                if (! empty($keyword)) {
                    $query
                        ->where('name', 'like', '%'.$keyword.'%')
                        ->orWhere('name', 'like', '%'.strtolower($keyword).'%')
                        ->orWhere('name', 'like', '%'.strtoupper(strtolower($keyword)).'%')
                        ->orWhere('telephone', 'like', '%'.$keyword.'%');
                }
            })
            ->whereBetween('created_at', [Carbon::parse($start), Carbon::parse($end)->addDay()])
            ->paginate(setting('item-per-page', 20));

        return view('admin.attendances.index', compact('station', 'attendances', 'start', 'end', 'keyword'));
    }
}
