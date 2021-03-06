<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
	
	
	<!-- Bootstrap core CSS-->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">
	
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	
	<script src="https://cdn.jsdelivr.net/npm/vue"></script>
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<?php $req = request()->route('id'); ?>
</head>
<body id="page-top">
	<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.html">RMTG</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fa fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
		<li class="nav-item dropdown no-arrow mx-1">
         
		  <a class="nav-link dropdown-toggle" href="#" aria-haspopup="true" aria-expanded="false">
			Welcome! {{ ucfirst(Auth::user()->first_name) }} {{ ucfirst(Auth::user()->last_name) }} <span class="caret"></span>
          </a>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           
            <span class="fa fa-bell"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-inbox "></i>
            
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
		
        <li class="nav-item dropdown no-arrow">
			
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="fa fa-user-circle"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
			
			<div class="dropdown-header text-center">
			 
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
			<div class="dropdown-header text-center">
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
			<a href="{{ url('user-profile') }}" class="dropdown-item"><i class="fa fa-user"></i> User Profile</a>
			<a href="{{ url('change-password') }}" class="dropdown-item"><i class="fa fa-key" aria-hidden="true"></i> Change Password</a>
			<a class="dropdown-item" href="{{ route('logout') }}"
				onclick="event.preventDefault();
						 document.getElementById('logout-form').submit();">
				<i class="fa fa-sign-out"></i>Logout
			</a>

			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				{{ csrf_field() }}
			</form>
          </div>
        </li>
      </ul>

    </nav>
	
	<div id="wrapper">
		 <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
		
        <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('home') }}">
            <i class="fa fa-tachometer"></i>
            <span>Dashboard</span>
          </a>
        </li>
		<?php if(Request::is('leads/create')): ?>
		<li class="nav-item {{ Request::is('leads/create') ? 'active' : '' }}">
          <a class="nav-link" href="{{ url('leads') }}">
            <i class="fa fa-line-chart" ></i> Leads
          </a>
        </li>
		<?php elseif(Request::is('leads/edit/id/'.$req)): ?>
		<li class="nav-item active">
          <a class="nav-link" href="{{ url('leads') }}">
            <i class="fa fa-line-chart" ></i> Leads
          </a>
        </li>
		<?php elseif(Request::is('leads/lead-details/id/'.$req)): ?>
		<li class="nav-item active">
          <a class="nav-link" href="{{ url('leads') }}">
            <i class="fa fa-line-chart" ></i> Leads
          </a>
        </li>
		<?php elseif(Request::is('leads/add-new-notes/id/'.$req)): ?>
		<li class="nav-item active">
          <a class="nav-link" href="{{ url('leads') }}">
            <i class="fa fa-line-chart" ></i> Leads
          </a>
        </li>
		<?php elseif(Request::is('leads/add-task/id/'.$req)): ?>
		<li class="nav-item active">
          <a class="nav-link" href="{{ url('leads') }}">
            <i class="fa fa-line-chart" ></i> Leads
          </a>
        </li>
		<?php else: ?>
		<li class="nav-item {{ Request::is('leads') ? 'active' : '' }}">
          <a class="nav-link" href="{{ url('leads') }}">
            <i class="fa fa-line-chart" ></i> Leads
          </a>
        </li>
		<?php endif; ?>
		
		<?php if(Request::is('clients/create')): ?>
		<li class="nav-item {{ Request::is('clients/create') ? 'active' : '' }}">
          <a class="nav-link" href="{{ url('clients') }}">
            <i class="fa fa-black-tie"></i> Clients
          </a>
        </li>
		<?php elseif(Request::is('clients/edit/id/'.$req)): ?>
		<li class="nav-item active">
          <a class="nav-link" href="{{ url('clients') }}">
            <i class="fa fa-black-tie"></i> Clients
          </a>
        </li>
		<?php elseif(Request::is('clients/client-details/id/'.$req)): ?>
		<li class="nav-item active">
          <a class="nav-link" href="{{ url('clients') }}">
            <i class="fa fa-black-tie"></i> Clients
          </a>
        </li>
		<?php elseif(Request::is('clients/add-task/id/'.$req)): ?>
		<li class="nav-item active">
          <a class="nav-link" href="{{ url('clients') }}">
            <i class="fa fa-black-tie"></i> Clients
          </a>
        </li>
		<?php elseif(Request::is('clients/add-new-notes/id/'.$req)): ?>
		<li class="nav-item active">
          <a class="nav-link" href="{{ url('clients') }}">
            <i class="fa fa-black-tie"></i> Clients
          </a>
        </li>
		<?php elseif(Request::is('clients/add-new-case/id/'.$req)): ?>
		<li class="nav-item active">
          <a class="nav-link" href="{{ url('clients') }}">
            <i class="fa fa-black-tie"></i> Clients
          </a>
        </li>
		
		<?php else: ?>
		<li class="nav-item {{ Request::is('clients') ? 'active' : '' }}">
          <a class="nav-link" href="{{ url('clients') }}">
            <i class="fa fa-black-tie"></i> Clients
          </a>
        </li>
		<?php endif; ?>
		
		<?php if(Request::is('cases/edit/id/'.$req)): ?>
		<li class="nav-item active">
          <a class="nav-link" href="{{ url('cases') }}">
            <i class="fa fa-suitcase"></i> Cases
          </a>
        </li>
		<?php elseif(Request::is('cases/case-details/id/'.$req)): ?>
		<li class="nav-item active">
          <a class="nav-link" href="{{ url('cases') }}">
            <i class="fa fa-suitcase"></i> Cases
          </a>
        </li>
		<?php elseif(Request::is('cases/add-new-notes/id/'.$req)): ?>
		<li class="nav-item active">
          <a class="nav-link" href="{{ url('cases') }}">
            <i class="fa fa-suitcase"></i> Cases
          </a>
        </li>
		<?php else: ?>
		<li class="nav-item {{ Request::is('cases') ? 'active' : '' }}">
          <a class="nav-link" href="{{ url('cases') }}">
            <i class="fa fa-suitcase"></i> Cases
          </a>
        </li>
		<?php endif; ?>
		
		<?php if(Request::is('tasks/create')): ?>
		<li class="nav-item active">
          <a class="nav-link" href="{{ url('tasks') }}">
           <i class="fa fa-tasks" aria-hidden="true"></i> Tasks
          </a>
        </li>
		
		<?php else: ?>
		<li class="nav-item {{ Request::is('tasks') ? 'active' : '' }}">
          <a class="nav-link" href="{{ url('tasks') }}">
           <i class="fa fa-tasks" aria-hidden="true"></i> Tasks
          </a>
        </li>
		<?php endif; ?>
		
		<li class="nav-item {{ Request::is('invoices') ? 'active' : '' }}">
          <a class="nav-link" href="{{ url('invoices') }}">
           <i class="fa fa-money" aria-hidden="true"></i> Invoices
          </a>
        </li>
        
		<li class="nav-item ">
          <a class="nav-link" href="#">
           <i class="fa fa-history" aria-hidden="true"></i> RECENTLY VIEWED (TODAY)
          </a>
        </li>
		<?php 
			//get the date today
			$date = date('Y-m-d');		
		?>	
		<?php foreach($views as $view): ?>
			<?php
				$createdAt = $view['created_at'];
				$cAt = explode(" ", $createdAt);
			?>
			<?php if($cAt[0] == $date): ?>
				<?php if($view['flag_status'] != "Close/Converted"): ?>
					<li class="nav-item ">
					  <?php if($view['status'] == "leads"): ?>
						  <a class="nav-link" href="{{ url('leads/lead-details/id/'.$view['lead_id']) }}">
						   <i class="fa fa-user-circle"></i> {{ $view['first_name']}} {{ $view['last_name']}}
						  </a>
					  <?php else: ?>
						<a class="nav-link" href="{{ url('clients/client-details/id/'.$view['client_id']) }}">
						   <i class="fa fa-user-circle"></i> {{ $view['first_name']}} {{ $view['last_name']}}
						</a>
					   <?php endif; ?>
					</li>
				<?php endif; ?>
			<?php endif; ?>
		<?php endforeach; ?>
		
      </ul>
	  @yield('content')
	  
	  <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © RMTG 2018</span>
            </div>
          </div>
        </footer>
	</div>
	
	
	<!-- Bootstrap core JavaScript-->
   
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('js/jquery.easing.min.js') }} "></script>

    <!-- Page level plugin JavaScript-->
    <script src="{{ asset('js/Chart.min.js') }} "></script>
    <script src="{{ asset('js/jquery.dataTables.js') }} "></script>
    <script src="{{ asset('js/dataTables.bootstrap4.js') }} "></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin.min.js') }} "></script>

    <!-- Demo scripts for this page-->
    <script src="{{ asset('js/datatables-demo.js') }}"></script>
    <script src="{{ asset('js/chart-area-demo.js') }} "></script>
    <!-- Scripts -->
    <!--<script src="{{ asset('js/app.js') }}"></script>-->	
	@if(Request::is('tasks/create'))
		
		<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
		<script type="text/javascript">

			$('.date').datepicker({  
				format: 'dd-mm-yyyy',
				todayHighlight: true,
				
			 });  

		</script>  
	
	@endif
	
	
	<?php if(Request::is('tasks/edit/id/'.$req)): ?>		
		<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
		<script type="text/javascript">

			$('.date').datepicker({  
				format: 'dd-mm-yyyy',
				todayHighlight: true,
				
			 });  

		</script>  
	
	<?php endif; ?>
	<?php if(Request::is('clients/add-task/id/'.$req)): ?>		
		<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
		<script type="text/javascript">

			$('.date').datepicker({  
				format: 'dd-mm-yyyy',
				todayHighlight: true,
				
			 });  

		</script>  
	
	<?php endif; ?>
	
	<?php if(Request::is('leads/add-task/id/'.$req)): ?>		
		<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
		<script type="text/javascript">

			$('.date').datepicker({  
				format: 'dd-mm-yyyy',
				todayHighlight: true,
				
			 });  

		</script>  
	
	<?php endif; ?>
</body>
</html>
