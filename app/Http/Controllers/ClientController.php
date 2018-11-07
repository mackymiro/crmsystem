<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client; 
use App\User;
use Session;
use Auth;

class ClientController extends Controller
{
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
			'company'=>'required|string|max:255',
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
			'company' =>$request->get('company'),
			'dob'=>$birthday,
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
		$client->company = $request->get('company');
		$client->dob = $birthday;
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
