@extends('layouts.app')
@section('title', 'Client Add New Case | RMTG')
@section('content')
<div id="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Clients Add New Case</li>
			
          </ol>
		  <div class="row">
			<div class="col-lg-12">
				<div class="card mb-3">
					<div class="card-header">
					  <i class="fa fa-suitcase"></i>
					  Create New Cases
					  <a href="{{ url('clients/client-details/id', $id) }}" class="pull-right">Back to Client Profile</a>
					</div>
					<div class="card-body">
						<form action="{{ action('ClientController@storeCase') }}" method="POST">
							{{ csrf_field() }}
							<div class="form-group">
								<div class="form-row">
									<div class="col-md-12">
										@if(session('clientCase'))
											<p class="alert alert-success">{{ Session::get('clientCase') }}</p>
										@endif	
									</div>
									<div class="col-md-3">
										<label>Tax Year;</label>
										<div id="app-taxYear">
											<select name="taxYear" class="form-control">
												<option value="0">--Please Select--</option>
												<option v-for="taxYear in taxYears" v-bind:value="taxYear.value">
													@{{ taxYear.text }}
												</option>
											</select>
										</div>
									</div>
									
									
								</div>
							</div>
							
							<div class="form-group">
								<div class="form-row">
									<div class="col-md-12">
										<div class="pull-right">
											<input type="hidden" name="clientId" value="{{ $client->id }}">
											<input type="hidden" name="contacts" value="{{ $client->first_name }} {{ $client->last_name }}" />
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