@extends('layouts.app')
@section('title', 'Invoices | RMTG')
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
            <li class="breadcrumb-item active">Invoices</li>
		</ol>
		<div class="row">
			<div class="col-lg-12">
				<div class="card mb-3">
					 <div class="card-header">
						<i class="fa fa-credit-card"></i>
						Awaiting Payment</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered display" width="100%" cellspacing="0">
								<thead>
									<tr>
									  <th>Invoice</th>
									  <th width="200px;">Name</th>
									  <th width="200px;">Case No.</th>
									  <th width="200px;">Item</th>
									  <th width="190px;">Amount Due</th>
									  <th width="190px;">Status</th>
									  <th>Created Date</th>
									  <th>Created By</th>
									  <th>Action</th>
									</tr>
								</thead>
								<tfoot>
									
									<tr>
									  <th>Invoice</th>
									  <th>Name</th>
									  <th>Case No.</th>
									  <th>Item</th>
									  <th>Amount Due</th>
									  <th >Status</th>
									  <th>Created Date</th>
									  <th>Created By</th>
									  <th>Action</th>
									</tr>
									
								</tfoot>
								<tbody>
									@foreach($invoices as $invoice)
									<?php if($invoice['status'] == 1): ?>
									<tr>
										<td><a href="{{ url('cases/case-details/id', $invoice['case_id']) }}" >INV-{{ $invoice['invoice_number'] }}</a></td>
										<td>{{ $invoice['contact_name'] }}</td>
										<td>{{ $invoice['case_name'] }}</td>
										<td>{{ $invoice['item_code'] }}</td>
										<td>{{ $invoice['amount_due'] }}</td>
										<td>
											<?php if($invoice['status'] == 1): ?>
												<p class="alert alert-warning">Awaiting Payment</p>
											
											<?php endif; ?>
										</td>
										<td>{{ $invoice['created_at'] }}</td>
										<td>{{ $invoice['created_by'] }}</td>
										<td>
											<a href="{{ url('invoices/pay-invoices/id', $invoice['id']) }}" class="btn btn-success"><i class="fa fa-money" aria-hidden="true"></i> Pay Invoice(s)</a>
										</td>
									</tr>
									<?php endif; ?>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="card mb-3">
					<div class="card-header">
						<i class="fa fa-cc-visa"></i>
						Paid</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered display"  width="100%" cellspacing="0">
								<thead>
									<tr>
									  <th>Invoice</th>
									  <th width="200px;">Name</th>
									  <th width="200px;">Case No.</th>
									  <th width="200px;">Item</th>
									  <th width="190px;">Amount Due</th>
									  <th width="190px;">Status</th>
									  <th>Created Date</th>
									  <th>Created By</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
									  <th>Invoice</th>
									  <th>Name</th>
									  <th>Case No.</th>
									  <th>Item</th>
									  <th>Amount Due</th>
									  <th >Status</th>
									  <th>Created Date</th>
									  <th>Created By</th>
									</tr>
								</tfoot>
								<tbody>
									@foreach($invoices as $invoice)
									<?php if($invoice['status'] == 2): ?>
									<tr>
										<td><a href="{{ url('cases/case-details/id', $invoice['case_id']) }}">INV-{{ $invoice['invoice_number'] }}</a></td>
										<td>{{ $invoice['contact_name'] }}</td>
										<td>{{ $invoice['case_name'] }}</td>
										<td>{{ $invoice['item_code'] }}</td>
										<td>{{ $invoice['amount_due'] }}</td>
										<td>
											<?php if($invoice['status'] == 2): ?>
												<p class="alert alert-success">Paid</p>
											
											<?php endif; ?>
										</td>
										<td>{{ $invoice['created_at'] }}</td>
										<td>{{ $invoice['created_by'] }}</td>
									</tr>
									<?php endif; ?>
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