@extends('layouts.app')
@section('title', 'Leads Convert | RMTG')
@section('content')
<div id="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
		  <ol class="breadcrumb">
			<li class="breadcrumb-item">
			  <a href="#">Dashboard</a>
			</li>
			<li class="breadcrumb-item active">Leads Convert</li>
			
		  </ol>
		  <div class="row">
			<div class="col-lg-12">
				<div class="card mb-3">
					<div class="card-header">
					  <i class="fa fa-exchange" aria-hidden="true"></i>
					  Lead Conversion
					  <a href="{{ url('leads/lead-details/id', $lead['id']) }}" class="pull-right">Back to Leads Profile</a>
					</div>
					<div class="card-body">
						<p>Lead Conversion is the process of converting a lead into an account, clients, and/or opportunity.</p>
						
						<div class="form-group">
							<div class="form-row">
								
								<div style="clear:both;"></div>
								<div class="col-md-4">
									
									<div class="table-responsive">
										<table class="table table-bordered"  width="100%" cellspacing="0">
											<thead>
												<tr >
													<th width="130px;">Lead Name: </th>
													<td></td>					
												</tr>
												<tr >
													<th width="130px;">Company: </th>
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
			</div>
		   </div>
	</div>
</div>
@endsection