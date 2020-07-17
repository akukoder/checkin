<?php

namespace App\Http\Controllers;

use App\Exports\AttendanceExport;
use App\Helpers\Str;
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

        $attendances = $this
            ->query($station, $start, $end, $keyword)
            ->paginate(setting('item-per-page', 20));

        return view('admin.attendances.index', compact('station', 'attendances', 'start', 'end', 'keyword'));
    }

    /**
     * @param Station $station
     * @return \Illuminate\Http\Response|\Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export(Station $station)
    {
        $keyword = request()->input('keyword', '');
        $start = request()->input('start', date('Y-m-d'));
        $end = request()->input('end', date('Y-m-d'));

        $filename = Str::slug($start.'-'.$end.(! empty($keyword) ? '-'.$keyword : ''));

        return (new AttendanceExport($this->query($station, $start, $end, $keyword)->get()))
            ->download($filename.'.xlsx');
    }

    /**
     * @param Station $station
     * @param $start
     * @param $end
     * @param null $keyword
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    private function query(Station $station, $start, $end, $keyword = null)
    {
        return $station->attendances()
            ->where( function ($query) use ($keyword) {
                if (! empty($keyword)) {
                    $query
                        ->where('name', 'like', '%'.$keyword.'%')
                        ->orWhere('name', 'like', '%'.strtolower($keyword).'%')
                        ->orWhere('name', 'like', '%'.strtoupper(strtolower($keyword)).'%')
                        ->orWhere('telephone', 'like', '%'.$keyword.'%');
                }
            })
            ->whereBetween('created_at', [Carbon::parse($start), Carbon::parse($end)->addDay()]);
    }
}
