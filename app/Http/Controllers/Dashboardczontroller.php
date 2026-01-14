<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboardczontroller extends Controller
{
    function dashboard(){
        return view('dashboard');
    }
}
