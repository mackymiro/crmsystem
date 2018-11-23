<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Lead; 
use App\Client;

use App\User;
use App\Note;
use App\Task;
use App\Opp;
use App\RecentlyViewed;

use Session; 

use Auth;
use Response;

class LeadController extends Controller
{

	//store case
	public function storeCase(Request $request, $id){
		$lead = Lead::find($id);
		$leadId = json_encode($lead->id);
		 
		
		//validate fields
		$this->validate($request, [
			'taxYear'=>'required|not_in:0',
			
		]);
		
		//get the user account login
		$fName =  Auth::user()->first_name;
		$lName = Auth::user()->last_name;
		
		$owner = $fName." ".$lName; 
		
		
		$checkbox = $request->get('createCase');
		
		//get the last insert id query in table opps
		$data = DB::select('SELECT id, code FROM opps ORDER BY id DESC LIMIT 1');
		
		//if code is not zero add plus 1
		if(isset($data[0]->code) != 0){
			//if code is not 0
			$newNum = $data[0]->code +1;
			$uNum = sprintf("%06d",$newNum);	
		}else{
			//if code is 0 
			$newNum = 1;
			$uNum = sprintf("%06d",$newNum);
		}
		
		$taxes = $request->get('taxYear');
		
		$mulTax = '';
		
		//loop tax year
		foreach($taxes as $key=>$tax){
			$mulTax = $mulTax . $tax.",";
			
		}
		
		
		$checkbox = $request->get('createCase');
		
		//if user checks the checkbox will not create a case 
		if($checkbox == "on"){
			//save to clients table
			$client = new Client([
				'title'=>$request->get('title'),
				'first_name' =>$request->get('firstName'),
				'middle_name'=>$request->get('middleName'),
				'last_name'=>$request->get('lastName'),
				'contact_status'=>$request->get('leadStatus'),
				'dob'=>$request->get('dob'),
				'profession'=>$request->get('profession'),
				'phone_number'=>$request->get('phoneNumber'),
				'email'=>$request->get('email'),
				'mobile_number'=>$request->get('mobileNumber'),
				'referral'=>$request->get('referral'),
				'employment_type'=>$request->get('employmentType'),
				'national_insurance'=>$request->get('nationalInsurance'),
				'utr'=>$request->get('utr'),
				'registered'=>$request->get('648reg'),
				'authority_letter'=>$request->get('authLetter'),
				'bank_authority'=>$request->get('bankAuth'),
				'street'=>$request->get('streets'),
				'city'=>$request->get('city'),
				'province'=>$request->get('province'),
				'zip'=>$request->get('zip'),
				'country'=>$request->get('country'),
				'description'=>$request->get('description'),
				'owner'=>$owner,
		
			]);
			
			$client->save();
			
			$flag = 1;
			
			//update leads table
			$lead->lead_status = $request->get('leadStatus');
			$lead->flag = $flag;
			
			$lead->save();
			
			//update recently viewed table
			//get the date today
			$date = date('Y-m-d');
			
			//query recently viewd tables check if date is the same
			$view = DB::table('recently_vieweds')
                    ->where('lead_id', $leadId)
                    ->where('date', $date)
                    ->get()->toArray();
					
			if($date  == $view[0]->date){
				//update recently viewed tables
				
				$recent = RecentlyViewed::find($leadId);
				$status = "Close/Converted";
				
				$recent->flag_status = $status;
				$recent->save();
			
			}
				
			
			Session::flash('convertCreated', 'Successfully converted as clients');
			
			return redirect('leads/convert/id/'.$leadId);
			
			
		}else{
			//create a case in table opps
			$client = new Client([
				'title'=>$request->get('title'),
				'first_name' =>$request->get('firstName'),
				'middle_name'=>$request->get('middleName'),
				'last_name'=>$request->get('lastName'),
				'contact_status'=>$request->get('leadStatus'),
				'dob'=>$request->get('dob'),
				'profession'=>$request->get('profession'),
				'phone_number'=>$request->get('phoneNumber'),
				'email'=>$request->get('email'),
				'mobile_number'=>$request->get('mobileNumber'),
				'referral'=>$request->get('referral'),
				'employment_type'=>$request->get('employmentType'),
				'national_insurance'=>$request->get('nationalInsurance'),
				'utr'=>$request->get('utr'),
				'registered'=>$request->get('648reg'),
				'authority_letter'=>$request->get('authLetter'),
				'bank_authority'=>$request->get('bankAuth'),
				'street'=>$request->get('streets'),
				'city'=>$request->get('city'),
				'province'=>$request->get('province'),
				'zip'=>$request->get('zip'),
				'country'=>$request->get('country'),
				'description'=>$request->get('description'),
				'owner'=>$owner,
		
			]);
			
			$client->save();
			$retId = $client->id;
			Response::json(['success' => true,'id' => $retId], 200); 
			
			$firstName = $request->get('firstName');
			$lastName = $request->get('lastName');
			
			$contactName = $firstName." ".$lastName; 
			
			//save to cases table/ opp
			$case = new Opp([
				'code'=>$uNum,
				'client_id'=>$retId,
				'contacts'=>$contactName,
				'tax_year'=>rtrim($mulTax,','),
				'owner'=>$owner,
			]);
			
			$case->save();
			
			
			$flag = 1;
			
			//update leads table
			$lead->lead_status = $request->get('leadStatus');
			$lead->flag = $flag;
			
			$lead->save();
			
			
			//update recently viewed table
			//get the date today
			$date = date('Y-m-d');
		
			//query recently viewd tables check if date is the same
			$view = DB::table('recently_vieweds')
                    ->where('lead_id', $leadId)
                    ->where('date', $date)
                    ->get()->toArray();
			
			if($date  == $view[0]->date){
				//update recently viewed tables
				
				$recent = RecentlyViewed::find($leadId);
				$status = "Close/Converted";
				
				$recent->flag_status = $status;
				$recent->save();
				
			}
			
			
			Session::flash('convertCreated', 'Successfully converted as clients');
			return redirect('leads/convert/id/'.$leadId);
			
			
		}
	
	}
	
	//convert page
	public function convert($id){
		$lead = Lead::find($id);
		
		//recently viewed
		$views = RecentlyViewed::all()->toArray();
		return view('convert', compact('lead', 'views'));
	}
	
	//store task
	public function storeTask(Request $request, $id){
		//validate fields
		$this->validate($request, [
			'assignedTo' => 'required|not_in:0',
			'status' => 'required|not_in:0',
			'subject' => 'required|string|max:255',
			'priority' => 'required|not_in:0',
			'type' => 'required|not_in:0',
		]);
		
		$lead = Lead::find($id);
		$leadId = json_encode($lead->id);
		
		//get the user account login
		$fName =  Auth::user()->first_name;
		$lName = Auth::user()->last_name;
		
		$owner = $fName." ".$lName; 
		
		$task = new Task([
			'assigned_to'=>$request->get('assignedTo'),
			'name'=>$request->get('clientName'),
			'status'=>$request->get('status'),
			'subject'=>$request->get('subject'),
			'priority'=>$request->get('priority'),
			'due_date'=>$request->get('dueDate'),
			'type'=>$request->get('type'),
			'comments'=>$request->get('comments'),
			'created_by'=>$owner,
		]);
		
		$task->save();
		
		Session::flash('leadTaskCreated', 'Successfully created task');
		return redirect('leads/add-task/id/'. $leadId);
		
	}
	
	
	//addtask
	public function addTask($id){
		$lead = Lead::find($id);
		
		$users = User::all()->toArray();
		//recently viewed
		$views = RecentlyViewed::all()->toArray();
		
		return view('addtasklead', compact('lead', 'users', 'views'));
	}
	
	public function storeNotes(Request $request, $id){
		date_default_timezone_set('Europe/London');
		
		//get the date and time UK
		$date = date('l jS \of F Y h:i:s A');
		
		
		$fName =  Auth::user()->first_name;
		$lName = Auth::user()->last_name;
		
		$postedBy = $fName." ".$lName; 
		
		//request a file
		$file = $request->file('files');
		
		
		
		if($file ==  ""){
			//if user update without a file
			$lead = Lead::find($id);
			$id = json_encode($lead->id);
			
			$note = new Note([
				'lead_id' =>$id,
				'notes_date_time'=>$date,
				'notes'=>$request->get('description'),
				'posted_by'=>$postedBy,
			]);
			
			$note->save();
			
			Session::flash('notesLeadAdded', 'Successfully added notes.');
			return redirect('leads/add-new-notes/id/'.$id);
			
		}else{
			//validate fields
			$this->validate($request, [
				'files' =>'required|mimes:pdf,csv,xls,doc,docx',
			]);
			
			//get the filename 
			$fileName = $request->file('files')->getClientOriginalName();
			
			$fileSaveAsName = $fileName;
			

			//upload the file to uploads folder
			$upload_path = 'uploads/notes';
			$filePath  = $upload_path . $file;
			
	
			
			//move the pdf,docs  to uploads folder
			$success = $file->move($upload_path, $fileName);
			
			$lead = Lead::find($id);
			
			$id = json_encode($lead->id);
			
			$note = new Note([
				'lead_id'=>$id,
				'notes_date_time'=>$date,
				'notes'=>$request->get('description'),
				'posted_by'=>$postedBy,
				'filename'=>$fileName,
			]);
			
			$note->save();
			
			Session::flash('notesLeadAdded', 'Successfully added notes.');
			return redirect('leads/add-new-notes/id/'.$id);
			
		}
	}
	
	public function addNewNotes($id){	
		$lead = Lead::find($id);
		
		//recently viewed
		$views = RecentlyViewed::all()->toArray();
		
		return view('addnewnoteslead', compact('id', 'views'));
	}

	//lead detail profile
	public function leadDetails($id){
		$lead = Lead::find($id);
		
		$leadId = json_encode($lead->id);
		
	
		//query to notes table to get the lead id per lead profile
		$notes = DB::table('notes')->where('lead_id', $leadId)->get()->toArray();
		
		//get the date today
		$date = date('Y-m-d');
		
	
		//query recently viewd tables check if date is the same
		$view = DB::table('recently_vieweds')
                    ->where('lead_id', $leadId)
                    ->where('date', $date)
                    ->get()->toArray();
		
		if($date != isset($view[0]->date)){
			
			//save the lead details per visit in recently viewed table
			$status = "leads";
			$client_id = 0;
			$recently = new RecentlyViewed([
				'lead_id'=>$leadId,
				'client_id'=>$client_id,
				'status'=>$status,
				'first_name'=>$lead->first_name,
				'last_name'=>$lead->last_name,
				'date'=>$date,
			]);
			
			$recently->save();
		}
		
		//recently viewed
		$views = RecentlyViewed::all()->toArray();
		
		
		return view('leaddetails', compact('lead', 'notes', 'views'));
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
		
		//recently viewed
		$views = RecentlyViewed::all()->toArray();
		
		return view('assignlead', compact('users', 'leadID', 'views'));
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
		
		//recently viewed
		$views = RecentlyViewed::all()->toArray();
		
		return view('lead', compact('leads', 'views'));
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
		
		//recently viewed
		$views = RecentlyViewed::all()->toArray();
			
		return view('createlead', compact('referralPersons', 'users', 'views'));
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
		
		//recently viewed
		$views = RecentlyViewed::all()->toArray();
		
		return view('editlead', compact('lead', 'id', 'referralPersons', 'users', 'views'));
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
	
}
