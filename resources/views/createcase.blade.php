@extends('layouts.app')
@section('title', 'Create Case | RMTG')
@section('content')
<div id="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Create Cases</li>
			
          </ol>
		  <div class="row">
			<div class="col-lg-12">
				<div class="card mb-3">
					<div class="card-header">
					  <i class="fa fa-suitcase"></i>
					  Create New Cases
					  <a href="{{ url('cases') }}" class="pull-right">Back to Cases</a>
					</div>
					<div class="card-body">
						<form action="{{ action('CaseController@store') }}" method="POST">
							{{ csrf_field() }}
							<div class="form-group">
								<div class="form-row">
									<div class="col-md-12">
										@if(session('caseCreated'))
											<p class="alert alert-success">{{ Session::get('caseCreated') }}</p>
										@endif	
									</div>
									<div class="col-md-3">
										<label>Contacts; </label>
										<select name="contacts" class="form-control">
											<option value="0">--Please Select--</option>
											@foreach($clients as $client)
												<option value="{{ $client['id'] }}-{{ $client['first_name'] }} {{ $client['last_name'] }}">{{ $client['first_name'] }} {{ $client['last_name'] }}</option>
											@endforeach
										</select>
										@if ($errors->has('contacts'))
											<div class="alert alert-danger">
												<strong>{{ $errors->first('contacts') }}</strong>
											</div>
										@endif
										
									</div>
									<div class="col-md-3">
										<label>Tax Year; </label>
										<div id="app-taxYear">
											<select multiple name="taxYear[]" class="form-control">
												<option value="0">--Please Select--</option>
												<option v-for="taxYear in taxYears" v-bind:value="taxYear.value">
													@{{ taxYear.text }}
												</option>
											</select>
											<i style="color:red;">you can select multiple tax year</i>
											@if ($errors->has('taxYear'))
												<div class="alert alert-danger">
													<strong>{{ $errors->first('taxYear') }}</strong>
												</div>
											@endif
										</div>
									</div>
									
								</div>
							</div>
							
							<div class="form-group">
								<div class="form-row">
									<div class="col-md-12">
										<div class="pull-right">
											<button type="submit" class="btn btn-success">
												<i class="fa fa-save" style="font-size:24px"></i> Add Cases
											</button>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		  </div>
		  
	</div>
</div>

<script>
	//tax year
	new Vue({
	el: '#app-taxYear',
		data: {
			taxYears:[
				{ text:'2011-2012', value: '2011-2012' },
				{ text:'2012-2013', value: '2012-2013'},
				{ text:'2013-2014', value: '2013-2014' },
				{ text:'2014-2015', value: '2014-2015' },
				{ text:'2015-2016', value: '2015-2016' },
				{ text:'2016-2017', value: '2016-2017' },
				{ text:'2017-2018', value: '2017-2018' }
				
			]
		}
	})
</script>
@endsection