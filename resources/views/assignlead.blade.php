@extends('layouts.app')
@section('title', 'Assign Owner | RMTG')
@section('content')
<div id="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Assign To Owner</li>
			
          </ol>
		  <div class="row">
			<div class="col-lg-6">
				<div class="card mb-3">
					<div class="card-header">
					  <i class="fa fa-user-circle"></i>
					  Assign To Owner
					  <a href="{{ url('leads') }}" class="pull-right">Back to Leads</a>
					</div>
					<div class="card-body">
						<label>All Users; </label>
						<form action="{{ action('LeadController@updateAssign', $leadID) }}" method="POST">
							{{csrf_field()}}
							<input name="_method" type="hidden" value="PATCH">
							
							<select name="users" class="form-control">
								@foreach($users as $user)
								 <option value="{{ $user['first_name'] }} {{ $user['last_name']}}">{{ $user['first_name'] }} {{ $user['last_name']}}</option>
								@endforeach()
							</select>
							<br>
							<br>
							<input type="submit" class="pull-right btn btn-success" value="Assign" />
						</form>
					</div>
				</div>
			</div>
		  </div>		   
	</div>
</div>
@endsection