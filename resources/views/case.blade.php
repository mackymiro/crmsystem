@extends('layouts.app')
@section('title', 'Cases | RMTG')
@section('content')
<script type="text/javascript">
	function confirmDelete(id){
		var x =confirm("Do you want to delete this?");
		if(x){
			$.ajax({
				type: "DELETE",
				url: '/cases/delete/' + id,
				data:{
					_method: 'delete',
					"_token": "{{ csrf_token() }}",
					"id": id
					
				},
				success:function(data){
					console.log(data);
					$("#deletedId"+id).fadeOut('slow');
				},
				error: function(data){
					console.log('Error:', data);
				}
				
			});
		}else{
			return false;
		}
	}
</script>
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
									  @if(Auth::user()->role_type == 2)
										<th width="10px;">Action</th>
									  @endif
									  <th width="140px;">Code</th>
									  <th width="120px;">Tax Year</th>
									  <th width="200px;">Contact Name</th>
									  <th width="130px;">Owner</th>
									  <th width="130px;">Created Date</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
									  @if(Auth::user()->role_type == 2)
										<th>Action</th>
									  @endif
									  <th>Code</th>
									  <th>Tax Year</th>
									  <th>Contact Name</th>
									  <th>Owner</th>
									  <th>Created Date</th>
									</tr>
								</tfoot>
								<tbody>
									@foreach($opps as $opp)
									<tr id="deletedId{{ $opp['id'] }}">	
										@if(Auth::user()->role_type == 2)
											<td>
												<a title="Delete" onclick="confirmDelete('{{ $opp['id'] }}')" href="javascript:void(0);"><i class="fa fa-trash" aria-hidden="true"></i></a>
											</td>
										@endif
										<td><a title="OPP-{{ $opp['code'] }}" href="{{ url('cases/case-details/id', $opp['id']) }}" >OPP-{{ $opp['code'] }}</a></td>
										<td>{{ $opp['tax_year'] }}</td>
										<td>{{ $opp['contacts'] }}</td>
									
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