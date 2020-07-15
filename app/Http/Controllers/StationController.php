<?php

namespace App\Http\Controllers;

use App\Http\Requests\StationStoreRequest;
use App\Station;
use CodeItNow\BarcodeBundle\Utils\QrCode;

class StationController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $stations = Station::orderBy('ordering')->get();

        return view('admin.stations.index', compact('stations'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.stations.create');
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

        $station = Station::create($input);

        $station->qr_code = $this->generateQrCode($station);
        $station->save();

        toast(__('Station created!'), 'success');

        return redirect()->route('station.index');
    }

    /**
     * @param Station $station
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Station $station)
    {
        return view('admin.stations.edit', compact('station'));
    }

    /**
     * @param StationStoreRequest $request
     * @param Station $station
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StationStoreRequest $request, Station $station)
    {
        $input = $request->all();

        if ($request->hasFile('logo')) {
            $filename = '';

            $input['logo'] = $request->file('logo')->storeAs('logo', $filename);
        }
        else {
            $input['logo'] = $station->logo;
        }

        $station->update($input);

        toast(__('Station updated!'), 'success');

        return redirect()->route('station.index');
    }

    /**
     * @param Station $station
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Station $station)
    {
        $station->delete();

        toast(__('Station deleted!'), 'success');

        return redirect()->back();
    }

    /**
     * @param Station $station
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function generate(Station $station)
    {
        $station->qr_code = $this->generateQrCode($station);
        $station->save();

        toast(__('QR Code generated!'), 'success');

        return redirect()->back();
    }

    /**
     * @param Station $station
     * @return string
     * @throws \Exception
     */
    protected function generateQrCode(Station $station)
    {
        $url = config('app.url').'/station/'.$station->id;

        $qrCode = new QrCode;
        $qrCode
            ->setText($url)
            ->setSize(300)
            ->setPadding(10)
            ->setErrorCorrection('high')
            ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
            ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
            ->setLabel($station->name)
            ->setLabelFontSize(16)
            ->setImageType(QrCode::IMAGE_TYPE_PNG);

        return 'data:'.$qrCode->getContentType().';base64,'.$qrCode->generate();
    }
}
