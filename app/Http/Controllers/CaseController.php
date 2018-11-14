<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Client; 
use App\Opp;

use Session; 
use Auth;
use Response;

class CaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		return view('case');
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
