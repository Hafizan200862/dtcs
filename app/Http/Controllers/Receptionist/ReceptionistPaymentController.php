<?php

namespace App\Http\Controllers\Receptionist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReceptionistPaymentController extends Controller
{
    //
    function index()
    {
        return view('dashboards.receptionists.payments.index');
    }
}
