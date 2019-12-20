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
    /*
      Handle Shortened Urls
    */
    public function handleUrlSolve(Request $request, $shorturl = ""){

      /*
        TODO databasE?
        Load Static file..? 'cuz it seems like I'm to poor for a real database
      */
      $staticFile = base_path('resources').'/static-links.txt';
      if(!file_exists($staticFile)) $staticFile = base_path('resources').'/static-links.example.txt';

      // split that data
      $shortenedUrlsRaw = file_get_contents();
      $shortenedUrlsRaw = explode(PHP_EOL,$shortenedUrlsRaw);
      $shortenedUrls = [];
      foreach($shortenedUrlsRaw as $index => $url){
        $_parts = explode(',',$url);
        if(isset($_parts[0])
          && isset($_parts[1])
          && strpos(trim($_parts[1]),'http') === 0) $shortenedUrls[strtolower(trim($_parts[0]))] = trim($_parts[1]);
      }

      // Url found?
      if( isset($shortenedUrls[strtolower($shorturl)]) ){
        /*
          TODO some tracking/counting
        */
        return redirect()->to($shortenedUrls[strtolower($shorturl)]);
      } else {
        // TODO 404?
        return redirect()->to('/');
      }
    }

}
