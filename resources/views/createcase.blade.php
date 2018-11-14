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
										<label>Case Name; </label>
										<input type="text" name="caseName" class="form-control" value="{{ old('caseName') }}" required />
										@if ($errors->has('caseName'))
											<div class="alert alert-danger">
												<strong>{{ $errors->first('caseName') }}</strong>
											</div>
										@endif
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
								</div>
							</div>
							<div class="form-group">
								<div class="form-row">
									<div class="col-md-3">
										<label>Desciption; </label>
										<input type="text" name="description" class="form-control" value="{{ old('description') }}" required />
										@if ($errors->has('description'))
											<div class="alert alert-danger">
												<strong>{{ $errors->first('description') }}</strong>
											</div>
										@endif
									</div>
									<div class="col-md-3">
										<label>Estimated Amount; </label>
										<input type="text" name="estimatedAmount" class="form-control" value="{{ old('estimatedAmount') }}" required />
										@if ($errors->has('estimatedAmount'))
											<div class="alert alert-danger">
												<strong>{{ $errors->first('estimatedAmount') }}</strong>
											</div>
										@endif
									</div>
									<div class="col-md-3">
										<label>Actual Amount; </label>
										<input type="text" name="actualAmount" class="form-control" value="{{ old('actualAmount') }}" required />
										@if ($errors->has('actualAmount'))
											<div class="alert alert-danger">
												<strong>{{ $errors->first('actualAmount') }}</strong>
											</div>
										@endif
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