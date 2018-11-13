@extends('layouts.app')
@section('title', 'Add New Notes Clients | RMTG')
@section('content')
<div id="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
				  <a href="#">Dashboard</a>
				</li>
				<li class="breadcrumb-item active">Add New Notes Clients</li>
			</ol>
			<div class="row">
				<div class="col-lg-12">
					<div class="card mb-3">
						<div class="card-header">
						  <i class="fa fa-sticky-note-o"></i>
						  Add New Notes
						 <a href="{{ url('clients/client-details/id', $id) }}" class="pull-right">Back to Client Detail Profile</a>  
						</div>
						<div class="card-body">
							<div class="form-group">
								<div class="form-row">
									<div class="col-md-8">
										<form action="{{ action('ClientController@storeNotes', $id) }}" method="POST" enctype="multipart/form-data">
											<label>Description of Notes;</label>
											@if(session('notesAdded'))
												<p class="alert alert-success">{{ Session::get('notesAdded') }}</p>
											@endif
											<textarea name="description" class="form-control" rows="10" cols="10" required></textarea>
											<br>
											<br>
											<input type="file" name="files" />
											@if ($errors->has('files'))
												<div class="alert alert-danger">
													<strong>{{ $errors->first('files') }}</strong>
												</div>
											@endif
											<br>
											<br>
											<div class="pull-right">
												<button type="submit" class="btn btn-success">
													<i class="fa fa-save" style="font-size:24px"></i> Save Notes
												</button>
												<button type="reset" class="btn btn-danger">
													<i class="fa fa-eraser" style="font-size:24px"></i>Clear 
												</button>
											</div>
											{{csrf_field()}}
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
@endsection