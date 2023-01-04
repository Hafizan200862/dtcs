<?php

namespace App\Http\Controllers\Dentist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DentistController extends Controller
{
    // dentist index
    function index()
    {
        return view('dashboards.dentists.index');
    }
}

