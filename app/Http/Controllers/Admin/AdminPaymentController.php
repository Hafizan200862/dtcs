<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPaymentController extends Controller
{
    //
    function index()
    {
        return view('dashboards.admins.payments.index');
    }
}
