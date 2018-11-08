<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lead;
use App\Client;
use App\User; 

use App\Task;

use Session; 
use Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$tasks = Task::all()->toArray();
		
		return view('task', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		$leads = Lead::all()->toArray();
		$clients = Client::all()->toArray();
		$users = User::all()->toArray();
		
		return view('createtask', compact('leads', 'clients', 'users'));
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
			'subject' => 'required|string|max:255',
			'assignedTo' => 'required|not_in:0',
			'status' => 'required|not_in:0',
			'priority' => 'required|not_in:0',
			'type' => 'required|not_in:0',
		]);
		
		$leads = $request->get('leads');
		$clients = $request->get('clients');
	
		if($request->get('clients') != "0"){
			$name =  $request->get('clients');
		}
		
		if($request->get('leads') != "0"){
			$name = $request->get('leads'); 
		}
		
	
		$fName =  Auth::user()->first_name;
		$lName = Auth::user()->last_name;
		
		$owner = $fName." ".$lName; 
		
		
		$task = new Task([
			'status' => $request->get('status'),
			'assigned_to' =>$request->get('assignedTo'),
			'name' =>$name,
			'subject' => $request->get('subject'),
			'due_date' =>$request->get('dueDate'),
			'priority' =>$request->get('priority'),
			'type' =>$request->get('type'),
			'created_by' =>$owner,
		]);
		
		$task->save();
		
		Session::flash('taskCreated', 'Successfully created task');
		return redirect('tasks/create');
		
		
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
		$task = Task::find($id);
		
		$leads = Lead::all()->toArray();
		$clients = Client::all()->toArray();
		
		$users = User::all()->toArray();
		
		return view('edittask', compact('task''leads', 'clients', 'users'));
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
