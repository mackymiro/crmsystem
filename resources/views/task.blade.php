@extends('layouts.app')
@section('title', 'Tasks | RMTG')
@section('content')
<div id="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Tasks</li>
          </ol>
		  <div class="row">
			<div class="col-lg-12">
				<div class="card mb-3">
					 <div class="card-header">
					  <i class="fa fa-tasks" aria-hidden="true"></i>
					  Tasks</div>
					  <div class="card-body">
						<a href="{{ url('tasks/create') }}" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Create Task</a>
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
									  <th>Action</th>
									  <th>Assigned To</th>
									  <th>Client</th>
									  <th>Subject</th>
									  <th>Type</th>
									  <th>Due Date</th>
									  <th>Priority</th>
									  <th>Status</th>
									  <th>Comments</th>
									  <th>Created By</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
									  <th>Action</th>
									  <th>Assigned To</th>
									  <th>Client</th>
									  <th>Subject</th>
									  <th>Type</th>
									  <th>Due Date</th>
									  <th>Priority</th>
									  <th>Status</th>
									  <th>Comments</th>
									  <th>Created By</th>
									</tr>
								</tfoot>
								<tbody>
									@foreach($tasks as $task)
									<tr>
										<td>
											<a title="Edit" href="{{ action('TaskController@edit', $task['id']) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
											<a title="Delete" href=""><i class="fa fa-trash" aria-hidden="true"></i></a>
										</td>
										<td>{{ $task['assigned_to'] }}</td>
										<td>{{ $task['name'] }}</td>
										<td>{{ $task['subject'] }}</td>
										<td>{{ $task['type'] }}</td>
										<td>{{ $task['due_date'] }}</td>
										<td>
											@if($task['priority'] == "Low")
												<p style="width:90px;" class="alert alert-warning">{{ $task['priority'] }}</p>
											@elseif($task['priority'] == "Medium")
												<p style="width:110px;"class="alert alert-success">{{ $task['priority'] }}</p>
											@elseif($task['priority'] == "High")
												<p style="width:95px;" class="alert alert-danger">{{ $task['priority'] }}</p>
											@endif
										</td>
										<td>
											
											{{ $task['status'] }}
									
										</td>
										<td></td>
										<td>{{ $task['created_by'] }}</td>
										
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					  </div>
				</div>
			</div>
		  </div>
	</div>
</div>
@endsection