@extends('layouts.app')
@section('title', 'Leads Convert | RMTG')
@section('content')
<div id="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
		  <ol class="breadcrumb">
			<li class="breadcrumb-item">
			  <a href="#">Dashboard</a>
			</li>
			<li class="breadcrumb-item active">Leads Convert</li>
			
		  </ol>
		  <div class="row">
			<div class="col-lg-12">
				<div class="card mb-3">
					<div class="card-header">
					  <i class="fa fa-exchange" aria-hidden="true"></i>
					  Lead Conversion
					  <a href="{{ url('leads/lead-details/id', $lead['id']) }}" class="pull-right">Back to Leads Profile</a>
					</div>
					<div class="card-body">
						<p>Lead Conversion is the process of converting a lead into an account, clients, and/or opportunity.</p>
						
						<div class="form-group">
							<div class="form-row">
								
								<div style="clear:both;"></div>
								<div class="col-md-4">
									<form action="{{ action('LeadController@storeCase', $lead['id']) }}" method="POST">
										{{ csrf_field() }}
										<div class="table-responsive">
											<table class="table table-bordered"  width="100%" cellspacing="0">
												<thead>
													<tr >
														<th width="130px;">Lead Name: </th>
														<td>{{ $lead->first_name }} {{ $lead->last_name }}</td>					
													</tr>
													<tr >
														<th width="130px;">Company: </th>
														<td>{{ $lead->company }}</td>					
													</tr>
												</thead>
											
											</table>
										</div>
										@if(session('convertCreated'))
											<p class="alert alert-success">{{ Session::get('convertCreated') }}</p>
										@endif	
										<label>Tax Year; </label>
										<div id="app-taxYear">
											<select multiple name="taxYear[]" class="form-control">
												<option value="0">--Please Select--</option>
												<option v-for="taxYear in taxYears" v-bind:value="taxYear.value">
													@{{ taxYear.text }}
												</option>
											</select>
											@if ($errors->has('taxYear'))
												<div class="alert alert-danger">
													<strong>{{ $errors->first('taxYear') }}</strong>
												</div>
											@endif
											<i style="color:red;">you can select multiple tax year. To do: Ctrl + Click</i>
										</div>
										
										
										<br>
										<input type="checkbox" name="createCase"> <i>Do Not Create Case</i>
										<input type="hidden" name="title" value="{{ $lead->title }}" />
										<input type="hidden" name="firstName" value="{{ $lead->first_name }}" />
										<input type="hidden" name="middleName" value="{{ $lead->middle_name }}" />
										<input type="hidden" name="lastName"  value="{{ $lead->last_name }}" />
										<input type="hidden" name="dob" value="{{ $lead->dob }}" />
										<input type="hidden" name="profession" value="{{ $lead->profession }}" />
										<input type="hidden" name="phoneNumber" value="{{ $lead->phone_number}}"  />
										<input type="hidden" name="email" value="{{ $lead->email }}" />
										<input type="hidden" name="referral" value="{{ $lead->referral }}"  />
										<input type="hidden" name="mobileNumber" value="{{ $lead->mobile_number }}" />
										<input type="hidden" name="employmentType" value="{{ $lead->employment_type }}" />
										<input type="hidden" name="nationalInsurance" value="{{ $lead->national_insurance }}" />
										<input type="hidden" name="utr" value="{{ $lead->utr }}" />
										<input type="hidden" name="648reg" value="{{ $lead->registered }}" />
										<input type="hidden" name="authLetter"  value="{{ $lead->authority_letter }}" />
										<input type="hidden" name="bankAuth" value="{{ $lead->bank_authority }}" />
										<input type="hidden" name="streets" value="{{ $lead->streets }}" />
										<input type="hidden" name="city" value="{{ $lead->city }}" />
										<input type="hidden" name="province" value="{{ $lead->province }}" />
										<input type="hidden" name="zip" value="{{ $lead->zip }}" />
										<input type="hidden" name="country" value="{{ $lead->country }}" />
										<input type="hidden" name="description" value="{{ $lead->description }}" />
										<input type="hidden" name="leadStatus" value="Close/Converted" />
										<br>
										<br>
										<div class="pull-right">
											<button type="submit" class="btn btn-success">
												<i class="fa fa-save" style="font-size:24px"></i> Proceed
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>
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