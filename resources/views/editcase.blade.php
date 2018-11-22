@extends('layouts.app')
@section('title', 'Edit Cases | RMTG')
@section('content')
<div id="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
				  <a href="#">Dashboard</a>
				</li>
				<li class="breadcrumb-item active">Edit Cases</li>
			</ol>
			<div class="row">
				<div class="col-lg-12">
					<div class="card mb-3">
						<div class="card-header">
						  <i class="fa fa-suitcase"></i>
						  Edit Cases
						  <a href="{{ url('cases/case-details/id', $id) }}" class="pull-right">Back to Case Profile</a>
						</div>
						<div class="card-body">
							<form action="{{ action('CaseController@update', $id) }}" method="POST">
							{{csrf_field()}}
							<input name="_method" type="hidden" value="PATCH">
							<div class="form-group">
								<div class="pull-right">
								<button type="submit" class="btn btn-success">
									<i class="fa fa-refresh" aria-hidden="true" style="font-size:24px"></i> Update Case
								</button>
									<br>
									<br>
									<br>
								</div>
								<br>
								<br>
								@if(session('clientUpdated'))
									<p class="alert alert-success">{{ Session::get('clientUpdated') }}</p>
								@endif
								<div class="form-row">
									<div class="col-md-3">
										<label>Contacts; </label>
										<?php 
											$contacts =  $opp->contacts;
											
										?>
										<select name="contacts" class="form-control">
											<option value="0">--Please Select--</option>
											@foreach($clients as $client)
												<option value="{{ $client['id'] }}-{{ $client['first_name'] }} {{ $client['last_name'] }}"
												<?php echo ($contacts == $client['first_name']." ".$client['last_name']) ? 'selected="selected"' : '' ?>  >{{ $client['first_name'] }} {{ $client['last_name'] }}</option>
											@endforeach
										</select>
									</div>
									<div class="col-md-3">
										<label>Tax Year; </label>
										<div id="app-taxYear">
											<select name="taxYear" class="form-control">
												<option value="0">--Please Select--</option>
												<option v-for="taxYear in taxYears" v-bind:value="taxYear.value"
													:selected="taxYear.value=={{json_encode($opp->tax_year)}}?true : false">
													@{{ taxYear.text }}
												</option>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<label>National Insurance; </label>
										<input type="text" name="nationalInsurance" class="form-control" value="{{ $opp->national_insurance }}"  />
									</div>
									<div class="col-md-3">
										<label>648 Registered; </label>
										<input type="text" name="648reg" class="form-control" value="{{ $opp->registered }}"  />
									</div>
								</div>
							</div>
						
							<div class="form-group">
								<div class="form-row">
									<div class="col-md-3">
										<label>Charge Percentage; </label>
										<input type="text" name="chargePercentage" class="form-control" value="{{ $opp->charge_percentage }}"  />
									</div>
									<div class="col-md-3">
										<label>UTR; </label>
										<input type="text" name="utr" class="form-control" value="{{ $opp->utr }}"  />
									</div>
									<div class="col-md-3">
										<label>Authority Letter; </label>
										<input type="text" name="authLetter" class="form-control" value="{{ $opp->authority_letter }}"  />
									</div>
									<div class="col-md-3">
										<label>Bank Authority; </label>
										<input type="text" name="bankAuth" class="form-control" value="{{ $opp->bank_authority }}"  />
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="form-row">
									<div class="col-md-3">
										<label>Email Adress; </label>
										<input type="text" name="email" class="form-control" value="{{ $opp->email }}"  />
									</div>
									<div class="col-md-3">
										<label>Phone Number; </label>
										<input type="text" name="phoneNumber" class="form-control" value="{{ $opp->phone_number }}"  />
									</div>
									<div class="col-md-3">
										<label>Company; </label>
										<input type="text" name="company" class="form-control" value="{{ $opp->company }}"  />
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