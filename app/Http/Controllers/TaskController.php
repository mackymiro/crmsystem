<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Lead;
use App\Client;
use App\User; 
use App\Task;
use App\RecentlyViewed;

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
		
		//recently viewed
		$views = RecentlyViewed::all()->toArray();
		
		return view('task', compact('tasks', 'views'));
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
		
		//recently viewed
		$views = RecentlyViewed::all()->toArray();
		
		return view('createtask', compact('leads', 'clients', 'users', 'views'));
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
	
		//if clients is not 0
		if($request->get('clients') != "0"){
			$name =  $request->get('clients');
		}
		
		//if leads is not 0
		if($request->get('leads') != "0"){
			$name = $request->get('leads'); 
		}
		
		//get the user account login 
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
		
		//recently viewed
		$views = RecentlyViewed::all()->toArray();
		
		return view('edittask', compact('task', 'leads', 'clients', 'users', 'id', 'views'));
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
		$task = Task::find($id);
		
		$leads = $request->get('leads');
		$clients = $request->get('clients');
		
		//if clients is not 0
		if($request->get('clients') != "0"){
			$name =  $request->get('clients');
			
		}
		
		//if leads is not 0
		if($request->get('leads') != "0"){
			$name = $request->get('leads'); 
		}
		
		$task->name = $name;
		$task->assigned_to = $request->get('assignedTo');
		$task->status = $request->get('status');
		$task->subject = $request->get('subject');
		$task->due_date = $request->get('dueDate');
		$task->priority = $request->get('priority');
		$task->type = $request->get('type');
		
		$task->save();
		
		Session::flash('taskUpdated', 'Task Information has been updated.');
		return redirect('tasks/edit/id/'.$task->id);
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
		$task = Task::find($id);
		$task->delete();
		
    }
}
