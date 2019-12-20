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
      return response()->json(['status'=>200,'message'=>'shitlink service here 💩']);
    }

}
