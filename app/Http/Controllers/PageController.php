<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    /**
     * Initial page for site
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('welcome');
    }
}
