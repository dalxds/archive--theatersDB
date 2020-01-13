<?php

namespace App\Http\Controllers;

use App\Repositories\Parastasi as ParastasiRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $prosexws = ParastasiRepository::getAllUpcoming();

        return view('home', compact('prosexws'));
    }
}
