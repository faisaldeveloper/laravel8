<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       echo 'asdfsafdsfs444';
       // return view('home');
    }

    public function index2()
    {
       echo 'asdfsafdsfs6677';
       // return view('home');
    }

    public function mytest(Request $request){
        //dd($_POST);

        //echo '-----sdfs---99999----fsdfsf------';    return '';
        $data = $request['name'];
        //$data = response()->json($data);

        return Inertia::render('Contactus', ['msg' => "It's done...you entered: ". $data]);
    }
}
