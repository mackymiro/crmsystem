@extends('layouts.app')
@section('title', 'Cases | RMTG')
@section('content')
<div id="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Cases</li>
          </ol>
		  <div class="row">
			<div class="col-lg-12">
				<div class="card mb-3">
					<div class="card-header">
					  <i class="fa fa-suitcase"></i>
					  Cases</div>
					  <div class="card-body">
						<a href="{{ url('cases/create') }}" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> New Case</a>
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
									  <th>Code</th>
									  <th>Case Name</th>
									  <th>Contact Name</th>
									  <th>Stage</th>
									  <th>Description</th>
									  <th>Estimated Amount</th>
									  <th>Actual Amount</th>
									  <th>Owner</th>
									  <th>Created Date</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
									  <th>Code</th>
									  <th>Case Name</th>
									  <th>Contact Name</th>
									  <th>Stage</th>
									  <th>Description</th>
									  <th>Estimated Amount</th>
									  <th>Actual Amount</th>
									  <th>Owner</th>
									  <th>Created Date</th>
									</tr>
								</tfoot>
								<tbody>
									@foreach($opps as $opp)
									<tr>
										<td><a href="{{ url('cases/case-details/id', $opp['id']) }}" >OPP-{{ $opp['code'] }}</a></td>
										<td>{{ $opp['case_name'] }}</td>
										<td>{{ $opp['contacts'] }}</td>
										<td>{{ $opp['case_stage'] }}</td>
										<td>{{ $opp['description'] }}</td>
										<td>{{ $opp['estimated_amount'] }}</td>
										<td>{{ $opp['actual_amount'] }}</td>
										<td>{{ $opp['owner'] }}</td>
										<td>{{ $opp['created_at'] }}</td>
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