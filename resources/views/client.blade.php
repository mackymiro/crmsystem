@extends('layouts.app')
@section('title', 'Clients | RMTG')
@section('content')
<div id="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Clients</li>
			
          </ol>
		  <div class="row">
			<div class="col-lg-12">
				<div class="card mb-3">
					<div class="card-header">
					  <i class="fa fa-black-tie"></i>
					  Clients 
					 
					</div>
					<div class="card-body">
						<a href="{{ url('clients/create') }}" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> New Clients</a>
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
									  <th>Action</th>
									  <th>Name</th>
									  <th>Email</th>
									  <th>Phone</th>
									  <th>Mobile</th>
									  <th>Created Date</th>
									  <th>Owner</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
									  <th>Action</th>
									  <th>Name</th>
									  <th>Email</th>
									  <th>Phone</th>
									  <th>Mobile</th>
									  <th>Created Date</th>
									  <th>Owner</th>
									</tr>
								</tfoot>
								<tbody>
									
									@foreach($clients as $client)
									<tr>
										<td>
											<a href="{{ action('ClientController@edit', $client['id']) }}" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
										</td>
										<td><a title="{{ ucfirst($client['first_name']) }} {{ ucfirst($client['middle_name']) }} {{ ucfirst($client['last_name']) }}" href="{{ url('clients/client-details/id', $client['id']) }}">{{ ucfirst($client['first_name']) }} {{ ucfirst($client['middle_name']) }} {{ ucfirst($client['last_name']) }}</a></td>
										<td>{{ $client['email'] }}</td>
										<td>{{ $client['phone_number'] }}</td>
										<td>{{ $client['mobile_number'] }}</td>
										<td>{{ $client['created_at'] }}</td>
										<td>{{ $client['owner'] }}</td>
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