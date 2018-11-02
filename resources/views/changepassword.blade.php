@extends('layouts.app')
@section('title', 'Change Password | RMTG')
@section('content')
<div id="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Change Password</li>
          </ol>
		  <div class="row">
			<div class="col-lg-12">
				<div class="card mb-3">
					<div class="card-header">
					<i class="fa fa-key"></i>
                     Change Password</div>
					<div class="card-body">
						<form action="{{ action('ChangePasswordController@update', $id) }}" method="POST">
							{{ csrf_field() }}
							<input name="_method" type="hidden" value="PATCH">
							@if(session('success'))
									<p class="alert alert-success">{{ Session::get('success') }}</p>
							@endif	
							@if(session('error'))
									<p class="alert alert-danger">{{ Session::get('error') }}</p>
							@endif	
							<label>Current Password;</label>
							<input type="password" name="currentPass" class="col-md-6 form-control" required />
							<label>New Password; </label>
							<input type="password" name="password" class="col-md-6 form-control" required />
						
							<label>Confirm New Password; </label>
							<input id="password-confirm" type="password" class="col-md-6 form-control" name="password_confirmation" required>
							@if ($errors->has('password'))
								<span class="alert alert-danger">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
							@endif
							<br>
							<br>
							<input type="submit" class="btn btn-success" value="Change Password" /> 
						</form>
					</div>
				</div>
			</div>
		  </div>
	</div>
</div>
@endsection