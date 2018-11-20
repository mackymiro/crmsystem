@extends('layouts.app')
@section('title', 'Lead Detail Profile | RMTG')
@section('content')
<script type="text/javascript">
	$(document).ready(function() {
		$('table.display').DataTable();
	});

</script>
<div id="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
				  <a href="#">Dashboard</a>
				</li>
				<li class="breadcrumb-item active">Lead Detail Profile</li>
			</ol>
			<div class="row">
				<div class="col-lg-4">
					<div class="card mb-3">
						<div class="card-header">
						  <i class="fa fa-user"></i>
						  Lead Profile</div>
						  <div class="card-body">
							<img src="{{ asset('images/profile-placeholder.gif')}}"  class="img-responsive" alt="">
						  </div>
						  <div class="card-footer small text-muted">
							<i class="fa fa-user" style="font-size:20px"></i><strong>
								{{ $lead->title }}, {{ ucfirst($lead->first_name) }} {{ ucfirst($lead->middle_name) }} {{ ucfirst($lead->last_name) }}
							</strong>
						  </div>
						  <div class="card-footer small text-muted">
							<i class="fa fa-info-circle" style="font-size:20px"></i> <strong>UTR: {{ $lead->utr }}</strong>
						  </div>
						  <div class="card-footer small text-muted">
							<i class="fa fa-info-circle" style="font-size:20px"></i> <strong>National Insurance: {{ $lead->national_insurance }}</strong>
						  </div>
						  <div class="card-footer small text-muted">
							<i class="fa fa-envelope fa-lg" style="font-size:20px" aria-hidden="true"></i><strong> {{ $lead->email }}</strong>
						  </div>
						  <div class="card-footer small text-muted">
							<i class="fa fa-phone fa-lg" style="font-size:20px" aria-hidden="true"></i><strong> {{ $lead->phone_number}}</strong>
						  </div>
						  <div class="card-footer small text-muted">
							<i class="fa fa-mobile fa-lg" style="font-size:30px" aria-hidden="true"></i><strong> {{ $lead->mobile_number }} </strong>
						  </div>
						  <div class="card-footer small text-muted">
							<i class="fa fa-map-marker" style="font-size:30px" aria-hidden="true"></i>
							<strong>{{ $lead->streets }}, {{ $lead->city }}, {{ $lead->province }}, {{ $lead->zip }}, {{ $lead->country }}</strong>
						  </div>
							
					</div>
				</div>	
				<div class="col-lg-8">
					<div class="card mb-3">
						<div class="card-header">
							<i class="fa fa-user-plus"></i>
							Lead Detail
							<a href="{{ url('leads') }}" class="pull-right">Back to Leads</a>
						</div>
						<div class="card-body">
							<a href="{{ url('leads/convert/id', $lead['id']) }}" class="pull-right btn btn-success" style="margin-right:8px;"><i class="fa fa-exchange" aria-hidden="true"></i> Convert</a>
							<a href="{{ action('LeadController@edit', $lead['id']) }}" style="margin-right:8px;" class="pull-right btn btn-success" ><i class="fa fa-pencil" aria-hidden="true"></i> Edit Profile</a>
							<a href="{{ url('leads/add-task/id', $lead['id']) }}" class="pull-right btn btn-success" style="margin-right:8px;"><i class="fa fa-tasks" aria-hidden="true"></i> Add New Task</a>
							
							<br>
							<br>
							<div class="form-group">
								<div class="form-row">
									<div class="col-md-6">
										<div class="table-responsive">
											<table class="table table-bordered"  width="100%" cellspacing="0">
												<thead>
													<tr >
													  <th width="150px;">Client Owner: </th>
													  <td>{{ $lead->owner }}</td>					
													</tr>
													<tr>
													  <th>Title: </th>
													  <td>{{ $lead->title }}</td>					
													</tr>
													<tr>
													  <th>Name: </th>
													  <td>{{ ucfirst($lead->first_name) }} {{ ucfirst($lead->middle_name) }} {{ ucfirst($lead->last_name) }}</td>					
													</tr>
													<tr>
													  <th>Birthday: </th>
													  <td>{{ $lead->dob }}</td>					
													</tr>
													<tr>
													  <th>Company: </th>
													  <td>{{ $lead->company }} </td>					
													</tr>
													<tr>
													  <th>Lead Source: </th>
													  <td>{{ $lead->lead_source }}</td>					
													</tr>
													<tr>
													  <th>Referred By: </th>
													  <td>{{ $lead->referral }}</td>					
													</tr>
													<tr>
													  <th>Employment Type: </th>
													  <td>{{ $lead->employment_type }}</td>					
													</tr>
													<tr>
													  <th>UTR: </th>
													  <td>{{ $lead->utr }}</td>					
													</tr>
													<tr>
													  <th>Authority Letter: </th>
													  <td>{{ $lead->authority_letter }}</td>					
													</tr>
													<tr>
													  <th>Address: </th>
													  <td>{{ $lead->streets }}, {{ $lead->city }}, {{ $lead->province }}, {{ $lead->zip }}, {{ $lead->country }} </td>					
													</tr>
													<tr>
													  <th>Created By: </th>
													  <td>{{ $lead->owner }}</td>					
													</tr>
												</thead>
											</table>
										</div>
									</div>
									<div class="col-md-6">
										<div class="table-responsive">
											<table class="table table-bordered"  width="100%" cellspacing="0">
												<thead>
													<tr >
													  <th width="150px;">Phone Number: </th>
													  <td>{{ $lead->phone_number }}</td>					
													</tr>
													<tr >
													  <th width="150px;">Email Address: </th>
													  <td>{{ $lead->email }}</td>					
													</tr>
													<tr >
													  <th width="150px;">Mobile Number: </th>
													  <td>{{ $lead->mobile_number }}</td>					
													</tr>
													<tr >
													  <th width="150px;">Profession: </th>
													  <td>{{ $lead->profession }}</td>					
													</tr>
													<tr >
													  <th width="150px;">Country: </th>
													  <td>{{ $lead->country }}</td>					
													</tr>
													<tr >
													  <th width="150px;">Lead Status: </th>
													  <td>{{ $lead->lead_status }}</td>					
													</tr>
													<tr >
													  <th width="150px;">National Insurance: </th>
													  <td>{{ $lead->national_insurance }}</td>					
													</tr>
													<tr >
													  <th width="150px;">648 Registered: </th>
													  <td>{{ $lead->registered }}</td>					
													</tr>
													<tr >
													  <th width="150px;">Bank Authority: </th>
													  <td>{{ $lead->bank_authority }}</td>					
													</tr>
													<tr >
													  <th width="150px;">Description: </th>
													  <td>{{ $lead->description }}</td>					
													</tr>
													<tr >
													  <th width="150px;">Last Modified: </th>
													  <td>{{ $lead->updated_at }}</td>					
													</tr>
												</thead>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card mb-3">
						<div class="card-header">
						  <i class="fa fa-sticky-note-o" aria-hidden="true"></i>
						  Notes</div>
						<div class="card-body">
							<div class="col-md-12">
								<div class="pull-right">
									<a href="{{ url('leads/add-new-notes/id', $lead['id']) }}" class="btn btn-success pull-right"><i class="fa fa-sticky-note-o" aria-hidden="true"></i> Add New Notes</a>
								</div>
								<div class="table-responsive">
									<table class="table table-bordered display"  width="100%" cellspacing="0">
										<thead>
											<tr>
											  <th width="250px;">Date & Time</th>
											  <th>Notes</th>
											  <th width="100px;">Attachments</th>
											 
											  <th>Posted By</th>
											  
											</tr>
										</thead>
										<tfoot>
											<tr>
											  <th>Date & Time</th>
											  <th>Notes</th>
											  <th>Attachments</th>
										
											  <th>Posted By</th>
											  
											</tr>
										</tfoot>
										<tbody>
											@foreach($notes as $note)
											<tr>
												<td>{{ $note->notes_date_time }}</td>
												<td>{{ $note->notes }}</td>
												<td>
													<a href="{{ url('/') }}/uploads/notes/{{ $note->filename }}" target="_blank">
														<?php if($note->filename != NULL): ?>
														 <i class="fa fa-paperclip" aria-hidden="true"></i> 
														<?php endif; ?>
														{{ $note->filename }}</a>
													<br>	
												</td>
												<td>{{ $note->posted_by }}</td>
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
</div>

@endsection