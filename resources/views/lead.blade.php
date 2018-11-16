@extends('layouts.app')
@section('title', 'Leads | RMTGs')
@section('content')
<div id="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Leads</li>
          </ol>
		  <div class="row">
			<div class="col-lg-12">
				<div class="card mb-3">
					 <div class="card-header">
					  <i class="fa fa-line-chart"></i>
					  Leads</div>
					  <div class="card-body">
						<a href="{{ url('leads/create') }}" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> New Lead</a>
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
									  <th>Action</th>
									  <th>Name</th>
									  <th>Company</th>
									  <th>Email</th>
									  <th>Phone</th>
									  <th>Lead Status</th>
									  <th>Created Date</th>
									  <th>Owner</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
									  <th>Action</th>
									  <th>Name</th>
									  <th>Company</th>
									  <th>Email</th>
									  <th>Phone</th>
									  <th>Lead Status</th>
									  <th>Created Date</th>
									  <th>Owner</th>
									</tr>
								  </tfoot>
								  <tbody>
									
									@foreach($leads as $lead)
									<tr>
									  <td>
									    <a title="Edit" href="{{ action('LeadController@edit', $lead['id'])}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
									    @if(Auth::user()->role_type == 2)
											<a title="Assign to Owner" href="{{ url('leads/assign/id', $lead['id']) }}"><i class="fa fa-tasks"></i></a>
										@endif
									  </td>
									  <td><a title="{{ ucfirst($lead['first_name']) }} {{ ucfirst($lead['middle_name']) }} {{ ucfirst($lead['last_name']) }}" href="{{ url('leads/lead-details/id', $lead['id']) }}">{{ ucfirst($lead['first_name']) }} {{ ucfirst($lead['middle_name']) }} {{ ucfirst($lead['last_name']) }}</a></td>
									  <td>{{ $lead['company'] }}</td>
									  <td>{{ $lead['email'] }}</td>
									  <td>{{ $lead['phone_number'] }}</td>
									  <td>{{ $lead['lead_status'] }}</td>
									  <td>{{ $lead['created_at'] }}</td>
									  <td>{{ $lead['owner'] }}</td>
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