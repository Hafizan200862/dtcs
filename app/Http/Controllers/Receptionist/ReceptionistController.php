<?php

namespace App\Http\Controllers\Receptionist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReceptionistController extends Controller
{
    //
    function index()
    {
        return view('dashboards.receptionists.index');
    }
}
