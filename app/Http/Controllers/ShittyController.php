<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShittyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    //
    /*
      Handle Root
    */
    public function handleRoot(Request $request){
      // if we want to redirect root?!
      if(!empty(env('REDIRECT_ROOT'))){
        return redirect()->to(env('REDIRECT_ROOT'));
      }
      return view('home', []);
    }

}
