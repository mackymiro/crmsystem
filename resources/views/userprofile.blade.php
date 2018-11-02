<?php error_reporting(0);?>
@extends('layouts.app')
@section('title', 'User Profile | RMTG')
@section('content')
<div id="content-wrapper">
	 <div class="container-fluid">
		  <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">User Profile</li>
          </ol>
		  
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
            </div>
            <div class="col-lg-8">
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fa fa-user-plus"></i>
                  Profile Details</div>
                <div class="card-body">
                  <label>First Name;</label>
					<p>{{ Auth::user()->first_name }}</p>
				  <label>Last Name;</label>
					<p>{{ Auth::user()->last_name }}</p>
				  <label>Birthday;
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
				  </label>
					<p>{{ $day }}-{{ $month }}-{{ $year }}</p>
				  <label>Email Address;</label>
				  <p>{{ Auth::user()->email }}</p>
				  <label>Facebook Address;</label>
				  <p>{{ Auth::user()->facebook_address }}</p>
				  <label>
				  @if(Auth::user()->department == 1)
						Department: RMT Accountant
					@elseif(Auth::user()->department == 2)
						Department: RMT Client Manager/Sales
					@elseif(Auth::user()->department == 3)
						Department: RMT Resourcing
					@elseif(Auth::user()->department == 4)
						Department: Purple Buffalo/Support
					@endif
				  </label>
			
					<br>
					<a href="{{ url('user-profile/id', $id) }}" class="btn btn-success pull-right" />Edit</a>
				</div>
				<?php 
					
					$updatedAt = date('d F, Y H:i:s', strtotime($user->updated_at));
					if(isset($updatedAt)){
						$updatedAt = date('d F, Y H:i:s', strtotime($user->updated_at));
					}else{
						$updatedAt = date('d F, Y H:i:s', strtotime($user->updated_at));
					}
				?>
                <div class="card-footer small text-muted">Updated at <?php echo $updatedAt; ?></div>
              </div>
            </div>
           
          </div>
	 </div>
</div>
<script src="{{ asset('resources/assets/js/components/index.js') }}" ></script>
@endsection
