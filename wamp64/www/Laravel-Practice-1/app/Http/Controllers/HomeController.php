<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        return view('home', ['cssName' => 'home.css', 'title' => 'Home']);
    }

    public function about()
    {
        return view('common.about', ['cssName' => 'about.css', 'title' => 'About']);
    }
}
