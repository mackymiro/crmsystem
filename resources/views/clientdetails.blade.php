@extends('layouts.app')
@section('title', 'Client Detail Profile | RMTG')
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
					@if($client->contact_status == "Close/Converted")
						<div class="card mb-3">
							<div class="card-header">
								<i class="fa fa-cog"></i>
								Process
							</div> 
							<div class="card-body">
								<div class="form-group">
									<div class="form-row">
										<div class="col-md-12">
											<div class="table-responsive">
												<table class="table table-bordered"  width="100%" cellspacing="0">
													<thead>
														<tr >
															<?php
																$date = date('Y-m-d');
																//echo $date;
																//echo "<br>";
																//echo strtotime($date);
																$startTimeStamp = strtotime($client->updated_at);
																$endTimeStamp = strtotime($date);
																//echo $startTimeStamp; 
																
																$timeDiff = abs($endTimeStamp - $startTimeStamp);
																
																$numberDays = $timeDiff/86400;  // 86400 seconds in one day
																
																$numberDays = intval($numberDays);
																//echo $numberDays; 
																//echo "<br>";
															
															?>
															<?php if($client->process_profiled == 1): ?>
																<th class="alert alert-success">Profiled</th>
															<?php else: ?>
																<?php if($numberDays <= 2): ?>
																	<th width="120px;" class="">Profiled </th>
																<?php elseif($numberDays <= 3): ?>
																	<th width="120px;" class="alert alert-warning">Profiled </th>
																<?php elseif($numberDays >= 7): ?>
																	 <th width="120px;" class="alert alert-danger">Profiled </th>
																<?php elseif($numberDays == 1): ?>
																	 <th width="120px;" >Profiled </th>	
																<?php endif; ?>
															<?php endif; ?>
									
															<?php if($client->process_packout  == 1): ?>
																<th class="alert alert-success">Pack Out</th>
															<?php else: ?>
																<?php if($numberDays >= 2): ?>
																	<th width="120px;" class="">Pack Out </th>
																<?php elseif($numberDays >= 3): ?>
																	<th width="120px;" class="alert alert-warning">Pack Out </th>
																<?php elseif($numberDays >= 7): ?>
																	 <th width="120px;" class="alert alert-danger">Pack Out </th>
																<?php elseif($numberDays == 1): ?>
																	<th width="120px;" >Pack Out</th>	
																<?php else: ?>
																	<th>Pack Out</th>
																<?php endif; ?>
															
															<?php endif; ?>
															
															<?php if($client->process_pack_received == 1): ?>
																<th class="alert alert-success">Pack Received </th>
															<?php else: ?>
																<?php if($numberDays >= 2): ?>
																	<th width="120px;" class="">Pack Received </th>
																<?php elseif($numberDays >= 3): ?>
																	<th width="120px;" class="alert alert-warning">Pack Received </th>
																<?php elseif($numberDays >= 7): ?>
																	 <th width="120px;" class="alert alert-danger">Pack Received </th>
																<?php elseif($numberDays == 1): ?>
																	<th  >Pack Received</th>	
																<?php else: ?>
																	<th  >Pack Received</th>
																<?php endif; ?>
															
															<?php endif; ?>
															
															<?php if($client->process_in_processing): ?>
																<th>In Processing</th>
															<?php else: ?>
																<?php if($numberDays >= 2): ?>
																	<th width="120px;" class="">In Processing </th>
																<?php elseif($numberDays >= 3): ?>
																	<th width="120px;" class="alert alert-warning">In Processing </th>
																<?php elseif($numberDays >= 7): ?>
																	 <th width="120px;" class="alert alert-danger">In Processing </th>
																<?php elseif($numberDays == 1): ?>
																	<th  >In Processing</th>	
																<?php else: ?>
																	<th  >In Processing</th>
																<?php endif; ?>
															<?php endif; ?>
															<th>Submitted</th>
															<th>Money Received</th>
															<th>Client on Paylist</th>
															<th>Client Paid</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<?php if($client->process_profiled == 1): ?>
																<td class="alert alert-success">OK</td>
															<?php else: ?>
																
																<?php if($numberDays <= 2): ?>
																	<td class=""><?php echo $numberDays; ?> day(s)</td>
																<?php elseif($numberDays <= 3): ?>
																	<td class="alert alert-warning"><?php echo $numberDays; ?> day(s)</td>
																<?php elseif($numberDays >= 7): ?>
																	<td class="alert alert-danger"><?php echo $numberDays; ?> day(s)</td>
																<?php else: ?>
																	<td ></td>
																<?php endif; ?>
															<?php endif; ?>
															
															
															<?php if($client->process_packout == 1): ?>
																<td class="alert alert-success"><span>OK</span></td>
															<?php else: ?>
																<?php if($client->process_profiled == 1): ?>
																	<?php if($numberDays  <= 2): ?>
																		<td class=""><?php echo $numberDays; ?> day(s)</td>
																	<?php elseif(3 >= $numberDays): ?>
																		<td class="alert alert-warning"><?php echo $numberDays; ?> day(s)</td>
																	<?php elseif($numberDays <= 7): ?>
																		<td class="alert alert-danger"><?php echo $numberDays; ?> day(s)</td>
																	<?php else: ?>
																		<td ></td>
																	<?php endif; ?>
																<?php endif; ?>
															<?php endif; ?>
															
																		
															<?php if($client->process_pack_received == 1): ?>
																<td class="alert alert-success">OK</td>
															<?php else: ?>
																<?php if($client->process_packout == 1): ?>
																	
																	<?php if($numberDays <= 2): ?>
																		<td class=""><?php echo $numberDays; ?> day(s)</td>
																	<?php elseif($numberDays <= 3): ?>
																		<td class="alert alert-warning"><?php echo $numberDays; ?> day(s)</td>
																	<?php elseif($numberDays >= 7): ?>
																		<td class="alert alert-danger"><?php echo $numberDays; ?> days(s)</td>
																	<?php else: ?>
																		<td ></td>
																	<?php endif; ?>
																<?php endif; ?>
															<?php endif; ?>
															
															<?php if($client->process_in_processing == 1): ?>
																<td class="alert alert-success">OK</td>
															<?php else: ?>
																	<?php if($client->process_pack_received == 1): ?>
																	
																	<?php if($numberDays <= 2): ?>
																		<td class=""><?php echo $numberDays; ?> day(s)</td>
																	<?php elseif($numberDays <= 3): ?>
																		<td class="alert alert-warning"><?php echo $numberDays; ?> day(s)</td>
																	<?php elseif($numberDays >= 7): ?>
																		<td class="alert alert-danger"><?php echo $numberDays; ?> days(s)</td>
																	<?php else: ?>
																		<td ></td>
																	<?php endif; ?>
																<?php endif; ?>
															
															<?php endif; ?>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
														</tr>
													</tbody>
												</table>
											</div>
											<!--<a href="" class="pull-right btn btn-success"><i class="fa fa-info"></i> Client Paid</a>
											<a href="" class="pull-right btn btn-success" style="margin-right:8px;"><i class="fa fa-info"></i> Client on Paylist</a>
											<a href="" class="pull-right btn btn-success" style="margin-right:8px;"><i class="fa fa-info"></i> Money Received</a>
											<a href="" class="pull-right btn btn-success" style="margin-right:8px;"><i class="fa fa-info"></i> Submitted</a>-->
											<a href="{{ url('clients/in-processing/id', $client->id ) }}" class="pull-right btn btn-success" style="margin-right:8px;"><i class="fa fa-info"></i> In Processing</a>
											<?php if($client->process_pack_received != 1): ?>
												<?php if($client->process_packout == 1): ?>
												<a  href="{{ url('clients/pack-received/id', $client->id ) }}" class="pull-right btn btn-success" style="margin-right:8px;"><i class="fa fa-info"></i> Pack Received</a>
												<?php endif; ?>
											<?php endif; ?>
											
											<?php if($client->process_packout != 1): ?>					
												<?php if($client->process_profiled == 1): ?>
													<a href="{{ url('clients/pack-out/id', $client->id ) }}" class="pull-right btn btn-success" style="margin-right:8px;"><i class="fa fa-info"></i> Pack Out</a>
												<?php endif; ?>
											<?php endif; ?>
											<?php if($client->process_profiled != 1): ?>
												<a href="{{ url('clients/profiled/id', $client->id ) }}" class="pull-right btn btn-success" style="margin-right:8px;"><i class="fa fa-info"></i> Profiled</a>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					@endif
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

							<a href="{{ action('ClientController@edit', $client['id']) }}" class="pull-right btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Edit Profile</a>
							<a href="{{ url('clients/add-task/id', $client['id']) }}" class="pull-right btn btn-success" style="margin-right:8px;"><i class="fa fa-tasks" aria-hidden="true"></i> Add New Task</a>
							<a href="{{ url('clients/add-task/id', $client['id']) }}" class="pull-right btn btn-success" style="margin-right:8px;"><i class="fa fa-info" aria-hidden="true"></i> TOE</a>
							<br>
							<br>
							<div style="clear:both"></div>
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
													  <td>
														
														<?php $dob = $client->dob ?> 
														<?php
															$birthDate = explode("-", $dob);
															echo $birthDate[2]. "-";
															echo $birthDate[1]. "-";	
															echo $birthDate[0];
														?>
													  </td>					
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
													  <td>{{ $client->contact_status }}</td>					
													</tr>
													<tr>
													  <th>Country: </th>
													  <td>{{ $client->country }}</td>					
													</tr>
													<tr>
													  <th>Description: </th>
													  <td>{{ $client->description }}</td>					
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
													  <td>{{ $client->bank_name }}</td>					
													</tr>
													<tr>
													  <th>Bank Accnt. Number</th>
													  <td>{{ $client->bank_acct_number }}</td>					
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
													  <td>{{ $client->bank_shortcode }}</td>					
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
													  <td>{{ $client->change_percentage }}</td>					
													</tr>
													<tr>
													  <th>Payment Frequency: </th>
													  <td>{{ $client->payment_frequency }}</td>					
													</tr>
													<tr>
													  <th>Commission: </th>
													  <td>{{ $client->commission }}</td>					
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
													  <td>{{ $client->monthly_percentage }}</td>					
													</tr>
													<tr>
													  <th>Pay Day: </th>
													  <td>{{ $client->pay_day }}</td>					
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
													  <a href="" class="btn btn-success"><i class="fa fa-file"></i> Pay Invoices</a>
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
							Notes
						  </div>
						<div class="card-body">
							<div class="col-md-12">
								<div class="pull-right">
									<a href="{{ url('clients/add-new-notes/id', $client['id']) }}" class="btn btn-success pull-right"><i class="fa fa-sticky-note-o" aria-hidden="true"></i> Add New Notes</a>
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
					<div class="card mb-3">
						<div class="card-header">
						  <i class="fa fa-suitcase"></i>
							Cases
						</div>
						<div class="card-body">
							<div class="col-md-12">
								<div class="pull-right">
									<a href="{{ url('clients/add-new-case/id', $client['id']) }}" class="btn btn-success pull-right"><i class="fa fa-suitcase"></i> Add New Case</a>
								</div>
								<div class="table-responsive">
									<table class="table table-bordered display"  width="100%" cellspacing="0">
										<thead>
											<tr>
											  <th width="140px;">Code</th>
											  <th>Name</th>
											  <th>Tax Year</th>
											  <th>Created Date</th>
											  <th>Last Modified By</th>
											</tr>
										</thead>
										<tfoot>
											<tr>
											  <th>Code</th>
											  <th>Name</th>
											  <th>Tax Year</th>
											 
											  <th>Created Date</th>
											  <th>Last Modified By</th>
											</tr>
										</tfoot>
										<tbody>
											@foreach($cases as $case)
											<tr>
												<td><a href="{{ url('cases/case-details/id', $case->id) }}" title="OPP-{{ $case->code }}" >OPP-{{ $case->code }}</a></td>
												<td>{{ $case->contacts }}</td>
												<td>{{ $case->tax_year }}</td>
												
												<td>{{ $case->created_at }}</td>
												<td>{{ $case->email }}</td>
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
</div>
@endsection