<?php

namespace App\Http\Controllers\Admin;

use App\Models\Patient;
use App\Models\Service;
use App\Models\Treatment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;

class AdminTreatmentController extends Controller
{
    /**
     * Show the form for treatment session the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function session(Treatment $treatment)
    {
        $dentists = User::all()->pluck('name', 'id');
        $patients = Patient::all()->pluck('name', 'id');
        $services = Service::all()->pluck('name', 'id');

        return view('admin.sessions.index', compact('treatment', 'dentists', 'patients', 'services'));
    }
}
