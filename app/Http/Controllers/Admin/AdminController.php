<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // admin index
    function index()
    {
        return view('dashboards.admins.index');
    }
}
