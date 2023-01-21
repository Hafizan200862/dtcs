<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminServiceController extends Controller
{
    //
    function index()
    {
        $data = array(
            'list'=> DB::table('services')->get()
        );
        return view('dashboards.admins.services.index', $data);
    }

    // register service form
    function add()
    {
        return view('dashboards.admins.services.add');
    }

    // register service
    function store(Request $request)
    {
        // return $request->input();
        $request->validate([
            'service_name'=>'required',
            'service_price'=>'required'
        ]);

        $query = DB::table('services')->insert([
            'service_name'=>$request->input('service_name'),
            'service_price'=>$request->input('service_price')
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
