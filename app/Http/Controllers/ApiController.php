<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class ApiController extends Controller
{
    /**
     * Get last recorded temp
     */
    public function getLastRecorded() {
        $json = json_decode(file_get_contents(public_path() . '/config.json'), true);

        return [
            'F' => number_format($json['last-recorded'], 2),
            'C' => number_format(($json['last-recorded'] - 32) * (5/9), 2)
        ];
    }

    /**
     * Save a new last recorded temp
     *
     * @param $temp: Int in fahrenheit
     */
    public function setLastRecorded($temp) {
        $json = json_decode(file_get_contents(public_path() . '/config.json'), true);
        $json['last-recorded'] = $temp;

        file_put_contents(public_path() . '/config.json', json_encode($json));
    }

    /**
     * Get current set temperature ranges
     */
    public function getRanges()
    {
        $ranges = config('team-projects.ranges');

        return [
            'low' => [
                'from' => explode('-', $ranges[0])[0],
                'to' => explode('-', $ranges[0])[1]
            ],
            'medium' => [
                'from' => explode('-', $ranges[1])[0],
                'to' => explode('-', $ranges[1])[1]
            ],
            'high' => [
                'from' => explode('-', $ranges[2])[0],
                'to' => explode('-', $ranges[2])[1]
            ]
        ];
    }

    /**
     * Set temperature ranges
     */
    public function setRanges(Request $request)
    {
        $json = json_decode(file_get_contents(public_path() . '/config.json'), true);
        $json['ranges']["0"] = $request['low'];
        $json['ranges']["1"] = $request['medium'];
        $json['ranges']["2"] = $request['high'];

        file_put_contents(public_path() . '/config.json', json_encode($json));
    }

    /**
     * Get current mode fan is in
     */
    public function getSwitch()
    {
        $json = json_decode(file_get_contents(public_path() . '/config.json'), true);
        return [
            'switch' => $json['switch']
        ];
    }

    /**
     * Get current mode fan is in
     *
     * @param $switch_to: On or off
     */
    public function setSwitch($switch_to)
    {
        $json = json_decode(file_get_contents(public_path() . '/config.json'), true);
        $json['switch'] = $switch_to;

        file_put_contents(public_path() . '/config.json', json_encode($json));
    }
}
