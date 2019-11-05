<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;

class ApiController extends Controller
{
    /**
     * Get last recorded temp
     */
    public function getLastRecorded() {
        $temp = config('team-projects.last-recorded');

        return [
            'F' => number_format($temp, 2),
            'C' => number_format(($temp - 32) * (5/9), 2)
        ];
    }

    /**
     * Save a new last recorded temp
     *
     * @param $temp: Int in fahrenheit
     */
    public function setLastRecorded($temp) {
        Config::set('team-projects.last-recorded', $temp);
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
    public function setRanges()
    {

    }

    /**
     * Get current mode fan is in
     */
    public function getSwitch()
    {
        return [
            'switch' => config('team-projects.switch')
        ];
    }

    /**
     * Get current mode fan is in
     *
     * @param $switch_to: On or off
     */
    public function setSwitch($switch_to)
    {
        Config::set('team-projects.mode', $switch_to);
    }
}
