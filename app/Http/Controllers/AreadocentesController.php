<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AreadocentesController extends Controller
{

    public function docente()
    {
    	return view('docente');
    }

     public function __construct()
     {
         $this->middleware('auth:docente');
     }

    
}
