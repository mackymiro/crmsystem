@extends('layouts.app')
@section('title', 'Cases New Invoice | RMTG')
@section('content')

<div id="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
			  <a href="#">Dashboard</a>
			</li>
			<li class="breadcrumb-item active">Cases New Invoice</li>
		</ol>
		<div class="row">
			<div class="col-lg-12">
				<div class="card mb-3">
					<div class="card-header">
						<i class="fa fa-file"></i>
						New Invoice</div>
					<div class="card-body">
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-6" >
									<div class="table-responsive">
									<form action="{{ action('CaseController@addNewInvoice', $id) }}" method="post">
										{{ csrf_field() }}
										@if(session('casesNewInvoice'))
											<p class="alert alert-success">{{ Session::get('casesNewInvoice') }}</p>
										@endif
										<table class="table table-bordered"  width="100%" cellspacing="0">
											
											<thead>
												<tr>
													<th width="150px;">Contact Name: </th>
													<td>{{ $opp->contacts }}</td>
												</tr>
												<tr>
													<th>Case Number:</th>
													<td>OPP -{{ $opp->code }}</td>
												</tr>
												<tr>
													<th>Case Name:</th>
													<td>{{ $opp->tax_year }}</td>
												</tr>
												<tr>
													<th>Item Code:</th>
													<td>
														<div id="app-item">
															<select name="itemCode" class="form-control">
																<option v-for="item in items" v-bind:value="item.value">
																	@{{ item.text }}
																</option>
															</select>
														</div>
													</td>
												</tr>
												<tr>
													<th>Notes: </th>
													<td>
														<input type="text" name="notes" class="form-control" />
													</td>
												</tr>
												<tr>
													
													<th>Amount: </th>
													
													<td><input id="amount" type="text" name="amount" class="form-control" required />
														
													</td>
												</tr>
												<tr>
													<th>VAT 20% Amt: </th>
													<td>
														<input id="vatAmt" type="text" name="vatAmount" class="form-control" />
													</td>
												</tr>
												<tr>
													<th>Total Amount: </th>
													<td>
														<span id="totalAmount"></span>
													</td>
												</tr>
												
											</thead>
										</table>
										<div class="pull-right">
											<input type="hidden" name="contactName" value="{{ $opp->contacts }}" />
											<input type="hidden" name="caseName" value="{{ $opp->tax_year }}" />
											<input type="hidden" name="clientId" value="{{ $opp->client_id }}" />
											<button type="submit" class="btn btn-success">
												<i class="fa fa-save" aria-hidden="true" style="font-size:24px"></i> Save
											</button>
										</div>
									</form>
									</div>
								</div>	
								<div class="col-md-6" >
									<h3>Amount Due: £ <span id="amountValue"></span></h3>	
									
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
	  $( "#amount" ).keyup(function() {
		var value = $( this ).val();
	 
	  })
	  
	  $("#vatAmt").keyup(function () {

			var value = parseInt($("#amount").val()); // <--- here
			var valueVat = parseInt($(this).val()); // <--- and here
			var sum = value + valueVat;
			$("#totalAmount").text(sum);
			$("#amountValue").text(sum);

		}).keyup();
	  
	 
</script>
<script>
	//Item code
	new Vue({
	el: '#app-item',
		data: {
			items:[
				{ text:'Tax Returns', value: 'Tax Returns' },
				{ text:'UTR Filing', value: 'UTR Filing'}
			]
		}
	})
	
	
</script>

@endsection