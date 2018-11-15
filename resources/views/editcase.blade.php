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
							<div class="form-group">
								<div class="form-row">
									<div class="col-md-3">
										<label>Contacts; </label>
										<select name="contacts" class="form-control">
											<option></option>
										</select>
									</div>
									<div class="col-md-3">
										<label>Case Name; </label>
										<input type="text" name="caseName" class="form-control" value=""  />
									</div>
									<div class="col-md-3">
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
										
									</div>
									<div class="col-md-3">
										<label>Desciption; </label>
										<input type="text" name="description" class="form-control" value="{{ $opp->description }}"  />
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="form-row">
									<div class="col-md-3">
										<label>Estimated Amount; </label>
										<input type="text" name="estimatedAmount" class="form-control" value="{{ $opp->estimated_amount }}"  />
									</div>
									<div class="col-md-3">
										<label>Actual Amount; </label>
										<input type="text" name="actualAmount" class="form-control" value="{{ $opp->actual_amount }}"  />
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
										<input type="text" name="chargePercentage" class="form-control" value=""  />
									</div>
									<div class="col-md-3">
										<label>UTR; </label>
										<input type="text" name="utr" class="form-control" value=""  />
									</div>
									<div class="col-md-3">
										<label>Authority Letter; </label>
										<input type="text" name="authLetter" class="form-control" value=""  />
									</div>
									<div class="col-md-3">
										<label>Bank Authority; </label>
										<input type="text" name="bankAuth" class="form-control" value=""  />
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="form-row">
									<div class="col-md-3">
										<label>Email Adress; </label>
										<input type="text" name="email" class="form-control" value=""  />
									</div>
									<div class="col-md-3">
										<label>Phone Number; </label>
										<input type="text" name="phoneNumber" class="form-control" value=""  />
									</div>
									<div class="col-md-3">
										<label>Company; </label>
										<input type="text" name="company" class="form-control" value=""  />
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="form-row">
									<div class="col-md-12">
										<div class="pull-right">
										<button type="submit" class="btn btn-success">
											<i class="fa fa-refresh" aria-hidden="true" style="font-size:24px"></i> Update Case
											</button>
											<br>
											<br>
											<br>
										</div>
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