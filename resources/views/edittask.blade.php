@extends('layouts.app')
@section('title', 'Edit Task | RMTG')
@section('content')
<script>
	$(document).ready(function(){
		
		$("#objectTask").on('change', function(){
			var task = $("#objectTask").val();
			
			if(task == "Leads"){
				$("#leadId").show();
				$("#clientId").hide();
			}else{
				$("#clientId").show();
				$("#leadId").hide();
			}
		});
	});
	
</script>
<div id="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
			  <a href="#">Dashboard</a>
			</li>
			<li class="breadcrumb-item active">Edit Tasks</li>

		</ol>
		  <div class="row">
			<div class="col-lg-12">
				<div class="card mb-3">
					<div class="card-header">
					  <i class="fa fa-tasks"></i>
					  Edit task
					  <a href="{{ url('tasks') }}" class="pull-right">Back to Tasks</a>
					</div>
					<div class="card-body">
						<div class="form-group">
							<div class="pull-right">
								<button type="submit" class="btn btn-success">
									<i class="fa fa-tasks" aria-hidden="true"></i> Update Task
								</button>
							</div>
							<div style="clear:both; "></div>
							<div class="form-row">
								<div class="col-md-4">
									<label>Object;</label>
									<select id="objectTask" name="selectTask" class="form-control">
										<option value="Leads">Leads</option>
										<option value="Clients">Clients</option>
									</select>	
								</div>
								<div class="col-md-4">
									<div id="leadId">
										<label>Leads;</label>
											<select name="leads" class="form-control">
												<option value="0">--Please Select--</option>
												@foreach($leads as $lead)
													<option value="{{ $lead['first_name']}} {{ $lead['last_name'] }}">{{ $lead['first_name']}} {{ $lead['last_name'] }}</option>
												@endforeach
											</select>
										</div>
									<div id="clientId" style="display:none;">
										<label>Clients;</label>
										<select name="clients" class="form-control" >
											<option value="0">--Please Select--</option>
											@foreach($clients as $client)
												<option value="{{ $client['first_name']}} {{ $client['last_name'] }}">{{ $client['first_name']}} {{ $client['last_name'] }}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>
						</div>
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
											<option v-for="status in statuses" v-bind:value="status.value"
												:selected="status.value=={{json_encode($task->status)}}?true : false">
												@{{ status.text }}
											</option>
										</select>
									
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-8">
									<label>Subject;</label>
									<input type="text" name="subject" class="form-control" value="{{ old('subject') }}"  required />
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-2">
									<label>Due Date;</label>
									<input type="text" name="dueDate" class="date form-control" value="{{ old('dueDate') }}"  required />
								</div>
								<div class="col-md-2">
									<label>Priority; </label>
									<div id="app-priority">
										<select name="priority" class="form-control">
											<option value="0">--Please Select--</option>
											<option v-for="priority in priorities" v-bind:value="priority.value">
												@{{ priority.text }}
											</option>
										</select>
										
									</div>
								</div>
								<div class="col-md-2">
									<label>Type; </label>
									<div id="app-type">
										<select name="type" class="form-control">
											<option value="0">--Please Select--</option>
											<option v-for="type in types" v-bind:value="type.value">
												@{{ type.text }}
											</option>
										</select>
										
									</div>
								</div>
							</div>
						</div>
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