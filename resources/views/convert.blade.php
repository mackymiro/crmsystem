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
										<label>Case Name; </label>
										<input type="text" name="caseName" class="form-control" value="{{ old('caseName') }}" required />
										<label>Case Stage; </label>
										<div id="app-caseStage">
											<select name="caseStage" class="form-control">
												<option value="0">--Please Select--</option>
												<option v-for="caseStage in caseStages" v-bind:value="caseStage.value">
													@{{ caseStage.text }}
												</option>
											</select>
											@if ($errors->has('caseStage'))
												<div class="alert alert-danger">
													<strong>{{ $errors->first('caseStage') }}</strong>
												</div>
											@endif
										</div>
										<label>Estimated Amount; </label>
										<input type="text" name="estimatedAmount" value="{{ old('estimatedAmount') }}" class="form-control" />
										@if ($errors->has('estimatedAmount'))
											<div class="alert alert-danger">
												<strong>{{ $errors->first('estimatedAmount') }}</strong>
											</div>
										@endif
										<label>Final Amount; </label>
										<input type="text" name="finalAmount" value="{{ old('finalAmount') }}" class="form-control" />
										@if ($errors->has('finalAmount'))
											<div class="alert alert-danger">
												<strong>{{ $errors->first('finalAmount') }}</strong>
											</div>
										@endif
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
	//case stage
	new Vue({
	el: '#app-caseStage',
		data: {
			caseStages:[
				{ text:'STG-000001, collecting information', value: 'STG-000001, collecting information' },
				{ text:'STG-000002, earnings and expenses collecting', value: 'STG-000002, earnings and expenses collecting'},
				{ text:'STG-000003, awaiting 64/8 authorization', value: 'STG-000003, awaiting 64/8 authorization' },
				{ text:'STG-000004, submitted to HRMC', value: 'STG-000004,  submitted to HRMC' },
				{ text:'STG-000005, awaiting payment', value: 'STG-000005, awaiting payment' },
				{ text:'STG-000006, case completed', value: 'STG-000006, case completed' },
				{ text:'STG-000007, client paid', value: 'STG-000007, client paid' },
				{ text:'STG-000008, chosen for audit', value: 'STG-000008, chosen for audit' },
				{ text:'STG-000009, audit completed', value: 'STG-000009, audit completed' },
				{ text:'STG-0000010, invoice paid', value: 'STG-0000010, invoice paid' },
				{ text:'STG-0000011, for invoice', value: 'STG-0000011, for invoice' }	
			]
		}
		
	})
</script>
@endsection