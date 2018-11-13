<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Session; 
use Validator;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get user id by login
		$id =  Auth::user()->id;
		$user = User::find($id);
		
		return view('userprofile', compact('crud','id', 'user'));	
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
		$user = User::find($id);
		return view('editprofile', compact('user','id'));
		
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
		$photo = $request->file('photo');
		
		if($photo == ""){
			// if user update without uploading profile picture
			$user = User::find($id);
			$year = $request->get('year');
			$month = $request->get('month');
			$day = $request->get('day');
			
			$birthday = $year."-".$month."-".$day;
			
			$user->first_name = $request->get('firstName');
			$user->last_name = $request->get('lastName');
			$user->dob = $birthday;
			$user->facebook_address = $request->get('facebookAddress');
			$user->save();
			
			Session::flash('updated', 'Profile successfully updated.');
			
			return redirect('user-profile/id/'.$user->id);
		}else{
			$photo = $request->file('photo');
			
			$profileImageSaveAsName = time() . "." .$photo->getClientOriginalExtension();
			
			if($photo->getClientOriginalExtension() == "jpg"){
							
				//upload the file to uploads folder
					$upload_path = 'uploads/';
					$image = $upload_path . $profileImageSaveAsName;
					
					//move the image to uploads folder
					$success = $photo->move($upload_path, $profileImageSaveAsName);
					
					$user = User::find($id);
					$year = $request->get('year');
					$month = $request->get('month');
					$day = $request->get('day');
					
					$birthday = $year."-".$month."-".$day;
					
					$user->first_name = $request->get('firstName');
					$user->last_name = $request->get('lastName');
					$user->dob = $birthday;
					$user->facebook_address = $request->get('facebookAddress');
		
					$user->profile_photo = $profileImageSaveAsName;
					$user->save();
					
					Session::flash('updated', 'Profile successfully updated.');
					
					return redirect('user-profile/id/'.$user->id);
			}else if($photo->getClientOriginalExtension() == "png"){
					//upload the file to uploads folder

					$upload_path = 'uploads/';
					$image = $upload_path . $profileImageSaveAsName;
					
					//move the image to uploads folder
					$success = $photo->move($upload_path, $profileImageSaveAsName);
					
					$user = User::find($id);
					$year = $request->get('year');
					$month = $request->get('month');
					$day = $request->get('day');
					
					$birthday = $year."-".$month."-".$day;
					
					$user->first_name = $request->get('firstName');
					$user->last_name = $request->get('lastName');
					$user->dob = $birthday;
					$user->facebook_address = $request->get('facebookAddress');
					$user->role_type = $request->get('roleType');
					$user->department = $request->get('department');
					$user->profile_photo = $profileImageSaveAsName;
					$user->save();
					
					Session::flash('updated', 'Profile successfully updated.');
					
					return redirect('user-profile/id/'.$user->id);
			}else if($photo->getClientOriginalExtension() == "jpeg"){
				//upload the file to uploads folder
					$upload_path = 'uploads/';
					$image = $upload_path . $profileImageSaveAsName;
					
					//move the image to uploads folder
					$success = $photo->move($upload_path, $profileImageSaveAsName);
					
					$user = User::find($id);
					$year = $request->get('year');
					$month = $request->get('month');
					$day = $request->get('day');
					
					$birthday = $year."-".$month."-".$day;
					
					$user->first_name = $request->get('firstName');
					$user->last_name = $request->get('lastName');
					$user->dob = $birthday;
					$user->facebook_address = $request->get('facebookAddress');
					$user->role_type = $request->get('roleType');
					$user->department = $request->get('department');
					$user->profile_photo = $profileImageSaveAsName;
					$user->save();
					
					Session::flash('updated', 'Profile successfully updated.');
					
					return redirect('user-profile/id/'.$user->id);
			}else{
				$user = User::find($id);
				Session::flash('err', 'Invalid file type.');
			
				return redirect('user-profile/id/'.$user->id);
			}
			
			
			
		}
		
		
		
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
