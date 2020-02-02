<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ContributeController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    // public function __construct()
    // {
    //     $this->middleware('admin');
    // }

    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function index()
    {
        return view('contribute');
    }
}
