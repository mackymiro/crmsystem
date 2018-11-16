<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Client; 
use App\Opp;
use App\Note;

use Session; 
use Auth;
use Response;

class CaseController extends Controller
{
	//save notes
	public function storeNotes(Request $request, $id){
		date_default_timezone_set('Europe/London');
		
		//get the date and time UK
		$date = date('l jS \of F Y h:i:s A');

		$fName =  Auth::user()->first_name;
		$lName = Auth::user()->last_name;
		
		$postedBy = $fName." ".$lName; 
		
		//request a file
		$file = $request->file('files');
		
		if($file == ""){
			//if user update without a file
			$opp = Opp::find($id);
			$id = json_encode($opp->id);
			
			$note = new Note([
				'case_id'=>$id,
				'notes_date_time'=>$date,
				'notes'=>$request->get('description'),
				'posted_by'=>$postedBy,
			]);
			
			$note->save();
			
			Session::flash('notesCaseAdded', 'Successfully added notes.');
			return redirect('cases/add-new-notes/id/'.$id);
			
		}else{
			//validate fields
			$this->validate($request, [
				'files' =>'required|mimes:pdf,csv,xls,doc,docx',
			]);
			
			//get the filename 
			$fileName = $request->file('files')->getClientOriginalName();
			
			//upload the file to uploads folder
			$upload_path = 'uploads/notes';
			$filePath  = $upload_path . $file;
			
			//move the pdf,docs  to uploads folder
			$success = $file->move($upload_path, $fileName);
			
			$opp = Opp::find($id);
			
			$note = new Note([
				'case_id'=>$id,
				'notes_date_time'=>$date,
				'notes'=>$request->get('description'),
				'posted_by'=>$postedBy,
				'filename'=>$fileName,
			]);
			
			$note->save();
			Session::flash('notesCaseAdded', 'Successfully added notes.');
			return redirect('cases/add-new-notes/id/'.$id);
		}
	
	
	}
	
	
	//add new notes
	public function addNewNotes($id){
		$opp = Opp::find($id);
		
		return view('addnewnotescase', compact('id'));
	}

	public function casesDetails($id){
		$opp = Opp::find($id);
		
		$caseId = json_encode($opp->id);
		
		//query to notes table to get the case id per case profile
		$notes = DB::table('notes')->where('case_id', $caseId)->get()->toArray();
		
		return view('casesdetails', compact('opp', 'notes'));
	}
	
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$opps = Opp::all()->toArray();
		
		return view('case', compact('opps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		$clients = Client::all()->toArray();
		
		return view('createcase', compact('clients'));
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
			'contacts' =>'required|not_in:0',
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
			//if code is note 0
			$newNum = $data[0]->code +1;
			$uNum = sprintf("%06d",$newNum);	
		}else{
			//if code is 0 
			$newNum = 1;
			$uNum = sprintf("%06d",$newNum);
		}
			
		$clientName = $request->get('contacts');
		
		$contact = explode("-", $clientName);
		$cName_0 = $contact[0];
		$cName = $contact[1];
		
		$case = new Opp([
			'code'=>$uNum,
			'client_id'=>$cName_0,
			'contacts'=>$cName,
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
		
		Session::flash('caseCreated', 'Successfully created cases');
		return redirect('cases/create');
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
		$opp = Opp::find($id);
		$clients = Client::all()->toArray();
		
		return view('editcase', compact('opp','id', 'clients'));
		
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
		$opp = Opp::find($id);
		
		$clientName = $request->get('contacts');
		
		$contact = explode("-", $clientName);
		$cName_0 = $contact[0];
		$cName = $contact[1];
		
		$opp->client_id = $cName_0;
		$opp->contacts = $cName;
		$opp->case_stage = $request->get('caseStage');
		$opp->description = $request->get('description');
		$opp->estimated_amount = $request->get('estimatedAmount');
		$opp->actual_amount = $request->get('actualAmount');
		$opp->national_insurance = $request->get('nationalInsurance');
		$opp->registered = $request->get('648reg');
		$opp->charge_percentage = $request->get('chargePercentage');
		$opp->utr = $request->get('utr');
		$opp->authority_letter = $request->get('authLetter');
		$opp->bank_authority = $request->get('bankAuth');
		$opp->email = $request->get('email');
		$opp->phone_number = $request->get('phoneNumber');
		$opp->company = $request->get('company');
		
		$opp->save();
		
		Session::flash('clientUpdated', 'Case information has been updated.');
		return redirect('cases/edit/id/'.$opp->id);
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
		$opp = Opp::find($id);
		$opp->delete();
		
    }
}
