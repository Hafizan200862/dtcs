<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
        protected function rediretTo()
        {
            if(Auth()->user()->role == 2)
            {
                return route('admin.dashboard');
            }
            elseif(Auth()->user()->role == 1)
            {
                return route('receptionist.dashboard');
            }
            elseif(Auth()->user()->role == 0)
            {
                return route('dentist.dashboard');
            }
        }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //
    public function login(Request $request)
    {
        // return $request->input();
        // $input = $request->all();
        // $this->validate($request,
        // [
        //     'email'=>'required|email',
        //     'password'=>'required'
        // ]);

        // if(auth()->attempt(array('email'=>$input['email'],'password'=>$input['password'])))
        // {
        //     if(auth()->user()->role == 2)
        //     {
        //         return redirect()->route('admin.dashboard');
        //     }
        //     elseif(auth()->user()->role == 1)
        //     {
        //         return redirect()->route('receptionist.dashboard');
        //     }
        //     elseif(auth()->user()->role == 0)
        //     {
        //         return redirect()->route('dentist.dashboard');
        //     }
        //     else
        //     {
        //         // return redirect()->route('login')->with('error','Email and password are wrong');
        //         return back()->with('error', 'Your account do not in our database.');
        //     }
        // }
        
        $input = $request->all();
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $userInfo = User::where('email', '=', $request->email)->first();
        

        if(!$userInfo)
        {

            return back()->with('error', 'Your account do not in our database.');
        }
        else
        {
            //check password
            if(Hash::check($request->password, $userInfo->password))
            {
                if(auth()->attempt(array('email'=>$input['email'],'password'=>$input['password'])))
                {
                    if(auth()->user()->role == 2)
                    {
                        // $request->session()->put('role', $userInfo->role);
                        Session::put('role', 2);
                        // dd(Session::get('role'));
                        return redirect()->route('admin.dashboard');
                    }
                    elseif(auth()->user()->role == 1)
                    {
                        // $request->session()->put('role', $userInfo->role);
                        Session::put('role', 1);
                        return redirect()->route('receptionist.dashboard');
                    }
                    elseif(auth()->user()->role == 0)
                    {
                        // $request->session()->put('role', $userInfo->role);
                        Session::put('role', 0);
                        return redirect()->route('dentist.dashboard');
                    }
                }
                
            }
            else
            {
                return back()->with('error', 'Incorrect password');
            }
        }
    }
}
