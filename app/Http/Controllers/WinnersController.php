<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class WinnersController extends Controller
{

    public function index()
    {
        $winners = \App\Winners::all();
        return view('winners.index', compact('winners'));
     }
    
}
