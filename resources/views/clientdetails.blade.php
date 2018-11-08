@extends('layouts.app')
@section('title', 'Client Detail Profile | RMTG')
@section('content')
<div id="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
				  <a href="#">Dashboard</a>
				</li>
				<li class="breadcrumb-item active">Client Detail Profile</li>
			</ol>
			<div class="row">
				<div class="col-lg-4">
					<div class="card mb-3">
						<div class="card-header">
						  <i class="fa fa-user"></i>
						  Client Profile</div>
						  <div class="card-body">
							<img src="{{ asset('images/profile-placeholder.gif')}}"  class="img-responsive" alt="">
						  </div>
						  <div class="card-footer small text-muted">
							<i class="fa fa-user" style="font-size:20px"></i><strong>
								{{ $client->title }}, {{ ucfirst($client->first_name) }} {{ ucfirst($client->middle_name) }} {{ ucfirst($client->last_name) }}
							</strong>
						  </div>
						  <div class="card-footer small text-muted">
							<i class="fa fa-info-circle" style="font-size:20px"></i> <strong>UTR: {{ $client->utr }}</strong>
						  </div>
						  <div class="card-footer small text-muted">
							<i class="fa fa-info-circle" style="font-size:20px"></i> <strong>National Insurance: {{ $client->national_insurance }}</strong>
						  </div>
						  <div class="card-footer small text-muted">
							<i class="fa fa-envelope fa-lg" style="font-size:20px" aria-hidden="true"></i><strong> {{ $client->email }} </strong>
						  </div>
						  <div class="card-footer small text-muted">
							<i class="fa fa-phone fa-lg" style="font-size:20px" aria-hidden="true"></i><strong> {{ $client->phone_number}} </strong>
						  </div>
						  <div class="card-footer small text-muted">
							<i class="fa fa-mobile fa-lg" style="font-size:30px" aria-hidden="true"></i><strong> {{ $client->mobile_number }} </strong>
						  </div>
						  <div class="card-footer small text-muted">
							<i class="fa fa-map-marker" style="font-size:30px" aria-hidden="true"></i>
							<strong>{{ $client->street }}, {{ $client->city }}, {{ $client->province }}, {{ $client->zip }}, {{ $client->country }}</strong>
						  </div>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="card mb-3">
						<div class="card-header">
							<i class="fa fa-user-plus"></i>
							Client Detail
							<a href="{{ url('clients') }}" class="pull-right">Back to Clients</a>
						</div>  
						<div class="card-body">
							<strong>Personal Info</strong>
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
													  <td>{{ $client->owner }}</td>					
													</tr>
													<tr>
													  <th>Title: </th>
													  <td>{{ $client->title }}</td>					
													</tr>
													<tr>
													  <th>Name: </th>
													  <td>{{ ucfirst($client->first_name) }} {{ ucfirst($client->middle_name) }} {{ ucfirst($client->last_name) }}</td>					
													</tr>
													<tr>
													  <th>Birthday: </th>
													  <td>{{ $client->dob }} </td>					
													</tr>
													<tr>
													  <th>Profession: </th>
													  <td>{{ $client->profession }} </td>					
													</tr>
													<tr>
													  <th>Address: </th>
													  <td>{{ $client->street }}, {{ $client->city }}, {{ $client->province }}, {{ $client->zip }}, {{ $client->country }} </td>					
													</tr>
													<tr>
													  <th>Referred By: </th>
													  <td>{{ $client->referral }} </td>					
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
													  <td>{{ $client->phone_number }}</td>					
													</tr>
													<tr>
													  <th>Email Address: </th>
													  <td>{{ $client->email }}</td>					
													</tr>
													<tr>
													  <th>Mobile Number: </th>
													  <td>{{ $client->mobile_number }}</td>					
													</tr>
													<tr>
													  <th>Contact Status: </th>
													  <td></td>					
													</tr>
													<tr>
													  <th>Country: </th>
													  <td></td>					
													</tr>
													<tr>
													  <th>Description: </th>
													  <td>{{ $client->description }}</td>					
													</tr>
												</thead>
												<tbody>
													
												</tbody>
											</table>
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card mb-3">
						<div class="card-header">
						  <i class="fa fa-bank"></i>
						  Bank Info</div>
						<div class="card-body">
							<div class="form-group">
								<div class="form-row">
									<div class="col-md-6">
										<strong>Bank Info</strong>
										<br>
										<br>
										<div class="table-responsive">
											<table class="table table-bordered"  width="100%" cellspacing="0">
												<thead>
													<tr>
													  <th width="150px;">Bank Name: </th>
													  <td></td>					
													</tr>
													<tr>
													  <th>Bank Accnt. Number</th>
													  <td></td>					
													</tr>
												</thead>
												
											</table>
										</div>
									</div>
									<div class="col-md-6">
										<br>
										<br>
										<div class="table-responsive">
											<table class="table table-bordered"  width="100%" cellspacing="0">
												<thead>
													<tr>
													  <th width="150px;">Bank Shortcode: </th>
													  <td></td>					
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
						  <i class="fa fa-percent"></i>
						  Tax Info</div>
						<div class="card-body">
							<div class="form-group">
								<div class="form-row">
									<div class="col-md-6">
										<strong>Tax Info</strong>
										<br>
										<br>
										<div class="table-responsive">
											<table class="table table-bordered"  width="100%" cellspacing="0">
												<thead>
													<tr>
													  <th width="150px;">Employment Type: </th>
													  <td>{{ $client->employment_type }}</td>					
													</tr>
													<tr>
													  <th>UTR: </th>
													  <td>{{ $client->utr }}</td>					
													</tr>
													<tr>
													  <th>Authority Letter: </th>
													  <td>{{ $client->authority_letter }}</td>					
													</tr>
													<tr>
													  <th>Change Percentage: </th>
													  <td></td>					
													</tr>
													<tr>
													  <th>Payment Frequency: </th>
													  <td></td>					
													</tr>
													<tr>
													  <th>Commission: </th>
													  <td></td>					
													</tr>
													<tr>
													  <th>Date Converted: </th>
													  <td></td>					
													</tr>
												</thead>
												
											</table>
										</div>
									</div>
									<div class="col-md-6">
										<br>
										<br>
										<div class="table-responsive">
											<table class="table table-bordered"  width="100%" cellspacing="0">
												<thead>
													<tr>
													  <th width="150px;">National Insurance: </th>
													  <td>{{ $client->national_insurance }}</td>					
													</tr>
													<tr>
													  <th>648 Registered: </th>
													  <td>{{ $client->registered }}</td>					
													</tr>
													<tr>
													  <th>Bank Authority: </th>
													  <td>{{ $client->bank_authority }}</td>					
													</tr>
													<tr>
													  <th>Monthly Percentage: </th>
													  <td></td>					
													</tr>
													<tr>
													  <th>Pay Day: </th>
													  <td></td>					
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
						  <i class="fa fa-file" aria-hidden="true"></i>
						  Invoices</div>
					</div>
				</div>

			</div>
			</div>
	</div>
</div>
@endsection