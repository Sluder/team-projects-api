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
     * Get current mode fan is in
     */
    public function getMode()
    {
        return [
            'mode' => config('team-projects.mode')
        ];
    }

    /**
     * Get current mode fan is in
     *
     * @param $mode: Automatic or standard
     */
    public function setMode($mode)
    {
        Config::set('team-projects.mode', $mode);
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
