<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Client; 
use App\Opp;
use App\Note;
use App\RecentlyViewed;
use App\Invoice;

use Session; 
use Auth;
use Response;

class CaseController extends Controller
{
	//addNewInvoice
	public function addNewInvoice(Request $request, $id){
		$opp = Opp::find($id);
		
		$id = json_encode($opp->id);
		
		//get the user account login 
		$fName =  Auth::user()->first_name;
		$lName = Auth::user()->last_name;
		
		$owner = $fName." ".$lName; 
	
		//get the amount and vat amount 
		$amt = $request->get('amount');
		$vatAmt = $request->get('vatAmount');
	
		$sum = $amt + $vatAmt;
		
		//get the last insert id query in table invoices
		$data = DB::select('SELECT id, invoice_number FROM invoices ORDER BY id DESC LIMIT 1');
		
		//if code is not zero add plus 1
		if(isset($data[0]->invoice_number) != 0){
			//if code is not 0
			$newNum = $data[0]->invoice_number +1;
			$uNum = sprintf("%06d",$newNum);	
		}else{
			//if code is 0 
			$newNum = 1;
			$uNum = sprintf("%06d",$newNum);
		}
		
		$invoice = new Invoice([
			'client_id'=>$request->get('clientId'),
			'case_id'=>$id,
			'invoice_number'=>$uNum,
			'contact_name'=>$request->get('contactName'),
			'case_name'=>$request->get('caseName'),
			'item_code'=>$request->get('itemCode'),
			'reference'=>$request->get('notes'),
			'amount'=>$request->get('amount'),
			'vat_amount'=>$request->get('vatAmount'),
			'total_amount'=>$sum,
			'amount_due'=>$sum,
			'status'=>1,
			'created_by'=>$owner,
		]);
		
		$invoice->save();
		Session::flash('casesNewInvoice', 'Successfully added invoice.');
		return redirect('cases/new-invoices/id/'.$id);
		
	}
	
	//new invoices
	public function newInvoice($id){
		$opp = Opp::find($id);
		 
		$id = json_encode($opp->id);
		
		//recently viewed
		$views = RecentlyViewed::all()->toArray();
		
		return view('casenewinvoice', compact('views', 'opp', 'id'));
	}
	
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
		
		//recently viewed
		$views = RecentlyViewed::all()->toArray();
		
		return view('addnewnotescase', compact('id', 'views'));
	}

	public function casesDetails($id){
		$opp = Opp::find($id);
		
		$caseId = json_encode($opp->id);
		
		//query to notes table to get the case id per case profile
		$notes = DB::table('notes')->where('case_id', $caseId)->get()->toArray();
		
		//query to invoices table to get the case id 
		$invoices = DB::table('invoices')->where('case_id', $caseId)->get()->toArray();
		
		
		//recently viewed
		$views = RecentlyViewed::all()->toArray();
		
		return view('casesdetails', compact('opp', 'notes', 'views', 'invoices'));
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
		
		//recently viewed
		$views = RecentlyViewed::all()->toArray();
		
		return view('case', compact('opps', 'views' ));
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
		
		//recently viewed
		$views = RecentlyViewed::all()->toArray();
		
		return view('createcase', compact('clients', 'views'));
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
			'taxYear'=>'required|not_in:0',
		]);
		

		//get the user account login 
		$fName =  Auth::user()->first_name;
		$lName = Auth::user()->last_name;
		
		$owner = $fName." ".$lName; 
		
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
			
		$clientName = $request->get('contacts');
		
		
		$contact = explode("-", $clientName);
		$cName_0 = $contact[0];
		$cName = $contact[1];
		
		$taxes = $request->get('taxYear');
		
		$mulTax = '';
		
		foreach($taxes as $key=>$tax){
			$mulTax = $mulTax . $tax.",";
			
		}
		
		
		$case = new Opp([
			'code'=>$uNum,
			'client_id'=>$cName_0,
			'contacts'=>$cName,
			'tax_year'=>rtrim($mulTax,','),
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
		
		//recently viewed
		$views = RecentlyViewed::all()->toArray();
		
		return view('editcase', compact('opp','id', 'clients', 'views'));
		
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
		$opp->tax_year = $request->get('taxYear');
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
