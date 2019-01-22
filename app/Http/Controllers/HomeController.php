<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\RecentlyViewed;
use App\User;
use App\Lead;

use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		//recently viewed
		$views = RecentlyViewed::all()->toArray();
		
		
		//get the user account login 
		$fName =  Auth::user()->first_name;
		$lName = Auth::user()->last_name;
		$owner = $fName." ".$lName; 

		$ownerName = $owner;
		
		//count the clients owner data
		$clients = DB::table('clients')->where('owner', $ownerName)->get()->count();
        
		//count the leads owner data
		$leads = DB::table('leads')->where('owner', $ownerName)->get()->count();
		
		//count the cases owner data
		$cases = DB::table('opps')->where('owner', $ownerName)->get()->count();
		
		//count tasks owner data
		$tasks = DB::table('tasks')->where('assigned_to', $ownerName)->get()->count();
		
		return view('home', compact('views', 'clients', 'leads', 'cases', 'tasks'));
    }
}
