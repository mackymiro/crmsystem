@extends('layouts.app')
@section('title', 'Client Add New Task | RMTG')
@section('content')
<div id="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Clients Add Task</li>
			
          </ol>
		  <div class="row">
			<div class="col-lg-12">
				<div class="card mb-3">
					<div class="card-header">
					  <i class="fa fa-tasks"></i>
					  Add Task - {{ ucfirst($client['first_name']) }} {{ ucfirst($client['last_name']) }}
					  <a href="{{ url('clients/client-details/id', $client['id']) }}" class="pull-right">Back to Clients Profile</a>
					</div>
					<div class="card-body">
						<form action="{{ action('ClientController@storeTask', $client['id']) }}" method="POST">
							{{csrf_field()}}
							<div class="form-group">
								<div class="form-row">
									<div class="col-md-12">
										<div class="pull-right">
											<button type="submit" class="btn btn-success">
												<i class="fa fa-save" aria-hidden="true"></i> Add Task
											</button>
										</div>
									</div>
								</div>
							</div>
							
							@if(session('clientTaskCreated'))
								<p class="alert alert-success">{{ Session::get('clientTaskCreated') }}</p>
							@endif
							<div style="clear:both; "></div>
							<div class="form-group">
								<div class="form-row">
									<div class="col-md-4">
										<label>Assigned To;</label>
										<select name="assignedTo" class="form-control">
											<option value="0">--Please Select--</option>
											@foreach($users as $user)
												<option value="{{ $user['first_name'] }} {{ $user['last_name'] }}">{{ $user['first_name'] }} {{ $user['last_name'] }}</option>
											@endforeach
										</select>
										@if ($errors->has('assignedTo'))
											<div class="alert alert-danger">
												<strong>{{ $errors->first('assignedTo') }}</strong>
											</div>
										@endif
									</div>
									<div class="col-md-4">
										<label>Status;</label>
										<div id="app-status">
											<select name="status" class="form-control">
												<option value="0">--Please Select--</option>
												<option v-for="status in statuses" v-bind:value="status.value">
													@{{ status.text }}
												</option>
											</select>
											@if ($errors->has('status'))
												<div class="alert alert-danger">
													<strong>{{ $errors->first('status') }}</strong>
												</div>
											@endif
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="form-row">
									<div class="col-md-4">
										<label>Subject;</label>
										<input type="text" name="subject" class="form-control"  required />
									</div>
									<div class="col-md-4">
										<label>Priority; </label>
										<div id="app-priority">
											<select name="priority" class="form-control">
												<option value="0">--Please Select--</option>
												<option v-for="priority in priorities" v-bind:value="priority.value">
													@{{ priority.text }}
												</option>
											</select>
											@if ($errors->has('priority'))
												<div class="alert alert-danger">
													<strong>{{ $errors->first('priority') }}</strong>
												</div>
											@endif
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="form-row">
									<div class="col-md-4">
										<label>Due Date;</label>
										<input type="text" name="dueDate" class="date form-control"   required />
									</div>
									<div class="col-md-4">
										<label>Type; </label>
										<div id="app-type">
											<select name="type" class="form-control">
												<option value="0">--Please Select--</option>
												<option v-for="type in types" v-bind:value="type.value">
													@{{ type.text }}
												</option>
											</select>
											@if ($errors->has('type'))
												<div class="alert alert-danger">
													<strong>{{ $errors->first('type') }}</strong>
												</div>
											@endif
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="form-row">
									<div class="col-md-8">
										<label>Comments; </label>
										<textarea name="comments" class="form-control" cols="5" rows="5"></textarea>
									</div>
								</div>
							</div>
							<input type="hidden" name="clientName" value="{{ $client['first_name'] }} {{ $client['last_name'] }}" />
						</form>
					</div>
				</div>
			</div>
		  </div>
	</div>
</div>
<script>
	//status data
	new Vue({
	el: '#app-status',
		data: {
			statuses:[
				{ text:'Not Started', value: 'Not Started' },
				{ text:'In Progress', value: 'In Progress'},
				{ text:'Completed', value: 'Completed'},
				{ text:'Deferred', value: 'Deferred'},
				{ text:'Waiting on Someone else', value: 'Waiting on Someone else'}
			]
		}
	})
	
	//priority data
	new Vue({
	el: '#app-priority',
		data: {
			priorities:[
				{ text:'High', value: 'High' },
				{ text:'Medium', value: 'Medium'},
				{ text:'Low', value: 'Low'}
				
			]
		}
	})
	
	//type data
	new Vue({
	el: '#app-type',
		data: {
			types:[
				{ text:'Call', value: 'Call' },
				{ text:'E-mail', value: 'E-mail'},
				{ text:'Meeting', value: 'Meeting'}
				
			]
		}
	})

</script>
@endsection