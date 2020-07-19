<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $today = Carbon::today();

        $stations = Station::count();
        $daily = Attendance::where('created_at', $today)->count();
        $monthly = Attendance::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->count();

        $date = $today->addDay();

        $data = [];
        $label = [];

        for ($x = 6; $x >= 0; $x--) {
            $data[] = Attendance::where('created_at', $today->subDay())->count();
            $label[] = $date->format('d/m/Y');
        }

        $data = array_reverse($data);
        $label = array_reverse($label);

        return view('home', compact('stations', 'daily', 'monthly', 'data', 'label'));
    }
}
