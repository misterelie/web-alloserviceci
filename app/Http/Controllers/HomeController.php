<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Assistance;
use App\Models\Prestation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $prestations = Prestation::latest()->limit(12)->get();
        //$prestations = Prestation::orderBy('created_at')->get();
        $prestations = Prestation::orderBy('created_at')->limit(12)->get();
        //$prestations = Prestation::all();
        $abouts = About::all();
        $assistances = Assistance::all();
        return view('frontweb.index', compact('prestations', 'abouts', 'assistances'));
    }

    public function vu_about()
    {
        $assistances = Assistance::all();
        $abouts = About::all();
        return view('frontweb.presentation', compact('abouts', 'assistances'));
    }

}