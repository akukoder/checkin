<?php

namespace App\Exports;

use App\Attendance;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use PhpOffice\PhpSpreadsheet\Cell\StringValueBinder;

class AttendanceExport extends StringValueBinder implements FromView
{
    use Exportable;

    /**
     * @var
     */
    protected $attendances;

    public function __construct($attendances)
    {
        $this->attendances = $attendances;
    }

    public function view(): View
    {
        return view('admin.attendances.report', [
            'attendances' => $this->attendances
        ]);
    }
}
