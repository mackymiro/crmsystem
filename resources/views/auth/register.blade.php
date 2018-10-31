@extends('layouts.login')
@section('title', 'Register| RMTG')
@section('loginContent')
<div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Register an Account</div>
        <a style="text-align:center;" class="navbar-brand" href="{{ url('/') }}">
			<img src="{{ asset('images/purple_buffalo.png')}}" width="160" height="100" class="img-responsive" alt="Purple Buffalo">
		</a>
		<div class="card-body">
          <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
			@if(session('success'))
					<p class="alert alert-success">{{ Session::get('success') }}</p>
			@endif	
			<div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group{{ $errors->has('firstName') ? ' has-error' : '' }}">
                    <input id="firstName" type="text" class="form-control" name="firstName" value="{{ old('firstName') }}" required autofocus>
                    <label for="firstName">First name</label>
					 @if ($errors->has('firstName'))
						<span class="help-block">
							<strong>{{ $errors->first('firstName') }}</strong>
						</span>
					@endif
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
                   <input id="lastName" type="text" class="form-control" name="lastName" value="{{ old('lastName') }}" required autofocus>
                    <label for="lastName">Last name</label>
					@if ($errors->has('name'))
						<span class="help-block">
							<strong>{{ $errors->first('lastName') }}</strong>
						</span>
					@endif
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <div class="form-label-group">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                <label for="inputEmail">Email address</label>
				@if ($errors->has('email'))
					<span class="help-block">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
				@endif
              </div>
            </div>
            <div class="form-group">
				<div class="form-row">
					<div class="col-md-6">
					  <div class="form-label-group{{ $errors->has('password') ? ' has-error' : '' }}">
						 <input id="password" type="password" class="form-control" name="password" required>
						<label for="inputPassword">Password</label>
						 @if ($errors->has('password'))
							<span class="help-block">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
						@endif
					  </div>
					</div>
					<div class="col-md-6">
					  <div class="form-label-group">
						<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
						<label for="confirmPassword">Confirm password</label>
					  </div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="form-row">
					<div class="col-md-6">
					  <div class="form-label-group">
						
						<select name="roleType" class="form-control">
							<option value="1">User</option>
							<option value="2">Manager</option>
							<option value="3">Accountant</option>
						</select>
					
					  </div>
					</div>
					<div class="col-md-6">
					  <div class="form-label-group">
						
						<select name="department" class="form-control">
							<option value="1">RMT Accountant</option>
							<option value="2">RMT Client Mangers/Sales</option>
							<option value="3">RMT Resourcing</option>
							<option value="4">Purple Buffalo/Support</option>
						</select>
					
					  </div>
					</div>
				</div>
			</div>

			<button type="submit" class="btn btn-primary btn-block">
				Register
			</button>
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="{{ route('login') }}">Login Page</a>
            <a class="d-block small" href="{{ route('password.request') }}">Forgot Password?</a>
          </div>
        </div>
      </div>
</div>
@endsection
