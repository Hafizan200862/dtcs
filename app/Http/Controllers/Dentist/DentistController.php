<?php

namespace App\Http\Controllers\Dentist;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DentistController extends Controller
{
    // dentist index
    function index()
    {
        $dentists = User::all();
        return view('dashboards.dentists.index',compact('dentists'));
    }
}

