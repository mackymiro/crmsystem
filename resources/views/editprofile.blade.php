<?php error_reporting(0);?>
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
				    <?php if($user->profile_photo == NULL ): ?>
						<img src="{{ asset('images/profile-placeholder.gif')}}"  class="img-responsive" alt="">
					<?php else: ?>
						<img src="/uploads/<?php echo $user->profile_photo; ?>"  width="284" height="295" class="img-responsive" alt="RMTG">
					<?php endif; ?>
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
				  @if(session('updated'))
						<p class="alert alert-success">{{ Session::get('updated') }}</p>
					@endif
					@if(session('err'))
						<p class="alert alert-danger">{{ Session::get('err') }}</p>
					@endif
                  <label>First Name;</label>
				  <input type="text" name="firstName" class="form-control" value="{{ $user->first_name }}" />
				  <label>Last Name;</label>
				  <input type="text" name="lastName" class="form-control" value="{{ $user->last_name }}" />
				  <label>Birthday;</label>
				   <div class="form-group">
					<div class="form-row">
						 <div  class="col-md-4">
							<?php
								$dob = explode("-", $user->dob);
								
								$year = isset($dob[0]);
								$month = isset($dob[1]);
								$day = isset($dob[2]); 
								
								if(isset($year)){
								   $year = $dob[0];
								}else{
								   $year = $dob[0];
								}
								
								if(isset($month)){
								   $month = $dob[1];
								}else{
									$month = $dob[1];
								}
								
								if(isset($day)){
								  $day = $dob[2]; 
								}else{
								   $day = $dob[2]; 
								}
											
							  ?>
							<select name="day" class="form-control">
								<option value="1" {{ ( 1 == $day) ? 'selected' : '' }}>1</option>
								<option value="2" {{ ( 2 == $day) ? 'selected' : '' }}>2</option>
								<option value="3" {{ ( 3 == $day) ? 'selected' : '' }}>3</option>
								<option value="4" {{ ( 4 == $day) ? 'selected' : '' }}>4</option>
								<option value="5" {{ ( 5 == $day) ? 'selected' : '' }}>5</option>
								<option value="6" {{ ( 6 == $day) ? 'selected' : '' }}>6</option>
								<option value="7" {{ ( 7 == $day) ? 'selected' : '' }}>7</option>
								<option value="8" {{ ( 8 == $day) ? 'selected' : '' }}>8</option>
								<option value="9" {{ ( 9 == $day) ? 'selected' : '' }}>9</option>
								<option value="10" {{ ( 10 == $day) ? 'selected' : '' }}>10</option>
								<option value="11" {{ ( 11 == $day) ? 'selected' : '' }}>11</option>
								<option value="12" {{ ( 12 == $day) ? 'selected' : '' }}>12</option>
								<option value="13" {{ ( 13 == $day) ? 'selected' : '' }}>13</option>
								<option value="14" {{ ( 14 == $day) ? 'selected' : '' }}>14</option>
								<option value="15" {{ ( 15 == $day) ? 'selected' : '' }}>15</option>
								<option value="16" {{ ( 16 == $day) ? 'selected' : '' }}>16</option>
								<option value="17" {{ ( 17 == $day) ? 'selected' : '' }}>17</option>
								<option value="18" {{ ( 18 == $day) ? 'selected' : '' }}>18</option>
								<option value="19" {{ ( 19 == $day) ? 'selected' : '' }}>19</option>
								<option value="20" {{ ( 20 == $day) ? 'selected' : '' }}>20</option>
								<option value="21" {{ ( 21 == $day) ? 'selected' : '' }}>21</option>
								<option value="22" {{ ( 22 == $day) ? 'selected' : '' }}>22</option>
								<option value="23" {{ ( 23 == $day) ? 'selected' : '' }}>23</option>
								<option value="24" {{ ( 24 == $day) ? 'selected' : '' }}>24</option>
								<option value="25" {{ ( 25 == $day) ? 'selected' : '' }}>25</option>
								<option value="26" {{ ( 26 == $day) ? 'selected' : '' }}>26</option>
								<option value="27" {{ ( 27 == $day) ? 'selected' : '' }}>27</option>
								<option value="28" {{ ( 28 == $day) ? 'selected' : '' }}>28</option>
								<option value="29" {{ ( 29 == $day) ? 'selected' : '' }}>29</option>
								<option value="30" {{ ( 30 == $day) ? 'selected' : '' }}>30</option>
								<option value="31" {{ ( 31 == $day) ? 'selected' : '' }}>31</option>
							</select>
						  </div>
						  <div  class="col-md-4">
							 
							<select name="month" class="form-control">
								<option value="1" {{ ( 1 == $month) ? 'selected' : '' }}>January</option>
								<option value="2" {{ ( 2 == $month) ? 'selected' : '' }}>February</option>
								<option value="3" {{ ( 3 == $month) ? 'selected' : '' }}>March</option>
								<option value="4" {{ ( 4 == $month) ? 'selected' : '' }}>April</option>
								<option value="5" {{ ( 5 == $month) ? 'selected' : '' }}>May</option>
								<option value="6" {{ ( 6 == $month) ? 'selected' : '' }}>June</option>
								<option value="7" {{ ( 7 == $month) ? 'selected' : '' }}>July</option>
								<option value="8" {{ ( 8 == $month) ? 'selected' : '' }}>August</option>
								<option value="9" {{ ( 9 == $month) ? 'selected' : '' }}>September</option>
								<option value="10" {{ ( 10 == $month) ? 'selected' : '' }}>October</option>
								<option value="11" {{ ( 11 == $month) ? 'selected' : '' }}>Novemeber</option>
								<option value="12" {{ ( 12 == $month) ? 'selected' : '' }}>December</option>
							</select>
						  </div>
						
						  
						  <div  class="col-md-4">
							<select name="year" class="form-control">
								<option value="1970" {{ ( 1970  == $year) ? 'selected' : '' }}>1970</option>
								<option value="1971" {{ ( 1971  == $year) ? 'selected' : '' }}>1971</option>
								<option value="1972" {{ ( 1972  == $year) ? 'selected' : '' }}>1972</option>
								<option value="1973" {{ ( 1973  == $year) ? 'selected' : '' }}>1973</option>
								<option value="1974" {{ ( 1974  == $year) ? 'selected' : '' }}>1974</option>
								<option value="1975" {{ ( 1975  == $year) ? 'selected' : '' }}>1975</option>
								<option value="1976" {{ ( 1976  == $year) ? 'selected' : '' }}>1976</option>
								<option value="1977" {{ ( 1977  == $year) ? 'selected' : '' }}>1977</option>
								<option value="1978" {{ ( 1978  == $year) ? 'selected' : '' }}>1978</option>
								<option value="1979" {{ ( 1979  == $year) ? 'selected' : '' }}>1979</option>
								<option value="1980" {{ ( 1980  == $year) ? 'selected' : '' }}>1980</option>
								<option value="1981" {{ ( 1981  == $year) ? 'selected' : '' }}>1981</option>
								<option value="1982" {{ ( 1982  == $year) ? 'selected' : '' }}>1982</option>
								<option value="1983" {{ ( 1983  == $year) ? 'selected' : '' }}>1983</option>
								<option value="1984" {{ ( 1984 == $year) ? 'selected' : '' }}>1984</option>
								<option value="1985" {{ ( 1985  == $year) ? 'selected' : '' }}>1985</option>
								<option value="1986" {{ ( 1986  == $year) ? 'selected' : '' }}>1986</option>
								<option value="1987" {{ ( 1987  == $year) ? 'selected' : '' }}>1987</option>
								<option value="1988" {{ ( 1988  == $year) ? 'selected' : '' }}>1988</option>
								<option value="1989" {{ ( 1989  == $year) ? 'selected' : '' }}>1989</option>
								<option value="1990" {{ ( 1990  == $year) ? 'selected' : '' }}>1990</option>
								<option value="1991" {{ ( 1991  == $year) ? 'selected' : '' }}>1991</option>
								<option value="1992" {{ ( 1992  == $year) ? 'selected' : '' }}>1992</option>
								<option value="1993" {{ ( 1993  == $year) ? 'selected' : '' }}>1993</option>
								<option value="1994" {{ ( 1994  == $year) ? 'selected' : '' }}>1994</option>
								<option value="1995" {{ ( 1995  == $year) ? 'selected' : '' }}>1995</option>
								<option value="1996" {{ ( 1996  == $year) ? 'selected' : '' }}>1996</option>
								<option value="1997" {{ ( 1997  == $year) ? 'selected' : '' }}>1997</option>
								<option value="1998" {{ ( 1998  == $year) ? 'selected' : '' }}>1998</option>
								<option value="1999" {{ ( 1999  == $year) ? 'selected' : '' }}>1999</option>
								<option value="2000" {{ ( 2000  == $year) ? 'selected' : '' }}>2000</option>
								<option value="2001" {{ ( 2001  == $year) ? 'selected' : '' }}>2001</option>
								<option value="2002" {{ ( 2002  == $year) ? 'selected' : '' }}>2002</option>
								<option value="2003" {{ ( 2003  == $year) ? 'selected' : '' }}>2003</option>
								<option value="2004" {{ ( 2004  == $year) ? 'selected' : '' }}>2004</option>
								<option value="2005" {{ ( 2005  == $year) ? 'selected' : '' }}>2005</option>
								<option value="2006" {{ ( 2006  == $year) ? 'selected' : '' }}>2006</option>
								<option value="2007" {{ ( 2007  == $year) ? 'selected' : '' }}>2007</option>
								<option value="2008" {{ ( 2008  == $year) ? 'selected' : '' }}>2008</option>
								<option value="2009" {{ ( 2009  == $year) ? 'selected' : '' }}>2009</option>
								<option value="2010" {{ ( 2010  == $year) ? 'selected' : '' }}>2010</option>
								<option value="2011" {{ ( 2011  == $year) ? 'selected' : '' }}>2011</option>
								<option value="2012" {{ ( 2012  == $year) ? 'selected' : '' }}>2012</option>
								<option value="2013" {{ ( 2013  == $year) ? 'selected' : '' }}>2013</option>
								<option value="2014" {{ ( 2014  == $year) ? 'selected' : '' }}>2014</option>
								<option value="2015" {{ ( 2015  == $year) ? 'selected' : '' }}>2015</option>
								<option value="2016" {{ ( 2016  == $year) ? 'selected' : '' }}>2016</option>
								<option value="2017" {{ ( 2017  == $year) ? 'selected' : '' }}>2017</option>
								<option value="2018" {{ ( 2018  == $year) ? 'selected' : '' }}>2018</option>
							</select>
						  </div>
					</div>
				  </div>
				  <label>Email Address;</label>
				  <input disabled type="text" name="email" class="form-control" value="{{ $user->email }}" />
				  <label>Facebook Address;</label>
				  <input type="text" name="facebookAddress" class="form-control" value="{{ $user->facebook_address }}" />
				  <label>Account Type: </label>
				  <select disabled name="roleType" class="form-control">
					<option value="1" {{ ( 1 == $user->role_type) ? 'selected' : '' }}>User</option>
					<option value="2" {{ ( 2 == $user->role_type) ? 'selected' : '' }}>Manager</option>
					<option value="3" {{ ( 3 == $user->role_type) ? 'selected' : '' }}>Accountant</option>
				  </select>
				  <label>Department: </label>
					<select disabled name="department" class="form-control">
						<option value="1" {{ ( 1 == $user->department) ? 'selected' : '' }}>RMT Accountant</option>
						<option value="2" {{ ( 2 == $user->department) ? 'selected' : '' }}>RMT Client Mangers/Sales</option>
						<option value="3" {{ ( 3 == $user->department) ? 'selected' : '' }}>RMT Resourcing</option>
						<option value="4" {{ ( 4 == $user->department) ? 'selected' : '' }}>Purple Buffalo/Support</option>
					</select>
					<br>
					<button type="submit" class="btn btn-success pull-right">
						<i class="fa fa-refresh" aria-hidden="true" style="font-size:24px"></i> Update Lead
					</button>
				</div>
				  
				</div>
			</div>
		</div>
		</form>
	</div>
</div>
@endsection