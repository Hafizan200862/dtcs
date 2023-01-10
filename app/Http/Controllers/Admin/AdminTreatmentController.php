<?php

namespace App\Http\Controllers\Admin;

use App\Models\Patient;
use App\Models\Service;
use App\Models\Treatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    // public function session(Treatment $treatment)
    // {
    //     $dentists = User::all()->pluck('name', 'id');
    //     $patients = Patient::all()->pluck('name', 'id');
    //     $services = Service::all()->pluck('name', 'id');

    //     return view('admin.sessions.index', compact('treatment', 'dentists', 'patients', 'services'));
    // }

    //
    function index()
    {
        $data = array(
            'list'=> DB::table('treatments')->get()
        );
        return view('dashboards.admins.treatments.index', $data);
    }

    // register treatment form
    function addTreatmentForm()
    {
        return view('dashboards.admins.treatments.add');
    }

    // register treatment
    function addTreatment(Request $request)
    {
        // return $request->input();
        $request->validate([
            'name'=>'required',
            'price'=>'required'
        ]);

        $query = DB::table('treatments')->insert([
            'name'=>$request->input('name'),
            'price'=>$request->input('price')
        ]);

        if($query)
        {
            return back()->with('success', 'Data have been succesfully inserted');
        }
        else
        {
            return back()->with('error', 'Data cannot be inserted');
        }
    }
}
