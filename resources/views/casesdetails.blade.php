@extends('layouts.app')
@section('title', 'Cases Detail Profile | RMTG')
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
				<li class="breadcrumb-item active">Case Detail Profile</li>
			</ol>
			<div class="row">
				<div class="col-lg-4">
					<div class="card mb-3">
						<div class="card-header">
						  <i class="fa fa-suitcase"></i>
						  Case Profile</div>
						  <div class="card-body">
							<img src="{{ asset('images/profile-placeholder.gif')}}"  class="img-responsive" alt="">
						  </div>
						  <div class="card-footer small text-muted">
							<i class="fa fa-user" style="font-size:20px"></i><strong>
								{{ $opp->contacts }}
							</strong>
						  </div>
						  <div class="card-footer small text-muted">
							<i class="fa fa-envelope fa-lg" style="font-size:20px" aria-hidden="true"></i><strong> {{ $opp->email }} </strong>
						  </div>
						  <div class="card-footer small text-muted">
							<i class="fa fa-phone fa-lg" style="font-size:20px" aria-hidden="true"></i><strong> {{ $opp->phone_number }} </strong>
						  </div>
						   <div class="card-footer small text-muted">
							<i class="fa fa-building-o" style="font-size:20px" aria-hidden="true"></i><strong> {{ $opp->company }} </strong>
						  </div>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="card mb-3">
						<div class="card-header">
							<i class="fa fa-suitcase"></i>
							Case Detail
							<a href="{{ url('cases') }}" class="pull-right">Back to Cases</a>
						</div> 
						<div class="card-body">
							<a href="{{ action('CaseController@edit', $opp['id']) }}" class="pull-right btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Edit Case</a>
							
							<br>
							<br>
							<div class="form-group">
								<div class="form-row">
									<div class="col-md-6">
										<div class="table-responsive">
											<table class="table table-bordered"  width="100%" cellspacing="0">
												<thead>
													<tr>
														<th width="150px;">Tax Year: </th>
														<td>{{ $opp->tax_year }}</td>
													</tr>
													
													<tr>
													  <th>National Insurance: </th>
													  <td>{{ $opp->national_insurance }}</td>					
													</tr>
													<tr>
													  <th>648 Registered: </th>
													  <td>{{ $opp->registered }}</td>					
													</tr>
													<tr>
													  <th>Charge Percentage: </th>
													  <td>{{ $opp->charge_percentage }}</td>					
													</tr>
													
													<tr>
													  <th>Created By: </th>
													  <td>{{ $opp->created_at }}</td>					
													</tr>
												</thead>
											</table>
										</div>
									</div>
									<div class="col-md-6">
										<div class="table-responsive">
											<table class="table table-bordered"  width="100%" cellspacing="0">
												<thead>
													<tr>
														<th width="150px;">Case Storage: </th>
														<td>{{ $opp->case_stage }}</td>
													</tr>
													
													<tr>
														<th>UTR: </th>
														<td>{{ $opp->utr }}</td>
													</tr>
													<tr>
														<th>Authority Letter: </th>
														<td>{{ $opp->authority_letter }}</td>
													</tr>
													<tr>
														<th>Bank Authority: </th>
														<td>{{ $opp->bank_authority }}</td>
													</tr>
													<tr>
														<th>Last Modified By: </th>
														<td>{{ $opp->updated_at }}</td>
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
							Invoices
						  </div>
						  <div class="card-body">
								<div class="col-md-12">
									<div class="pull-right">
										<a href="" class="btn btn-success pull-right"><i class="fa fa-file"></i> New Invoice</a>
									</div>
									<div class="table-responsive">
										<table class="table table-bordered display" width="100%" cellspacing="0">
											<thead>
												<tr>
												  <th>Invoice Number</th>
												  <th>Item Code</th>
												  <th>Reference</th>
												  <th>Amount</th>
												  <th>VAT Amount</th>
												  <th>Total Amount</th>
												  <th>Amount Due</th>
												  <th>Status</th>
												  <th>Created Date</th>
												  <th>Created By</th>
												  <th>Action</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
												  <th>Invoice Number</th>
												  <th>Item Code</th>
												  <th>Reference</th>
												  <th>Amount</th>
												  <th>VAT Amount</th>
												  <th>Total Amount</th>
												  <th>Amount Due</th>
												  <th>Status</th>
												  <th>Created Date</th>
												  <th>Created By</th>
												  <th>Action</th>
												</tr>
											</tfoot>
											<tbody>
												<tr>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td>
													  <a href="" class="btn btn-success"><i class="fa fa-money" aria-hidden="true"></i>  Pay Invoices</a>
													</td>
												</tr>
											</tbody>
										</table>
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
									<a href="{{ url('cases/add-new-notes/id', $opp['id']) }}" class="btn btn-success pull-right"><i class="fa fa-sticky-note-o" aria-hidden="true"></i> Add New Notes</a>
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