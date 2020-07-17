<?php

namespace App\Http\Controllers;

use App\Http\Requests\StationStoreRequest;
use App\Station;
use CodeItNow\BarcodeBundle\Utils\QrCode;
use Illuminate\Support\Facades\Storage;

class StationController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $stations = Station::orderBy('ordering')->paginate(setting('item-per-page', 20));

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
            $input['logo'] = $request->file('logo')->store('public/logo');
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
            if ($station->logo !== 'site/laptop.png') {
                Storage::delete($station->logo);
            }

            $input['logo'] = $request->file('logo')->store('public/logo');
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
        $url = setting('site-url', config('app.url')).'/sign-in/'.$station->id;

        $bgColors = $this->parseColor(setting('qrcode-background-color', 'rgb(255, 255, 255)'));
        $fgColors = $this->parseColor(setting('qrcode-foreground-color', 'rgb(0, 0, 0)'));

        $qrCode = new QrCode;
        $qrCode
            ->setText($url)
            ->setSize(300)
            ->setPadding(10)
            ->setErrorCorrection('high')
            ->setForegroundColor($fgColors)
            ->setBackgroundColor($bgColors)
            ->setLabelFontSize(16)
            ->setImageType(QrCode::IMAGE_TYPE_PNG);

        if (setting('qrcode-show-label', true) == 1) {
            $qrCode->setLabel($station->name);
        }

        return 'data:'.$qrCode->getContentType().';base64,'.$qrCode->generate();
    }

    /**
     * @param $string
     * @return array
     */
    private function parseColor($string)
    {
        $cleaned = str_replace('rgba(', '', $string);
        $cleaned = str_replace('rgb(', '', $cleaned);
        $cleaned = str_replace(')', '', $cleaned);
        $cleaned = str_replace(' ', '', $cleaned);

        $colors = explode(',', $cleaned);

        $data = [
            'r' => (int) $colors[0],
            'g' => (int) $colors[1],
            'b' => (int) $colors[2],
            'a' => 1,
        ];

        if (strstr($string, 'rgba')) {
            $data['a'] = (float) $colors[3];
        }

        return $data;
    }
}
