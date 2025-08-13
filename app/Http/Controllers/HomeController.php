<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Murid;
use App\Models\WarningLetter;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $guruCount     = Guru::count();
        $muridCount    = Murid::count();
        $warningCount  = WarningLetter::count();

        return view('home', compact('guruCount', 'muridCount', 'warningCount'));
    }
}
