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
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>
@endsection