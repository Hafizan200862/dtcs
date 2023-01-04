<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DentistController extends Controller
{
    // index
    function index()
    {
        $data = array(
            'list'=> DB::table('users')
                        ->where('role', '0')
                        ->get() 
        );

        // $data = array(
        //     'list'=> DB::table('users')->get() 
        // );

        return view('dashboards.admins.dentists.index', $data);
    }

    // register dentist form
    function addDentistForm()
    {
        return view('dashboards.admins.dentists.add');
    }

    // register dentist
    function addDentist(Request $request)
        {
            $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'string', 'min:8', 'max:11'],
            ]);

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = 0;
            $user->password = Hash::make($request->password);
            $user->phone = $request->phone;
            $user->gender = $request->gender;

            // $user = DB::table('dentists')->insert([
            //     'name' => $request['name'],
            //     'email' => $request['email'],
            //     'role' => 0,
            //     'password' => Hash::make($request['password']),
            //     'phone' => $request['phone'],
            //     'gender' => $request['gender'],
            // ]);

            if ($user->save())
            {
                return redirect()->back()->with('success', 'Data have been succesfully inserted');
            }
            else
            {
                return redirect()->back()->with('error', 'Data cannot be inserted');
            }
        }
}
