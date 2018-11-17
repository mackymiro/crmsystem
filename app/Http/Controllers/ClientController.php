<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Client;
use App\Opp; 
use App\User;
use App\Note;
use App\Task;

use Session;
use Auth;
use Response;

class ClientController extends Controller
{
	
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
		
		$client = Client::find($id);
		$clientId = json_encode($client->id);		
		
		
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
		
		Session::flash('clientTaskCreated', 'Successfully created task');
		return redirect('clients/add-task/id/'.$clientId);
	}
	
	//add task
	public function addTask($id){	
		$client = Client::find($id);
		
		$users = User::all()->toArray();
		
		return view('addtask', compact('client', 'users'));
	}
	
	//store add new case 
	public function storeCase(Request $request){
		//validate fields
		$this->validate($request, [
			'caseName'=>'required|string|max:255',
			'caseStage'=>'required|not_in:0',
			'description'=>'required|string|max:255',
			'estimatedAmount'=>'numeric|min:2|max:10000',
			'actualAmount'=>'numeric|min:2|max:10000',
		]);
		
		//get the user account login 
		$fName =  Auth::user()->first_name;
		$lName = Auth::user()->last_name;
		
		$owner = $fName." ".$lName; 
		
		//get the last insert id query in table opps
		$data = DB::select('SELECT id, code FROM opps ORDER BY id DESC LIMIT 1');
		
		if(isset($data[0]->code) != 0){
			//if code is not 0
			$newNum = $data[0]->code +1;
			$uNum = sprintf("%06d",$newNum);	
		}else{
			//if code is 0 
			$newNum = 1;
			$uNum = sprintf("%06d",$newNum);
		}
		
		$case = new Opp([
			'code'=>$uNum,
			'client_id'=>$request->get('clientId'),
			'contacts'=>$request->get('contacts'),
			'case_name'=>$request->get('caseName'),
			'case_stage'=>$request->get('caseStage'),
			'description'=>$request->get('description'),
			'estimated_amount'=>$request->get('estimatedAmount'),
			'actual_amount'=>$request->get('actualAmount'),
			'owner'=>$owner,
		]);
		
		$case->save();
		$retId = $case->id;
		Response::json(['success' => true,'id' => $retId], 200); 
		
		Session::flash('clientCase', 'Successfully created cases');
		
		return redirect('clients/add-new-case/id/'.$request->get('clientId'));
	}
	
	
	//addNewCase 
	public function addNewCase($id){
		$client = Client::find($id);
		
		
		return view('addnewcase', compact('client', 'id'));
	}
	
	
	//store notes
	public function storeNotes(Request $request, $id){
		date_default_timezone_set('Europe/London');
		//get the date and time UK
		$date = date('l jS \of F Y h:i:s A');
		

		
		$fName =  Auth::user()->first_name;
		$lName = Auth::user()->last_name;
		
		$postedBy = $fName." ".$lName; 
		
		//request a file
		$file = $request->file('files');
		
		if($file ==	 ""){
			// if user update without a file 
			$client = Client::find($id);
			
			$id = json_encode($client->id);
		
			$note = new Note([
				'client_id' => $id,
				'notes_date_time' =>$date,
				'notes'=>$request->get('description'),
				'posted_by'=>$postedBy,		
			
			]);
			
			$note->save();	
	
			Session::flash('notesAdded', 'Successfully added notes.');
			return redirect('clients/add-new-notes/id/'.$id);
			
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
			
			$client = Client::find($id);
			$id = json_encode($client->id);
		
			$note = new Note([
				'client_id' => $id,
				'notes_date_time' =>$date,
				'notes'=>$request->get('description'),
				'posted_by'=>$postedBy,		
				'filename'=>$fileName,
			]);
			
			$note->save(); 
			Session::flash('notesAdded', 'Successfully added notes.');
			return redirect('clients/add-new-notes/id/'.$id);
		}
	
	}
	
	
	//client add new notes
	public function addNewNotes($id){
		$client = Client::find($id);
		
	
		return view('addnewnotes', compact('id'));
	}
	
	//client details
	public function clientDetails($id){
		
		$client = Client::find($id);
		
		$clientId = json_encode($client->id);
		
	
		//query from notes table to get the client id per client profile
		$notes = DB::table('notes')->where('client_id', $clientId)->get()->toArray();
		
		//query from case table to get the client id
		$cases = DB::table('opps')->where('client_id', $clientId)->get()->toArray();
		
		
		return view('clientdetails', compact('client', 'notes', 'cases'));
		
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$clients = Client::all()->toArray();
		
		return view('client', compact('clients'));
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
		
		return view('createclient', compact('referralPersons'));
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
			'firstName'=>'required|string|max:255',
			'middleName'=>'required|string|max:255',
			'lastName'=>'required|string|max:255',
			'mobileNumber'=>'required|string|max:255',
			'nationalInsurance'=>'required|string|max:255',
			'street'=>'required|string|max:255',
			'city'=>'required|string|max:255',
			'province'=>'required|string|max:255',
		]);
		
		$day = $request->get('day');
		$month = $request->get('month');
		$year = $request->get('year');
		
		$birthday = $year."-".$month."-".$day;
		
		$fName =  Auth::user()->first_name;
		$lName = Auth::user()->last_name;
		
		$owner = $fName." ".$lName; 
		
		$client = new Client([
			'title' => $request->get('title'),
			'first_name' =>$request->get('firstName'),
			'middle_name' =>$request->get('middleName'),
			'last_name' =>$request->get('lastName'),
			'dob'=>$birthday,
			'contact_status'=>$request->get('contactStatus'),
			'profession' =>$request->get('profession'),
			'phone_number'=>$request->get('phoneNumber'),
			'email'=>$request->get('email'),
			'mobile_number'=>$request->get('mobileNumber'),
			'referral'=>$request->get('referral'),
			'commission'=>$request->get('commission'),
			'employment_type'=>$request->get('employmentType'),
			'national_insurance'=>$request->get('nationalInsurance'),
			'utr'=>$request->get('utr'),
			'registered'=>$request->get('648reg'),
			'authority_letter'=>$request->get('authLetter'),
			'bank_authority'=>$request->get('bankAuth'),
			'change_percentage'=>$request->get('changePercentage'),
			'payment_frequency'=>$request->get('paymentFrequency'),		
			'bank_name'=>$request->get('bankName'),
			'bank_acct_number'=>$request->get('bankAcctNum'),
			'bank_shortcode'=>$request->get('bankShortCode'),
			'monthly_percentage'=>$request->get('monthlyPercentage'),
			'pay_day'=>$request->get('payDay'),
			'street'=>$request->get('street'),
			'city'=>$request->get('city'),
			'province'=>$request->get('province'),
			'zip'=>$request->get('zip'),
			'country'=>$request->get('country'),
			'description'=>$request->get('description'),
			'owner'=>$owner,
		]);
		
		$client->save();
		
		Session::flash('clientCreated', 'Successfully added Client.');
		return redirect('clients/create');
		
	
		
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
		$client = Client::find($id);
		
		$referralPersons = Client::all()->toArray();
			
		
		return view('editclient', compact('client', 'id', 'referralPersons'));
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
		$client = Client::find($id);
		
		$year = $request->get('year');
		$month = $request->get('month');
		$day = $request->get('day');
		
		$birthday = $year."-".$month."-".$day;
		
		$client->title = $request->get('title');
		$client->first_name = $request->get('firstName');
		$client->middle_name = $request->get('middleName');
		$client->last_name = $request->get('lastName');
		$client->dob = $birthday;
		$client->contact_status = $request->get('contactStatus');
		$client->profession = $request->get('profession');
		$client->phone_number = $request->get('phoneNumber');
		$client->email = $request->get('email');
		$client->mobile_number = $request->get('mobileNumber');
		$client->referral = $request->get('referral');
		$client->commission = $request->get('commission');
		$client->employment_type = $request->get('employmentType');
		$client->national_insurance = $request->get('nationalInsurance');
		$client->utr = $request->get('utr');
		$client->registered = $request->get('648reg');
		$client->authority_letter = $request->get('authLetter');
		$client->bank_authority = $request->get('bankAuth');
		$client->change_percentage = $request->get('changePercentage');
		$client->payment_frequency = $request->get('paymentFrequency');
		$client->bank_name = $request->get('bankName');
		$client->bank_acct_number = $request->get('bankAcctNum');
		$client->bank_shortcode = $request->get('bankShortCode');
		$client->monthly_percentage = $request->get('monthlyPercentage');
		$client->pay_day = $request->get('payDay');
		$client->street = $request->get('street');
		$client->city = $request->get('city');
		$client->province = $request->get('province');
		$client->zip = $request->get('zip');
		$client->country = $request->get('country');
		$client->description = $request->get('description');
		
		$client->save();
		
		Session::flash('clientUpdated', 'Client Information has been updated.');
		return redirect('clients/edit/id/'.$client->id);
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
