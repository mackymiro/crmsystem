<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lead; 
use App\Client;

use App\User;
use App\Note;
use Session; 

use Auth;
class LeadController extends Controller
{
	public function storeNotes(Request $request, $id){
		date_default_timezone_set('Europe/London');
		
		//get the date and time UK
		$date = date('l jS \of F Y h:i:s A');
		
		
		$fName =  Auth::user()->first_name;
		$lName = Auth::user()->last_name;
		
		$postedBy = $fName." ".$lName; 
		
		//request a file
		$file = $request->file('files');
		
		$fileName = $request->file('files')->getClientOriginalName();
				
		$fileSaveAsName = $fileName;
		
		echo $fileSaveAsName; exit;
		
		if($file == ""){
			
		}
	}
	
	public function addNewNotes($id){	
		$lead = Lead::find($id);
		
		return view('addnewnoteslead', compact('id'));
	}

	//lead detail profile
	public function leadDetails($id){
		$lead = Lead::find($id);
		
		return view('leaddetails', compact('lead'));
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$leads = Lead::all()->toArray();
		
		return view('lead', compact('leads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		$referralPersons = Client::all()->toArray();
		
		$users = User::all()->toArray();
		
			
		return view('createlead', compact('referralPersons', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate fields
		$this->validate($request, [
			'firstName' => 'required|string|max:255',
			'lastName' => 'required|string|max:255',
			'company' => 'required|string|max:255',
			'email' =>'required|string|email|max:255|unique:users',
			'mobileNumber'=>'required|string|max:255',
			'nationalInsurance' => 'required|string|max:255',
			'street' =>'required|string|max:255',
			'city'=>'required|string|max:255',
			'province' => 'required|string|max:255',
		]);
		
		$day = $request->get('day');
		$month = $request->get('month');
		$year = $request->get('year');
		
		$birthday = $year."-".$month."-".$day;
		
		$fName =  Auth::user()->first_name;
		$lName = Auth::user()->last_name;
		
		$owner = $fName." ".$lName; 
		
		$lead = new Lead([
			'title' => $request->get('title'),
			'first_name' =>$request->get('firstName'),
			'middle_name' =>$request->get('middleName'),
			'last_name' =>$request->get('lastName'),
			'company' =>$request->get('company'),
			'dob' =>$birthday,
			'profession'=>$request->get('profession'),
			'phone_number' =>$request->get('phoneNumber'),
			'email' =>$request->get('email'),
			'mobile_number' =>$request->get('mobileNumber'),
			'lead_source' =>$request->get('leadSource'),
			'referral' =>$request->get('referral'),
			'lead_status' =>$request->get('leadStatus'),
			'employment_type' =>$request->get('employmentType'),
			'national_insurance' =>$request->get('nationalInsurance'),
			'utr' =>$request->get('utr'),
			'registered' =>$request->get('648Reg'),
			'authority_letter' =>$request->get('authLetter'),
			'bank_authority' => $request->get('bankAuth'),
			'streets' =>$request->get('street'),
			'city' =>$request->get('city'),
			'province' =>$request->get('province'),
			'zip' =>$request->get('zip'),
			'country' =>$request->get('country'),
			'lead_assignment' =>$request->get('leadAssignment'),
			'description' =>$request->get('description'),
			'owner' =>$owner,
			
		]);
		
		$lead->save();
		
		Session::flash('leadCreated', 'Successfully added Lead.');
		return redirect('leads/create');
		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
		$lead  = Lead::find($id);
		
		$referralPersons = Client::all()->toArray();
		
		$users = User::all()->toArray();
		
		return view('editlead', compact('lead', 'id', 'referralPersons', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
		$lead = Lead::find($id);
		$year = $request->get('year');
		$month = $request->get('month');
		$day = $request->get('day');
		
		$birthday = $year."-".$month."-".$day;
					
		$lead->title = $request->get('title');
		$lead->first_name = $request->get('firstName');
		$lead->middle_name = $request->get('middleName');
		$lead->last_name = $request->get('lastName');
		$lead->company = $request->get('company');
		$lead->dob = $birthday;
		$lead->profession = $request->get('profession');
		$lead->phone_number = $request->get('phoneNumber');
		$lead->email = $request->get('email');
		$lead->mobile_number = $request->get('mobileNumber');
		$lead->lead_source = $request->get('leadSource');
		$lead->referral = $request->get('referral');
		$lead->lead_status = $request->get('leadStatus');
		$lead->employment_type = $request->get('employmentType');
		$lead->national_insurance = $request->get('nationalInsurance');
		$lead->utr = $request->get('utr');
		$lead->registered = $request->get('648Reg');
		$lead->authority_letter = $request->get('authLetter');
		$lead->bank_authority = $request->get('bankAuth');
		$lead->streets = $request->get('street');
		$lead->city = $request->get('city');
		$lead->province = $request->get('province');
		$lead->zip = $request->get('zip');
		$lead->country = $request->get('country');
		$lead->lead_assignment = $request->get('leadAssignment');
		$lead->description = $request->get('description');
		
		$lead->save();
		
		Session::flash('leadUpdated', 'Lead Information has been updated.');
		return redirect('leads/edit/id/'.$lead->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	
	
	//update assign to owners 
	public function updateAssign(Request $request, $id){
	  
		$lead = Lead::find($id);
		
		$lead->owner = $request->get('users');
		$lead->save();
		
		
		return redirect('/leads');
		
	}
	
	
	//assign to owners
	public function assign($id){
		//get all users 
		$users = User::all()->toArray();
		
		//get lead id
		$leadID  = Lead::find($id);
		
		return view('assignlead', compact('users', 'leadID'));
	}
}
