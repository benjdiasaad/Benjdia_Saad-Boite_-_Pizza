<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

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
        return view('home');
    }

    function gen(){
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1> {{ Auth::user()->adresse }}</h1>');
        return $pdf->stream();
    }

    
}
