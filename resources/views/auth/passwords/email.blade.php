@extends('layouts.login')

@section('loginContent')
<div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Reset Password</div>
        <a style="text-align:center;" class="navbar-brand" href="{{ url('/') }}">
			<img src="{{ asset('images/purple_buffalo.png')}}" width="160" height="100" class="img-responsive" alt="Purple Buffalo">
		</a>
		<div class="panel-body">
			@if (session('status'))
				<div class="alert alert-success">
					{{ session('status') }}
				</div>
			@endif

			<form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
				{{ csrf_field() }}

				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					<label for="email" class="col-md-12 control-label">E-Mail Address</label>

					<div class="col-md-12">
						<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

						@if ($errors->has('email'))
							<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
						@endif
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn btn-primary">
							Send Password Reset Link
						</button>
					</div>
				</div>
			</form>
		</div>
      </div>
</div>
@endsection
