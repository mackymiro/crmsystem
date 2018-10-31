@extends('layouts.app')
@section('title', 'Edit Profile | RMTG')
@section('content')
<div id="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Edit Profile</li>
          </ol>
		  
		  <form action="{{ action('UserProfileController@update', $id) }}" method="POST" enctype="multipart/form-data">
			{{csrf_field()}}
		    <input name="_method" type="hidden" value="POST">
		    <div class="row">
			 <div class="col-lg-4">
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fa fa-user"></i>
                  Profile</div>
                <div class="card-body">
					<img src="{{ asset('images/profile-placeholder.gif')}}"  class="img-responsive" alt="RMTG">
					<br>
					<input type="file" name="photo" />
				</div>
				
                <div class="card-footer small text-muted">
					<strong>
					@if(Auth::user()->role_type == 1)
						Account Type: User
					@elseif(Auth::user()->role_type == 2)
						Account Type: Manager
					@elseif(Auth::user()->role_type == 3)
						Account Type: Accountant
					@endif
					</strong>
				</div>
				<div class="card-footer small text-muted">
					 <strong>
						@if(Auth::user()->department == 1)
							Department: RMT Accountant
						@elseif(Auth::user()->department == 2)
							Department: RMT Client Manager/Sales
						@elseif(Auth::user()->department == 3)
							Department: RMT Resourcing
						@elseif(Auth::user()->department == 4)
							Department: Purple Buffalo/Support
						@endif
					  </strong>
				</div>
				
              </div>
			  <a href="{{ url('user-profile') }}">Go Back</a>
            </div>
			<div class="col-lg-8">
				<div class="card mb-3">
					<div class="card-header">
					<i class="fa fa-user-plus"></i>
					Profile Details</div>
				<div class="card-body">
                  <label>First Name;</label>
				  <input type="text" name="firstName" class="form-control" value="{{ $user->first_name }}" />
				  <label>Last Name;</label>
				  <input type="text" name="lastName" class="form-control" value="{{ $user->last_name }}" />
				  <label>Birthday;</label>
				   <div class="form-group">
					<div class="form-row">
						  <div  class="col-md-4">
							<select name="month" class="form-control">
								<option value="1">January</option>
								<option value="2">February</option>
								<option value="3">March</option>
								<option value="4">April</option>
								<option value="5">May</option>
								<option value="6">June</option>
								<option value="7">July</option>
								<option value="8">August</option>
								<option value="9">September</option>
								<option value="10">October</option>
								<option value="11">Novemeber</option>
								<option value="12">December</option>
							</select>
						  </div>
						
						  <div  class="col-md-4">
							<select name="day" class="form-control">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
								<option value="13">13</option>
								<option value="14">14</option>
								<option value="15">15</option>
								<option value="16">16</option>
								<option value="17">17</option>
								<option value="18">18</option>
								<option value="19">19</option>
								<option value="20">20</option>
								<option value="21">21</option>
								<option value="22">22</option>
								<option value="23">23</option>
								<option value="24">24</option>
								<option value="25">25</option>
								<option value="26">26</option>
								<option value="27">27</option>
								<option value="28">28</option>
								<option value="29">29</option>
								<option value="30">30</option>
								<option value="31">31</option>
							</select>
						  </div>
						  <div  class="col-md-4">
							<select name="year" class="form-control">
								<option value="1960">1970</option>
								<option value="1961">1971</option>
								<option value="1961">1972</option>
								<option value="1961">1973</option>
								<option value="1961">1974</option>
								<option value="1961">1975</option>
								<option value="1961">1976</option>
								<option value="1961">1977</option>
								<option value="1961">1978</option>
								<option value="1979">1979</option>
								<option value="1980">1980</option>
								<option value="1981">1981</option>
								<option value="1982">1982</option>
								<option value="1983">1983</option>
								<option value="1984">1984</option>
								<option value="1985">1985</option>
								<option value="1986">1986</option>
								<option value="1987">1987</option>
								<option value="1988">1988</option>
								<option value="1989">1989</option>
								<option value="1990">1990</option>
								<option value="1991">1991</option>
								<option value="1992">1992</option>
								<option value="1993">1993</option>
								<option value="1994">1994</option>
								<option value="1995">1995</option>
								<option value="1996">1996</option>
								<option value="1997">1997</option>
								<option value="1998">1998</option>
								<option value="1999">1999</option>
								<option value="2000">2000</option>
								<option value="2001">2001</option>
								<option value="2002">2002</option>
								<option value="2003">2003</option>
								<option value="2004">2004</option>
								<option value="2005">2005</option>
								<option value="2006">2006</option>
								<option value="2007">2007</option>
								<option value="2008">2008</option>
								<option value="2009">2009</option>
								<option value="2010">2010</option>
								<option value="2011">2011</option>
								<option value="2012">2012</option>
								<option value="2013">2013</option>
								<option value="2014">2014</option>
								<option value="2015">2015</option>
								<option value="2016">2016</option>
								<option value="2017">2017</option>
								<option value="2018">2018</option>
							</select>
						  </div>
					</div>
				  </div>
				  <label>Email Address;</label>
				  <input type="text" name="email" class="form-control" value="{{ $user->email }}" />
				  <label>Facebook Address;</label>
				  <input type="text" name="facebookAddress" class="form-control" value="{{ $user->facebook_address }}" />
				  <label>Account Type: </label>
				  <select name="roleType" class="form-control">
					<option value="1" {{ ( 1 == $user->role_type) ? 'selected' : '' }}>User</option>
					<option value="2" {{ ( 2 == $user->role_type) ? 'selected' : '' }}>Manager</option>
					<option value="3" {{ ( 3 == $user->role_type) ? 'selected' : '' }}>Accountant</option>
				  </select>
				  <label>Department: </label>
					<select name="department" class="form-control">
						<option value="1" {{ ( 1 == $user->department) ? 'selected' : '' }}>RMT Accountant</option>
						<option value="2" {{ ( 2 == $user->department) ? 'selected' : '' }}>RMT Client Mangers/Sales</option>
						<option value="3" {{ ( 3 == $user->department) ? 'selected' : '' }}>RMT Resourcing</option>
						<option value="4" {{ ( 4 == $user->department) ? 'selected' : '' }}>Purple Buffalo/Support</option>
					</select>
					<br>
					<input type="submit" class="btn btn-success pull-right"  value="Update" />
				</div>
				  
				</div>
			</div>
		</div>
		</form>
	</div>
</div>
@endsection