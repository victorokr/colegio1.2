<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Responsable;

class AcudientesController extends Controller
{
    public function showLoginForm()
    {
        //return view('acudientes.login');
    }

   
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function guard()
    {
        return auth()->guard('acudiente');
    }

    protected $guard = 'acudiente';

    
    public function index()
    {
        //return view('acudiente');
    }


    public function authenticated()
    {

    	//return redirect('acudientesarea.index');
    }


     public function validator(Request $request)
    {
      $rules = [ 
               'email' =>  'email|required|string',
               'password' => 'required|string',
             ];
    }
    
    


    public function login(Request $request)
    {
        //$this->validator($request);

        //return $credentials;
        
        // if (Auth::guard('acudiente')->attempt($request->only('email','password'),$request->filled('remember'))) 
        // {   

        //     request()->session()->regenerate();

        //    return redirect()
        //    ->intended(url('/acudientes/area'))
        //    ->with('status','acudiente');
        // }

        // return back()
        // ->withErrors (['email' => trans('auth.failed')])
        // ->withInput (request(['email']));
    }
}
