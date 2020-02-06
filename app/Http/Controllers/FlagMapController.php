<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FlagMapController extends Controller
{
    /**
    * Show the flag listing in LeafletJS map.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\View\View
    */
    public function index(Request $request)
    {
        return view('flags.map');
    }
}
