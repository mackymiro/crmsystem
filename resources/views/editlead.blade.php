@extends('layouts.app')
@section('title', 'Edit Leads | RMTG')
@section('content')
<?php error_reporting(0);?>
<div id="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Edit Leads</li>
			
          </ol>
		  <div class="row">
			<div class="col-lg-12">
				<div class="card mb-3">
					<div class="card-header">
					  <i class="fa fa-line-chart"></i>
					  Edit Leads
					  <a href="{{ url('leads') }}" class="pull-right">Back to Leads</a>
					</div>
					<form action="{{ action('LeadController@update', $id) }}" method="POST">
					{{csrf_field()}}
					<input name="_method" type="hidden" value="PATCH">
					<div class="card-body">
						<div class="form-group">
							<p>Lead Information</p>
							<div class="pull-right">
								<button type="submit" class="btn btn-success">
									<i class="fa fa-refresh" aria-hidden="true" style="font-size:24px"></i> Update Lead
								</button>
							</div>
							<br>
							<br>
							 @if(session('leadUpdated'))
								<p class="alert alert-success">{{ Session::get('leadUpdated') }}</p>
							@endif
							<div class="form-row">
								<div class="col-md-2">
									<label>Title; </label>
									<div id="app-title">
										<select name="title" class="form-control">
										  <option v-for="option in options" v-bind:value="option.value"
											:selected="option.value=={{json_encode($lead->title)}}?true : false">
											@{{ option.text }}
										  </option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<label>First Name; </label>
									<input type="text" name="firstName" class="form-control" value="{{ $lead->first_name}}" />
									
								</div>
								<div class="col-md-4">
									<label>Last Name; </label>
									<input type="text" name="lastName" class="form-control"  value="{{ $lead->last_name }}" />
									
								</div>
								<div class="col-md-2">
									<label>Middle Name; </label>
									<input type="text" name="middleName" class="form-control" value="{{ $lead->middle_name }}" />
									
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-6">
									<label>Company; </label>
									<input type="text" name="company" class="form-control"  value="{{ $lead->company }}" />
									
								</div>
								<div class="col-md-2">
									<?php
										$dob = explode("-", $lead->dob);
										$year = $dob[0];
										$month = $dob[1];
										$day = $dob[2]; 
									
									?>
									<label>Birthday; </label>
									<select name="day" class="form-control">
										<option value="1" {{ ( 1 == $day) ? 'selected' : '' }}>1</option>
										<option value="2" {{ ( 2 == $day) ? 'selected' : '' }}>2</option>
										<option value="3" {{ ( 3 == $day) ? 'selected' : '' }}>3</option>
										<option value="4" {{ ( 4 == $day) ? 'selected' : '' }}>4</option>
										<option value="5" {{ ( 5 == $day) ? 'selected' : '' }}>5</option>
										<option value="6" {{ ( 6 == $day) ? 'selected' : '' }}>6</option>
										<option value="7" {{ ( 7 == $day) ? 'selected' : '' }}>7</option>
										<option value="8" {{ ( 8 == $day) ? 'selected' : '' }}>8</option>
										<option value="9" {{ ( 9 == $day) ? 'selected' : '' }}>9</option>
										<option value="10" {{ ( 10 == $day) ? 'selected' : '' }}>10</option>
										<option value="11" {{ ( 11 == $day) ? 'selected' : '' }}>11</option>
										<option value="12" {{ ( 12 == $day) ? 'selected' : '' }}>12</option>
										<option value="13" {{ ( 13 == $day) ? 'selected' : '' }}>13</option>
										<option value="14" {{ ( 14 == $day) ? 'selected' : '' }}>14</option>
										<option value="15" {{ ( 15 == $day) ? 'selected' : '' }}>15</option>
										<option value="16" {{ ( 16 == $day) ? 'selected' : '' }}>16</option>
										<option value="17" {{ ( 17 == $day) ? 'selected' : '' }}>17</option>
										<option value="18" {{ ( 18 == $day) ? 'selected' : '' }}>18</option>
										<option value="19" {{ ( 19 == $day) ? 'selected' : '' }}>19</option>
										<option value="20" {{ ( 20 == $day) ? 'selected' : '' }}>20</option>
										<option value="21" {{ ( 21 == $day) ? 'selected' : '' }}>21</option>
										<option value="22" {{ ( 22 == $day) ? 'selected' : '' }}>22</option>
										<option value="23" {{ ( 23 == $day) ? 'selected' : '' }}>23</option>
										<option value="24" {{ ( 24 == $day) ? 'selected' : '' }}>24</option>
										<option value="25" {{ ( 25 == $day) ? 'selected' : '' }}>25</option>
										<option value="26" {{ ( 26 == $day) ? 'selected' : '' }}>26</option>
										<option value="27" {{ ( 27 == $day) ? 'selected' : '' }}>27</option>
										<option value="28" {{ ( 28 == $day) ? 'selected' : '' }}>28</option>
										<option value="29" {{ ( 29 == $day) ? 'selected' : '' }}>29</option>
										<option value="30" {{ ( 30 == $day) ? 'selected' : '' }}>30</option>
										<option value="31" {{ ( 31 == $day) ? 'selected' : '' }}>31</option>
									</select>
								</div>
								<div class="col-md-2">
									
									<label>Month; </label>
									<select name="month" class="form-control">
										<option value="1" {{ ( 1 == $month) ? 'selected' : '' }}>January</option>
										<option value="2" {{ ( 2 == $month) ? 'selected' : '' }}>February</option>
										<option value="3" {{ ( 3 == $month) ? 'selected' : '' }}>March</option>
										<option value="4" {{ ( 4 == $month) ? 'selected' : '' }}>April</option>
										<option value="5" {{ ( 5 == $month) ? 'selected' : '' }}>May</option>
										<option value="6" {{ ( 6 == $month) ? 'selected' : '' }}>June</option>
										<option value="7" {{ ( 7 == $month) ? 'selected' : '' }}>July</option>
										<option value="8" {{ ( 8 == $month) ? 'selected' : '' }}>August</option>
										<option value="9" {{ ( 9 == $month) ? 'selected' : '' }}>September</option>
										<option value="10" {{ ( 10 == $month) ? 'selected' : '' }}>October</option>
										<option value="11" {{ ( 11 == $month) ? 'selected' : '' }}>Novemeber</option>
										<option value="12" {{ ( 12 == $month) ? 'selected' : '' }}>December</option>
									</select>
								</div>
								<div class="col-md-2">
									
									<label>Year; </label>
									<select name="year" class="form-control">
										<option value="1970" {{ ( 1970  == $year) ? 'selected' : '' }}>1970</option>
										<option value="1971" {{ ( 1971  == $year) ? 'selected' : '' }}>1971</option>
										<option value="1972" {{ ( 1972  == $year) ? 'selected' : '' }}>1972</option>
										<option value="1973" {{ ( 1973  == $year) ? 'selected' : '' }}>1973</option>
										<option value="1974" {{ ( 1974  == $year) ? 'selected' : '' }}>1974</option>
										<option value="1975" {{ ( 1975  == $year) ? 'selected' : '' }}>1975</option>
										<option value="1976" {{ ( 1976  == $year) ? 'selected' : '' }}>1976</option>
										<option value="1977" {{ ( 1977  == $year) ? 'selected' : '' }}>1977</option>
										<option value="1978" {{ ( 1978  == $year) ? 'selected' : '' }}>1978</option>
										<option value="1979" {{ ( 1979  == $year) ? 'selected' : '' }}>1979</option>
										<option value="1980" {{ ( 1980  == $year) ? 'selected' : '' }}>1980</option>
										<option value="1981" {{ ( 1981  == $year) ? 'selected' : '' }}>1981</option>
										<option value="1982" {{ ( 1982  == $year) ? 'selected' : '' }}>1982</option>
										<option value="1983" {{ ( 1983  == $year) ? 'selected' : '' }}>1983</option>
										<option value="1984" {{ ( 1984 == $year) ? 'selected' :  '' }}>1984</option>
										<option value="1985" {{ ( 1985  == $year) ? 'selected' : '' }}>1985</option>
										<option value="1986" {{ ( 1986  == $year) ? 'selected' : '' }}>1986</option>
										<option value="1987" {{ ( 1987  == $year) ? 'selected' : '' }}>1987</option>
										<option value="1988" {{ ( 1988  == $year) ? 'selected' : '' }}>1988</option>
										<option value="1989" {{ ( 1989  == $year) ? 'selected' : '' }}>1989</option>
										<option value="1990" {{ ( 1990  == $year) ? 'selected' : '' }}>1990</option>
										<option value="1991" {{ ( 1991  == $year) ? 'selected' : '' }}>1991</option>
										<option value="1992" {{ ( 1992  == $year) ? 'selected' : '' }}>1992</option>
										<option value="1993" {{ ( 1993  == $year) ? 'selected' : '' }}>1993</option>
										<option value="1994" {{ ( 1994  == $year) ? 'selected' : '' }}>1994</option>
										<option value="1995" {{ ( 1995  == $year) ? 'selected' : '' }}>1995</option>
										<option value="1996" {{ ( 1996  == $year) ? 'selected' : '' }}>1996</option>
										<option value="1997" {{ ( 1997  == $year) ? 'selected' : '' }}>1997</option>
										<option value="1998" {{ ( 1998  == $year) ? 'selected' : '' }}>1998</option>
										<option value="1999" {{ ( 1999  == $year) ? 'selected' : '' }}>1999</option>
										<option value="2000" {{ ( 2000  == $year) ? 'selected' : '' }}>2000</option>
										<option value="2001" {{ ( 2001  == $year) ? 'selected' : '' }}>2001</option>
										<option value="2002" {{ ( 2002  == $year) ? 'selected' : '' }}>2002</option>
										<option value="2003" {{ ( 2003  == $year) ? 'selected' : '' }}>2003</option>
										<option value="2004" {{ ( 2004  == $year) ? 'selected' : '' }}>2004</option>
										<option value="2005" {{ ( 2005  == $year) ? 'selected' : '' }}>2005</option>
										<option value="2006" {{ ( 2006  == $year) ? 'selected' : '' }}>2006</option>
										<option value="2007" {{ ( 2007  == $year) ? 'selected' : '' }}>2007</option>
										<option value="2008" {{ ( 2008  == $year) ? 'selected' : '' }}>2008</option>
										<option value="2009" {{ ( 2009  == $year) ? 'selected' : '' }}>2009</option>
										<option value="2010" {{ ( 2010  == $year) ? 'selected' : '' }}>2010</option>
										<option value="2011" {{ ( 2011  == $year) ? 'selected' : '' }}>2011</option>
										<option value="2012" {{ ( 2012  == $year) ? 'selected' : '' }}>2012</option>
										<option value="2013" {{ ( 2013  == $year) ? 'selected' : '' }}>2013</option>
										<option value="2014" {{ ( 2014  == $year) ? 'selected' : '' }}>2014</option>
										<option value="2015" {{ ( 2015  == $year) ? 'selected' : '' }}>2015</option>
										<option value="2016" {{ ( 2016  == $year) ? 'selected' : '' }}>2016</option>
										<option value="2017" {{ ( 2017  == $year) ? 'selected' : '' }}>2017</option>
										<option value="2018" {{ ( 2018  == $year) ? 'selected' : '' }}>2018</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-4">
									<label>Profession; </label>
									<div id="app-profession">
										<select name="profession" class="form-control">
											<option value="0">--Please Select--</option>
											<option v-for="profession in professions" v-bind:value="profession.value" 
												:selected="profession.value=={{json_encode($lead->profession)}}?true : false">
												@{{ profession.text }}
											</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<label>Phone Number; </label>
									<input type="text" name="phoneNumber" class="form-control" value="{{ $lead->phone_number }}" />
								</div>
								<div class="col-md-4">
									<label>Email Address; </label>
									<input type="text" name="email" class="form-control"  value="{{ $lead->email }}" />
									
								</div>
								
							</div>
						</div>
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-4">
									<label>Mobile Number; </label>
									<input type="text" name="mobileNumber" class="form-control" value="{{ $lead->mobile_number }}" />
								
								</div>
								<div class="col-md-4">
									<label>Lead Source; </label>
									<div id="app-leadSource">
										<select name="leadSource" class="form-control">
										  <option v-for="leadSource in leadSources" v-bind:value="leadSource.value"
											:selected="leadSource.value=={{json_encode($lead->lead_source)}}?true : false">
												@{{ leadSource.text }}
										  </option>
										</select>
									
									</div>
								</div>
								<div class="col-md-4">
									<label>Referral; </label>
									<?php
										$ref = explode(" ", $lead->referral);
										$refName = $ref[0]." ".$ref[1];
									?>
									<select name="referral" class="form-control">
										 <option value="0">--Please Select--</option>
										@foreach($referralPersons as $referralPerson)
										 <option value="{{$referralPerson['first_name']}} {{$referralPerson['last_name']}}" <?php echo ($refName == $referralPerson['first_name']." ".$referralPerson['last_name']) ? 'selected="selected"' : '' ?> >{{ $referralPerson['first_name']}} {{ $referralPerson['last_name']}}</option>
										@endforeach
									</select>
								</div>
								
							</div>
						</div>
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-4">
									<label>Lead Status; </label>
									<div id="app-leadStatus">
										<select name="leadStatus" class="form-control">
											<option v-for="leadStatus in leadStatuses" v-bind:value="leadStatus.value"
												:selected="leadStatus.value=={{json_encode($lead->lead_status)}}?true : false">
												@{{ leadStatus.text }}
											</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<label>Employment Type; </label>
									<select name="employmentType" class="form-control">
										<option value="Self-Employed" {{ ("Self-Employed" == $lead->lead_status) ? 'selected' : '' }}>Self-Employed</option>
										<option value="Employed" {{ ("Employed" == $lead->lead_status) ? 'selected' : '' }}>Employed</option>
									</select>
								</div>
								<div class="col-md-4">
									<label>National Insurance; </label>
									<input type="text" name="nationalInsurance" class="form-control" value="{{ $lead->national_insurance }}"  />
									
								</div>
								
							</div>
						</div>
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-4">
									<label>UTR; </label>
									<input type="text" name="utr" class="form-control"  value="{{ $lead->utr }}"/>
								</div>
								<div class="col-md-4">
									<label>648-Registered; </label>
									<select name="648Reg" class="form-control">
										<option value="Yes" {{ ("Yes" == $lead->registered) ? 'selected' : '' }}>Yes</option>
										<option value="No" {{ ("No" == $lead->registered) ? 'selected' : '' }}>No</option>
									</select>
								</div>
								<div class="col-md-4">
									<label>Authority Letter; </label>
									<select name="authLetter" class="form-control">
										<option value="Yes" {{ ("Yes" == $lead->authority_letter) ? 'selected' : '' }}>Yes</option>
										<option value="No" {{ ("No" == $lead->authority_letter) ? 'selected' : '' }}>No</option>
									</select>
								</div>
								<div class="col-md-4">
									<label>Bank Authority; </label>
									<select name="bankAuth" class="form-control">
										<option value="Yes" {{ ("Yes" == $lead->bank_authority) ? 'selected' : '' }}>Yes</option>
										<option value="No" {{ ("No" == $lead->bank_authority) ? 'selected' : '' }}>No</option>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card mb-3">
					<div class="card-header">
					  <i class="fa fa-address-card-o" aria-hidden="true"></i>
						Address Information
					 </div>
					 <div class="card-body">
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-4">
									<label>Street;</label>
									<input type="text" name="street" class="form-control" value="{{ $lead->streets }}" />
								</div>
								<div class="col-md-4">
									<label>City;</label>
									<input type="text" name="city" class="form-control" value="{{ $lead->city }}" />
								</div>
								<div class="col-md-4">
									<label>Province;</label>
									<input type="text" name="province" class="form-control"  value="{{ $lead->province }}" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-4">
									<label>Zip;</label>
									<input type="text" name="zip" class="form-control" value="{{ $lead->zip }}" />
								</div>
								<div class="col-md-4">
									<label>Country;</label>
									<select name="country" class="form-control">
										<option value="Andorra" {{ ("Andorra" == $lead->country) ? 'selected' : '' }}>Andorra</option>
										<option value="United Arab Emirates" {{ ("United Arab Emirates" == $lead->country) ? 'selected' : '' }}>United Arab Emirates</option>
										<option value="Afghanistan" {{ ("Afghanistan" == $lead->country) ? 'selected' : '' }}>Afghanistan</option>
										<option value="Antigua and Barbuda" {{ ("Antigua and Barbuda" == $lead->country) ? 'selected' : '' }}>Antigua and Barbuda</option>
										<option value="Anguilla" {{ ("Anguilla" == $lead->country) ? 'selected' : '' }}>Anguilla</option>
										<option value="Albania" {{ ("Albania" == $lead->country) ? 'selected' : '' }}>Albania</option>
										<option value="Armenia" {{ ("Armenia" == $lead->country) ? 'selected' : '' }}>Armenia</option>
										<option value="Netherlands Antilles" {{ ("Netherlands Antilles" == $lead->country) ? 'selected' : '' }}>Netherlands Antilles</option>
										<option value="Angola" {{ ("Angola" == $lead->country) ? 'selected' : '' }}>Angola</option>
										<option value="Antarctica" {{ ("Antarctica" == $lead->country) ? 'selected' : '' }}>Antarctica</option>
										<option value="Argentina" {{ ("Argentina" == $lead->country) ? 'selected' : '' }}>Argentina</option>
										<option value="Old style Arpanet" {{ ("Old style Arpanet" == $lead->country) ? 'selected' : '' }}>Old style Arpanet</option>
										<option value="American Samoa" {{ ("American Samoa" == $lead->country) ? 'selected' : '' }}>American Samoa</option>
										<option value="Austria" {{ ("Austria" == $lead->country) ? 'selected' : '' }}>Austria</option>
										<option value="Australia" {{ ("Australia" == $lead->country) ? 'selected' : '' }}>Australia</option>
										<option value="Aruba" {{ ("Aruba" == $lead->country) ? 'selected' : '' }}>Aruba</option>
										<option value="Azerbaidjan" {{ ("Azerbaidjan" == $lead->country) ? 'selected' : '' }}>Azerbaidjan</option>
										<option value="Bosnia-Herzegovina" {{ ("Bosnia-Herzegovina" == $lead->country) ? 'selected' : '' }}>Bosnia-Herzegovina</option>
										<option value="Barbados" {{ ("Barbados" == $lead->country) ? 'selected' : '' }}>Barbados</option>
										<option value="Bangladesh" {{ ("Bangladesh" == $lead->country) ? 'selected' : '' }}>Bangladesh</option>
										<option value="Belgium" {{ ("Belgium" == $lead->country) ? 'selected' : '' }}>Belgium</option>
										<option value="Burkina Faso" {{ ("Burkina Faso" == $lead->country) ? 'selected' : '' }}>Burkina Faso</option>
										<option value="Bulgaria" {{ ("Bulgaria" == $lead->country) ? 'selected' : '' }}>Bulgaria</option>
										<option value="Bahrain" {{ ("Bahrain" == $lead->country) ? 'selected' : '' }}>Bahrain</option>
										<option value="Burundi" {{ ("Burundi" == $lead->country) ? 'selected' : '' }}>Burundi</option>
										<option value="Benin" {{ ("Benin" == $lead->country) ? 'selected' : '' }}>Benin</option>
										<option value="Bermuda" {{ ("Bermuda" == $lead->country) ? 'selected' : '' }}>Bermuda</option>
										<option value="Brunei Darussalam" {{ ("Brunei Darussalam" == $lead->country) ? 'selected' : '' }}>Brunei Darussalam</option>
										<option value="Bolivia" {{ ("Bolivia" == $lead->country) ? 'selected' : '' }}>Bolivia</option>
										<option value="Brazil" {{ ("Brazil" == $lead->country) ? 'selected' : '' }}>Brazil</option>
										<option value="Bahamas" {{ ("Bahamas" == $lead->country) ? 'selected' : '' }}>Bahamas</option>
										<option value="Bhutan" {{ ("Bhutan" == $lead->country) ? 'selected' : '' }}>Bhutan</option>
										<option value="Bouvet Island" {{ ("Bouvet Island" == $lead->country) ? 'selected' : '' }}>Bouvet Island</option>
										<option value="Botswana" {{ ("Botswana" == $lead->country) ? 'selected' : '' }}>Botswana</option>
										<option value="Belarus" {{ ("Belarus" == $lead->country) ? 'selected' : '' }}>Belarus</option>
										<option value="Belize" {{ ("Belize" == $lead->country) ? 'selected' : '' }}>Belize</option>
										<option value="Canada" {{ ("Canada" == $lead->country) ? 'selected' : '' }}>Canada</option>
										<option value="Cocos (Keeling) Islands" {{ ("Cocos (Keeling) Islands" == $lead->country) ? 'selected' : '' }}>Cocos (Keeling) Islands</option>
										<option value="Central African Republic" {{ ("Central African Republic" == $lead->country) ? 'selected' : '' }}>Central African Republic</option>
										<option value="Congo" {{ ("Congo" == $lead->country) ? 'selected' : '' }}>Congo</option>
										<option value="Switzerland" {{ ("Switzerland" == $lead->country) ? 'selected' : '' }}>Switzerland</option>
										<option value="Ivory Coast (Cote D&#39;Ivoire)" {{ ("Ivory Coast (Cote D&#39;Ivoire)" == $lead->country) ? 'selected' : '' }}>Ivory Coast (Cote D&#39;Ivoire)</option>
										<option value="Cook Islands" {{ ("Cook Islands" == $lead->country) ? 'selected' : '' }}>Cook Islands</option>
										<option value="Chile" {{ ("Chile" == $lead->country) ? 'selected' : '' }}>Chile</option>
										<option value="Cameroon" {{ ("Cameroon" == $lead->country) ? 'selected' : '' }}>Cameroon</option>
										<option value="China" {{ ("China" == $lead->country) ? 'selected' : '' }}>China</option>
										<option value="Colombia" {{ ("Colombia" == $lead->country) ? 'selected' : '' }}>Colombia</option>
										<option value="Commercial" {{ ("Commercial" == $lead->country) ? 'selected' : '' }}>Commercial</option>
										<option value="Costa Rica" {{ ("Costa Rica" == $lead->country) ? 'selected' : '' }}>Costa Rica</option>
										<option value="Former Czechoslovakia" {{ ("Former Czechoslovakia" == $lead->country) ? 'selected' : '' }}>Former Czechoslovakia</option>
										<option value="Cuba" {{ ("Cuba" == $lead->country) ? 'selected' : '' }}>Cuba</option>
										<option value="Cape Verde" {{ ("Cape Verde" == $lead->country) ? 'selected' : '' }}>Cape Verde</option>
										<option value="Christmas Island" {{ ("Christmas Island" == $lead->country) ? 'selected' : '' }}>Christmas Island</option>
										<option value="Cyprus" {{ ("Cyprus" == $lead->country) ? 'selected' : '' }}>Cyprus</option>
										<option value="Czech Republic" {{ ("Czech Republic" == $lead->country) ? 'selected' : '' }}>Czech Republic</option>
										<option value="Germany" {{ ("Germany" == $lead->country) ? 'selected' : '' }}>Germany</option>
										<option value="Djibouti" {{ ("Djibouti" == $lead->country) ? 'selected' : '' }}>Djibouti</option>
										<option value="Denmark" {{ ("Denmark" == $lead->country) ? 'selected' : '' }}>Denmark</option>
										<option value="Dominica" {{ ("Dominica" == $lead->country) ? 'selected' : '' }}>Dominica</option>
										<option value="Dominican Republic" {{ ("Dominican Republic" == $lead->country) ? 'selected' : '' }}>Dominican Republic</option>
										<option value="Algeria" {{ ("Algeria" == $lead->country) ? 'selected' : '' }}>Algeria</option>
										<option value="Ecuador" {{ ("Ecuador" == $lead->country) ? 'selected' : '' }}>Ecuador</option>
										<option value="USA Educational" {{ ("USA Educational" == $lead->country) ? 'selected' : '' }}>USA Educational</option>
										<option value="Estonia" {{ ("Estonia" == $lead->country) ? 'selected' : '' }}>Estonia</option>
										<option value="Egypt" {{ ("Egypt" == $lead->country) ? 'selected' : '' }}>Egypt</option>
										<option value="Western Sahara" {{ ("Western Sahara" == $lead->country) ? 'selected' : '' }}>Western Sahara</option>
										<option value="Eritrea" {{ ("Eritrea" == $lead->country) ? 'selected' : '' }}>Eritrea</option>
										<option value="Spain" {{ ("Spain" == $lead->country) ? 'selected' : '' }}>Spain</option>
										<option value="Ethiopia" {{ ("Ethiopia" == $lead->country) ? 'selected' : '' }}>Ethiopia</option>
										<option value="Finland" {{ ("Finland" == $lead->country) ? 'selected' : '' }}>Finland</option>
										<option value="Fiji" {{ ("Fiji" == $lead->country) ? 'selected' : '' }}>Fiji</option>
										<option value="Falkland Islands" {{ ("Falkland Islands" == $lead->country) ? 'selected' : '' }}>Falkland Islands</option>
										<option value="Micronesia" {{ ("Micronesia" == $lead->country) ? 'selected' : '' }}>Micronesia</option>
										<option value="Faroe Islands" {{ ("Faroe Islands" == $lead->country) ? 'selected' : '' }}>Faroe Islands</option>
										<option value="France" {{ ("France" == $lead->country) ? 'selected' : '' }}>France</option>
										<option value="France (European Territory)" {{ ("France (European Territory)" == $lead->country) ? 'selected' : '' }}>France (European Territory)</option>
										<option value="Gabon" {{ ("Gabon" == $lead->country) ? 'selected' : '' }}>Gabon</option>
										<option value="Great Britain" {{ ("Great Britain" == $lead->country) ? 'selected' : '' }}>Great Britain</option>
										<option value="Grenada" {{ ("Grenada" == $lead->country) ? 'selected' : '' }}>Grenada</option>
										<option value="Georgia" {{ ("Georgia" == $lead->country) ? 'selected' : '' }}>Georgia</option>
										<option value="French Guyana" {{ ("French Guyana" == $lead->country) ? 'selected' : '' }}>French Guyana</option>
										<option value="Ghana" {{ ("Ghana" == $lead->country) ? 'selected' : '' }}>Ghana</option>
										<option value="Gibraltar" {{ ("Gibraltar" == $lead->country) ? 'selected' : '' }}>Gibraltar</option>
										<option value="Greenland" {{ ("Greenland" == $lead->country) ? 'selected' : '' }}>Greenland</option>
										<option value="Gambia" {{ ("Gambia" == $lead->country) ? 'selected' : '' }}>Gambia</option>
										<option value="Guinea" {{ ("Guinea" == $lead->country) ? 'selected' : '' }}>Guinea</option>
										<option value="USA Government" {{ ("USA Government" == $lead->country) ? 'selected' : '' }}>USA Government</option>
										<option value="Guadeloupe (French)" {{ ("Guadeloupe (French)" == $lead->country) ? 'selected' : '' }}>Guadeloupe (French)</option>
										<option value="Equatorial Guinea" {{ ("Equatorial Guinea" == $lead->country) ? 'selected' : '' }}>Equatorial Guinea</option>
										<option value="Greece" {{ ("Greece" == $lead->country) ? 'selected' : '' }}>Greece</option>
										<option value="S. Georgia &amp; S. Sandwich Isls." {{ ("S. Georgia &amp; S. Sandwich Isls." == $lead->country) ? 'selected' : '' }}>S. Georgia &amp; S. Sandwich Isls.</option>
										<option value="Guatemala" {{ ("Guatemala" == $lead->country) ? 'selected' : '' }}>Guatemala</option>
										<option value="Guam (USA)" {{ ("Guam (USA)" == $lead->country) ? 'selected' : '' }}>Guam (USA)</option>
										<option value="Guinea Bissau" {{ ("Guinea Bissau" == $lead->country) ? 'selected' : '' }}>Guinea Bissau</option>
										<option value="Guyana" {{ ("Guyana" == $lead->country) ? 'selected' : '' }}>Guyana</option>
										<option value="Hong Kong" {{ ("Hong Kong" == $lead->country) ? 'selected' : '' }}>Hong Kong</option>
										<option value="Heard and McDonald Islands" {{ ("Heard and McDonald Islands" == $lead->country) ? 'selected' : '' }}>Heard and McDonald Islands</option>
										<option value="Honduras" {{ ("Honduras" == $lead->country) ? 'selected' : '' }}>Honduras</option>
										<option value="Croatia" {{ ("Croatia" == $lead->country) ? 'selected' : '' }}>Croatia</option>
										<option value="Haiti" {{ ("Haiti" == $lead->country) ? 'selected' : '' }}>Haiti</option>
										<option value="Hungary" {{ ("Hungary" == $lead->country) ? 'selected' : '' }}>Hungary</option>
										<option value="Indonesia" {{ ("Indonesia" == $lead->country) ? 'selected' : '' }}>Indonesia</option>
										<option value="Ireland" {{ ("Ireland" == $lead->country) ? 'selected' : '' }}>Ireland</option>
										<option value="Israel" {{ ("Israel" == $lead->country) ? 'selected' : '' }}>Israel</option>
										<option value="India" {{ ("India" == $lead->country) ? 'selected' : '' }}>India</option>
										<option value="International" {{ ("International" == $lead->country) ? 'selected' : '' }}>International</option>
										<option value="British Indian Ocean Territory" {{ ("British Indian Ocean Territory" == $lead->country) ? 'selected' : '' }}>British Indian Ocean Territory</option>
										<option value="Iraq" {{ ("Iraq" == $lead->country) ? 'selected' : '' }}>Iraq</option>
										<option value="Iran" {{ ("Iran" == $lead->country) ? 'selected' : '' }}>Iran</option>
										<option value="Iceland" {{ ("Iceland" == $lead->country) ? 'selected' : '' }}>Iceland</option>
										<option value="Italy" {{ ("Italy" == $lead->country) ? 'selected' : '' }}>Italy</option>
										<option value="Jamaica" {{ ("Jamaica" == $lead->country) ? 'selected' : '' }}>Jamaica</option>
										<option value="Jordan" {{ ("Jordan" == $lead->country) ? 'selected' : '' }}>Jordan</option>
										<option value="Japan" {{ ("Japan" == $lead->country) ? 'selected' : '' }}>Japan</option>
										<option value="Kenya" {{ ("Kenya" == $lead->country) ? 'selected' : '' }}>Kenya</option>
										<option value="Kyrgyzstan" {{ ("Kyrgyzstan" == $lead->country) ? 'selected' : '' }}>Kyrgyzstan</option>
										<option value="Cambodia" {{ ("Cambodia" == $lead->country) ? 'selected' : '' }}>Cambodia</option>
										<option value="Kiribati" {{ ("Kiribati" == $lead->country) ? 'selected' : '' }}>Kiribati</option>
										<option value="Comoros" {{ ("Comoros" == $lead->country) ? 'selected' : '' }}>Comoros</option>
										<option value="Saint Kitts &amp; Nevis Anguilla" {{ ("Saint Kitts &amp; Nevis Anguilla" == $lead->country) ? 'selected' : '' }}>Saint Kitts &amp; Nevis Anguilla</option>
										<option value="North Korea" {{ ("North Korea" == $lead->country) ? 'selected' : '' }}>North Korea</option>
										<option value="South Korea" {{ ("South Korea" == $lead->country) ? 'selected' : '' }}>South Korea</option>
										<option value="Kuwait" {{ ("Cayman Islands" == $lead->country) ? 'selected' : '' }}>Kuwait</option>
										<option value="Cayman Islands" {{ ("Cayman Islands" == $lead->country) ? 'selected' : '' }}>Cayman Islands</option>
										<option value="Kazakhstan" {{ ("Laos" == $lead->country) ? 'selected' : '' }}>Kazakhstan</option>
										<option value="Laos" {{ ("Laos" == $lead->country) ? 'selected' : '' }}>Laos</option>
										<option value="Lebanon" {{ ("Lebanon" == $lead->country) ? 'selected' : '' }}>Lebanon</option>
										<option value="Saint Lucia" {{ ("Saint Lucia" == $lead->country) ? 'selected' : '' }}>Saint Lucia</option>
										<option value="Liechtenstein" {{ ("Liechtenstein" == $lead->country) ? 'selected' : '' }}>Liechtenstein</option>
										<option value="Sri Lanka" {{ ("Sri Lanka" == $lead->country) ? 'selected' : '' }}>Sri Lanka</option>
										<option value="Liberia" {{ ("Liberia" == $lead->country) ? 'selected' : '' }}>Liberia</option>
										<option value="Lesotho" {{ ("Lesotho" == $lead->country) ? 'selected' : '' }}>Lesotho</option>
										<option value="Lithuania" {{ ("Lithuania" == $lead->country) ? 'selected' : '' }}>Lithuania</option>
										<option value="Luxembourg" {{ ("Luxembourg" == $lead->country) ? 'selected' : '' }}>Luxembourg</option>
										<option value="Latvia" {{ ("Latvia" == $lead->country) ? 'selected' : '' }}>Latvia</option>
										<option value="Libya" {{ ("Libya" == $lead->country) ? 'selected' : '' }}>Libya</option>
										<option value="Morocco" {{ ("Morocco" == $lead->country) ? 'selected' : '' }}>Morocco</option>
										<option value="Monaco" {{ ("Monaco" == $lead->country) ? 'selected' : '' }}>Monaco</option>
										<option value="Moldavia" {{ ("Moldavia" == $lead->country) ? 'selected' : '' }}>Moldavia</option>
										<option value="Madagascar" {{ ("Madagascar" == $lead->country) ? 'selected' : '' }}>Madagascar</option>
										<option value="Marshall Islands" {{ ("Marshall Islands" == $lead->country) ? 'selected' : '' }}>Marshall Islands</option>
										<option value="USA Military" {{ ("USA Military" == $lead->country) ? 'selected' : '' }}>USA Military</option>
										<option value="Macedonia" {{ ("Macedonia" == $lead->country) ? 'selected' : '' }}>Macedonia</option>
										<option value="Mali" {{ ("Mali" == $lead->country) ? 'selected' : '' }}>Mali</option>
										<option value="Myanmar" {{ ("Myanmar" == $lead->country) ? 'selected' : '' }}>Myanmar</option>
										<option value="Mongolia" {{ ("Mongolia" == $lead->country) ? 'selected' : '' }}>Mongolia</option>
										<option value="Macau" {{ ("Macau" == $lead->country) ? 'selected' : '' }}>Macau</option>
										<option value="Northern Mariana Islands" {{ ("Northern Mariana Islands" == $lead->country) ? 'selected' : '' }}>Northern Mariana Islands</option>
										<option value="Martinique (French)" {{ ("Martinique (French)" == $lead->country) ? 'selected' : '' }}>Martinique (French)</option>
										<option value="Mauritania" {{ ("Mauritania" == $lead->country) ? 'selected' : '' }}>Mauritania</option>
										<option value="Montserrat" {{ ("Montserrat" == $lead->country) ? 'selected' : '' }}>Montserrat</option>
										<option value="Malta" {{ ("Malta" == $lead->country) ? 'selected' : '' }}>Malta</option>
										<option value="Mauritius" {{ ("Mauritius" == $lead->country) ? 'selected' : '' }}>Mauritius</option>
										<option value="Maldives" {{ ("Maldives" == $lead->country) ? 'selected' : '' }}>Maldives</option>
										<option value="Malawi" {{ ("Malawi" == $lead->country) ? 'selected' : '' }}>Malawi</option>
										<option value="Mexico" {{ ("Mexico" == $lead->country) ? 'selected' : '' }}>Mexico</option>
										<option value="Malaysia" {{ ("Malaysia" == $lead->country) ? 'selected' : '' }}>Malaysia</option>
										<option value="Mozambique" {{ ("Mozambique" == $lead->country) ? 'selected' : '' }}>Mozambique</option>
										<option value="Namibia" {{ ("Namibia" == $lead->country) ? 'selected' : '' }}>Namibia</option>
										<option value="NATO (this was purged in 1996 - see hq.nato.int)" {{ ("NATO (this was purged in 1996 - see hq.nato.int)" == $lead->country) ? 'selected' : '' }}>NATO (this was purged in 1996 - see hq.nato.int)</option>
										<option value="New Caledonia (French)" {{ ("New Caledonia (French)" == $lead->country) ? 'selected' : '' }}>New Caledonia (French)</option>
										<option value="Niger" {{ ("Niger" == $lead->country) ? 'selected' : '' }}>Niger</option>
										<option value="Network" {{ ("Network" == $lead->country) ? 'selected' : '' }}>Network</option>
										<option value="Norfolk Island" {{ ("Norfolk Island" == $lead->country) ? 'selected' : '' }}>Norfolk Island</option>
										<option value="Nigeria" {{ ("Nigeria" == $lead->country) ? 'selected' : '' }}>Nigeria</option>
										<option value="Nicaragua" {{ ("Nicaragua" == $lead->country) ? 'selected' : '' }}>Nicaragua</option>
										<option value="Netherlands" {{ ("Netherlands" == $lead->country) ? 'selected' : '' }}>Netherlands</option>
										<option value="Norway" {{ ("Norway" == $lead->country) ? 'selected' : '' }}>Norway</option>
										<option value="Nepal" {{ ("Nepal" == $lead->country) ? 'selected' : '' }}>Nepal</option>
										<option value="Nauru" {{ ("Nauru" == $lead->country) ? 'selected' : '' }}>Nauru</option>
										<option value="Neutral Zone" {{ ("Neutral Zone" == $lead->country) ? 'selected' : '' }}>Neutral Zone</option>
										<option value="Niue" {{ ("Niue" == $lead->country) ? 'selected' : '' }}>Niue</option>
										<option value="New Zealand" {{ ("New Zealand" == $lead->country) ? 'selected' : '' }}>New Zealand</option>
										<option value="Oman" {{ ("Oman" == $lead->country) ? 'selected' : '' }}>Oman</option>
										<option value="Non-Profit Making Organisations (sic)" {{ ("Non-Profit Making Organisations (sic)" == $lead->country) ? 'selected' : '' }}>Non-Profit Making Organisations (sic)</option>
										<option value="Panama" {{ ("Panama" == $lead->country) ? 'selected' : '' }}>Panama</option>
										<option value="Peru" {{ ("Peru" == $lead->country) ? 'selected' : '' }}>Peru</option>
										<option value="Polynesia (French)" {{ ("Polynesia (French)" == $lead->country) ? 'selected' : '' }}>Polynesia (French)</option>
										<option value="Papua New Guinea" {{ ("Papua New Guinea" == $lead->country) ? 'selected' : '' }}>Papua New Guinea</option>
										<option value="Philippines" {{ ("Philippines" == $lead->country) ? 'selected' : '' }}>Philippines</option>
										<option value="Pakistan" {{ ("Pakistan" == $lead->country) ? 'selected' : '' }}>Pakistan</option>
										<option value="Poland" {{ ("Poland" == $lead->country) ? 'selected' : '' }}>Poland</option>
										<option value="Saint Pierre and Miquelon" {{ ("Saint Pierre and Miquelon" == $lead->country) ? 'selected' : '' }}>Saint Pierre and Miquelon</option>
										<option value="Pitcairn Island" {{ ("Pitcairn Island" == $lead->country) ? 'selected' : '' }}>Pitcairn Island</option>
										<option value="Puerto Rico" {{ ("Puerto Rico" == $lead->country) ? 'selected' : '' }}>Puerto Rico</option>
										<option value="Portugal" {{ ("Portugal" == $lead->country) ? 'selected' : '' }}>Portugal</option>
										<option value="Palau" {{ ("Palau" == $lead->country) ? 'selected' : '' }}>Palau</option>
										<option value="Paraguay" {{ ("Paraguay" == $lead->country) ? 'selected' : '' }}>Paraguay</option>
										<option value="Qatar" {{ ("Qatar" == $lead->country) ? 'selected' : '' }}>Qatar</option>
										<option value="Reunion (French)" {{ ("Reunion (French)" == $lead->country) ? 'selected' : '' }}>Reunion (French)</option>
										<option value="Romania" {{ ("Romania" == $lead->country) ? 'selected' : '' }}>Romania</option>
										<option value="Russian Federation" {{ ("Russian Federation" == $lead->country) ? 'selected' : '' }}>Russian Federation</option>
										<option value="Rwanda" {{ ("Rwanda" == $lead->country) ? 'selected' : '' }}>Rwanda</option>
										<option value="Saudi Arabia" {{ ("Saudi Arabia" == $lead->country) ? 'selected' : '' }}>Saudi Arabia</option>
										<option value="Solomon Islands" {{ ("Solomon Islands" == $lead->country) ? 'selected' : '' }}>Solomon Islands</option>
										<option value="Seychelles" {{ ("Seychelles" == $lead->country) ? 'selected' : '' }}>Seychelles</option>
										<option value="Sudan" {{ ("Sudan" == $lead->country) ? 'selected' : '' }}>Sudan</option>
										<option value="Sweden" {{ ("Sweden" == $lead->country) ? 'selected' : '' }}>Sweden</option>
										<option value="Singapore" {{ ("Singapore" == $lead->country) ? 'selected' : '' }}>Singapore</option>
										<option value="Saint Helena" {{ ("Saint Helena" == $lead->country) ? 'selected' : '' }}>Saint Helena</option>
										<option value="Slovenia" {{ ("Slovenia" == $lead->country) ? 'selected' : '' }}>Slovenia</option>
										<option value="Svalbard and Jan Mayen Islands" {{ ("Svalbard and Jan Mayen Islands" == $lead->country) ? 'selected' : '' }}>Svalbard and Jan Mayen Islands</option>
										<option value="Slovak Republic" {{ ("Slovak Republic" == $lead->country) ? 'selected' : '' }}>Slovak Republic</option>
										<option value="Sierra Leone" {{ ("Sierra Leone" == $lead->country) ? 'selected' : '' }}>Sierra Leone</option>
										<option value="San Marino" {{ ("San Marino" == $lead->country) ? 'selected' : '' }}>San Marino</option>
										<option value="Senegal" {{ ("Senegal" == $lead->country) ? 'selected' : '' }}>Senegal</option>
										<option value="Somalia" {{ ("Somalia" == $lead->country) ? 'selected' : '' }}>Somalia</option>
										<option value="Suriname" {{ ("Suriname" == $lead->country) ? 'selected' : '' }}>Suriname</option>
										<option value="Saint Tome (Sao Tome) and Principe" {{ ("Saint Tome (Sao Tome) and Principe" == $lead->country) ? 'selected' : '' }}>Saint Tome (Sao Tome) and Principe</option>
										<option value="Former USSR" {{ ("Former USSR" == $lead->country) ? 'selected' : '' }}>Former USSR</option>
										<option value="El Salvador" {{ ("El Salvador" == $lead->country) ? 'selected' : '' }}>El Salvador</option>
										<option value="Syria" {{ ("Syria" == $lead->country) ? 'selected' : '' }}>Syria</option>
										<option value="Swaziland" {{ ("Swaziland" == $lead->country) ? 'selected' : '' }}>Swaziland</option>
										<option value="Turks and Caicos Islands" {{ ("Turks and Caicos Islands" == $lead->country) ? 'selected' : '' }}>Turks and Caicos Islands</option>
										<option value="Chad" {{ ("Chad" == $lead->country) ? 'selected' : '' }}>Chad</option>
										<option value="French Southern Territories" {{ ("French Southern Territories" == $lead->country) ? 'selected' : '' }}>French Southern Territories</option>
										<option value="Togo" {{ ("Togo" == $lead->country) ? 'selected' : '' }}>Togo</option>
										<option value="Thailand" {{ ("Thailand" == $lead->country) ? 'selected' : '' }}>Thailand</option>
										<option value="Tadjikistan" {{ ("Tadjikistan" == $lead->country) ? 'selected' : '' }}>Tadjikistan</option>
										<option value="Tokelau" {{ ("Tokelau" == $lead->country) ? 'selected' : '' }}>Tokelau</option>
										<option value="Turkmenistan" {{ ("Turkmenistan" == $lead->country) ? 'selected' : '' }}>Turkmenistan</option>
										<option value="Tunisia" {{ ("Tunisia" == $lead->country) ? 'selected' : '' }}>Tunisia</option>
										<option value="Tonga" {{ ("Tonga" == $lead->country) ? 'selected' : '' }}>Tonga</option>
										<option value="East Timor" {{ ("East Timor" == $lead->country) ? 'selected' : '' }}>East Timor</option>
										<option value="Turkey" {{ ("Turkey" == $lead->country) ? 'selected' : '' }}>Turkey</option>
										<option value="Trinidad and Tobago" {{ ("Trinidad and Tobago" == $lead->country) ? 'selected' : '' }}>Trinidad and Tobago</option>
										<option value="Tuvalu" {{ ("Tuvalu" == $lead->country) ? 'selected' : '' }}>Tuvalu</option>
										<option value="Taiwan" {{ ("Taiwan" == $lead->country) ? 'selected' : '' }}>Taiwan</option>
										<option value="Tanzania" {{ ("Tanzania" == $lead->country) ? 'selected' : '' }}>Tanzania</option>
										<option value="Ukraine" {{ ("Ukraine" == $lead->country) ? 'selected' : '' }}>Ukraine</option>
										<option value="Uganda" {{ ("Uganda" == $lead->country) ? 'selected' : '' }}>Uganda</option>
										<option value="United Kingdom" {{ ("United Kingdom" == $lead->country) ? 'selected' : '' }}>United Kingdom</option>
										<option value="USA Minor Outlying Islands" {{ ("USA Minor Outlying Islands" == $lead->country) ? 'selected' : '' }}>USA Minor Outlying Islands</option>
										<option value="United States" {{ ("United States" == $lead->country) ? 'selected' : '' }}>United States</option>
										<option value="Uruguay" {{ ("Uruguay" == $lead->country) ? 'selected' : '' }}>Uruguay</option>
										<option value="Uzbekistan" {{ ("Uzbekistan" == $lead->country) ? 'selected' : '' }}>Uzbekistan</option>
										<option value="Vatican City State" {{ ("Vatican City State" == $lead->country) ? 'selected' : '' }}>Vatican City State</option>
										<option value="Saint Vincent &amp; Grenadines" {{ ("Saint Vincent &amp; Grenadines" == $lead->country) ? 'selected' : '' }}>Saint Vincent &amp; Grenadines</option>
										<option value="Venezuela" {{ ("Venezuela" == $lead->country) ? 'selected' : '' }}>Venezuela</option>
										<option value="Virgin Islands (British)" {{ ("Virgin Islands (British)" == $lead->country) ? 'selected' : '' }}>Virgin Islands (British)</option>
										<option value="Virgin Islands (USA)" {{ ("Virgin Islands (USA)" == $lead->country) ? 'selected' : '' }}>Virgin Islands (USA)</option>
										<option value="Vietnam" {{ ("Vietnam" == $lead->country) ? 'selected' : '' }}>Vietnam</option>
										<option value="Vanuatu" {{ ("Vanuatu" == $lead->country) ? 'selected' : '' }}>Vanuatu</option>
										<option value="Wallis and Futuna Islands" {{ ("Wallis and Futuna Islands" == $lead->country) ? 'selected' : '' }}>Wallis and Futuna Islands</option>
										<option value="Samoa" {{ ("Samoa" == $lead->country) ? 'selected' : '' }}>Samoa</option>
										<option value="Yemen" {{ ("Yemen" == $lead->country) ? 'selected' : '' }}>Yemen</option>
										<option value="Mayotte" {{ ("Mayotte" == $lead->country) ? 'selected' : '' }}>Mayotte</option>
										<option value="Yugoslavia" {{ ("Yugoslavia" == $lead->country) ? 'selected' : '' }}>Yugoslavia</option>
										<option value="South Africa" {{ ("South Africa" == $lead->country) ? 'selected' : '' }}>South Africa</option>
										<option value="Zambia" {{ ("Zambia" == $lead->country) ? 'selected' : '' }}>Zambia</option>
										<option value="Zaire" {{ ("Zaire" == $lead->country) ? 'selected' : '' }}>Zaire</option>
										<option value="Zimbabwe" {{ ("Zimbabwe" == $lead->country) ? 'selected' : '' }}>Zimbabwe</option>

									</select>	
								</div>
								<div class="col-md-4">
									<label>Lead Assignment;</label>
									<?php
										$ref = explode(" ", $lead->lead_assignment);
										$refName = $ref[0]." ".$ref[1];
									?>
									<select name="leadAssignment" class="form-control">
										<option value="0">--Please Select--</option>
										@foreach($users as $user)
											<option value="{{ $user['first_name']}} {{ $user['last_name']}}" <?php echo ($refName == $user['first_name']." ".$user['last_name']) ? 'selected="selected"' : '' ?>>{{ $user['first_name']}} {{ $user['last_name']}}</option>
										@endforeach
									</select>	
								</div>
							</div>
						</div>
					 </div>
				</div>
				<div class="card mb-3">
					<div class="card-header">
					 <i class="fa fa-info"></i>
						Description
					</div>
					<div class="col-md-12">
						<br>
						<textarea name="description" class="form-control" rows="10" cols="10">{{ $lead->description }}</textarea>
						<br>
					</div>
					<div class="col-md-12">
						<div class="pull-right">
							<button type="submit" class="btn btn-success">
								<i class="fa fa-refresh" aria-hidden="true" style="font-size:24px"></i> Update Lead
							</button>
						</div>
						<br>
						<br>
						<br>
					</div>
				</div>
				</form>
			</div>
		  </div>
	</div>
</div>
<script>
	//Title data
	new Vue({
	el: '#app-title',
	  data: {
		options: [
		  { text: 'Mr', value: 'Mr' },
		  { text: 'Mrs', value: 'Mrs' }
		]
	  }
	})
	
	//Lead source data
	new Vue({
	el: '#app-leadSource',
	  data: {
		leadSources: [
		  { text: 'Referral', value: 'Referral' },
		  { text: 'Website', value: 'Website' },
		  { text: 'Internet Marketing', value: 'Internet Marketing' },
		  { text: 'Site Visits', value: 'Site Visits' },
		  { text: 'Resourcing', value: 'Resourcing' },
		  { text: 'Creditsafe', value: 'Creditsafe' }
		  
		]
	  }
	})
	
	//Lead status data
	new Vue({
	el: '#app-leadStatus',
	  data: {
		leadStatuses: [
		  { text: 'Open', value: 'Open' },
		  { text: 'Interested/Follow up', value: 'Interested/Follow up' },
		  { text: 'Callback', value: 'Callback' },
		  { text: 'Unavailable', value: 'Unavailable' },
		  { text: 'Close/Converted', value: 'Close/Converted' },
		  { text: 'Not Interested', value: 'Not Interested' },
		  { text: 'Not Qualified', value: 'Not Qualified' },
		  { text: 'Do Not Call', value: 'Do Not Call' },
		  { text: 'Ringing', value: 'Ringing' },
		  { text: 'Busy', value: 'Busy' },
		  { text: 'Voicemail', value: 'Voicemail' },
		  { text: 'Fax Machine', value: 'Fax Machine' },
		  { text: 'Invalid Number', value: 'Invalid Number' },
		  { text: 'Re-order prompt', value: 'Re-order prompt' },
		  { text: 'No Number', value: 'No Number' },
		  { text: 'No Contact Info', value: 'No Contact Info' },
		  { text: 'Foreign Number', value: 'Foreign Number' },
		  { text: 'Duplicate', value: 'Duplicate' },
		  { text: 'Wrong Number', value: 'Wrong Number' },
		  { text: 'Processing Tax Return', value: 'Processing Tax Return' },
		  { text: 'Waiting Next Tax Year', value: 'Waiting Next Tax Year'},
		  { text: 'Ceased', value: 'Ceased'},
		  { text: 'First Stage', value: 'First Stage'},
		  { text: 'Second Stage', value: 'Second Stage'},
		  { text: 'Third Stage', value: 'Third Stage'},
		  { text: 'Fourth Stage', value: 'Fourth Stage'},
		  { text: 'Fifth Stage', value: 'Fifth Stage'}
		]
	  }
	})
	
	//Profession data
	new Vue({
	el: '#app-profession',
		data: {
			professions:[
				{ text:'Boiler Maker', value: 'Boiler Maker' },
				{ text:'Brick Layer', value: 'Brick Layer'},
				{ text:'Building Inspector', value: 'Building Inspector' },
				{ text:'Carpenter', value: 'Carpenter' },
				{ text:'Concrete Finisher', value: 'Concrete Finisher' },
				{ text:'Construction Project Director', value: 'Construction Project Director' },
				{ text:'Construction Site Manager', value: 'Construction Site Manager' },
				{ text:'Contract Manager', value: 'Contract Manager' },
				{ text:'Crane Operator', value: 'Crane Operator' },
				{ text:'Demolition', value: 'Demolition' },
				{ text:'Distribution', value: 'Distribution' },
				{ text:'Drywall Installer', value: 'Drywall Installer' },
				{ text:'Electrician', value: 'Electrician' },
				{ text:'Elevator', value: 'Elevator' },
				{ text:'Engineer', value: 'Engineer' },
				{ text:'Equipment Inspector', value: 'Equipment Inspector' },
				{ text:'Exterior Finisher', value: 'Exterior Finisher' },
				{ text:'Field/Project Engineer', value: 'Field/Project Engineer' },
				{ text:'Fire and Security Engineer', value: 'Fire and Security Engineer' },
				{ text:'Framer', value: 'Framer' },
				{ text:'Gasfitter', value: 'Gasfitter' },
				{ text:'Glazier', value: 'Glazier' },
				{ text:'Groundworker', value: 'Groundworker' },
				{ text:'Heat and Frost Insulator', value: 'Heat and Frost Insulator' },
				{ text:'Heavy Duty Equipment Mechanic', value: 'Heavy Duty Equipment Mechanic' },
				{ text:'Home and Property Inpector', value: 'Home and Property Inpector' },
				{ text:'Industrial Mechanic', value: 'Industrial Mechanic' },
				{ text:'Interior Finisher', value: 'Interior Finisher' },
				{ text:'Iron Worker/Structural metal fabricator and fitter', value: 'Iron Worker/Structural metal fabricator and fitter' },
				{ text:'Labourer', value: 'Labourer' },
				{ text:'Landscapert', value: 'Landscapert' },
				{ text:'Line Worker', value: 'Line Worker' },
				{ text:'Machine Operator', value: 'Machine Operator' },
				{ text:'Others', value: 'Others' },
				{ text:'Painter and Decorator', value: 'Painter and Decorator' },
				{ text:'Plasterer', value: 'Plasterer' },
				{ text:'Plumber', value: 'Plumber' },
				{ text:'Production Manager', value: 'Production Manager' },
				{ text:'Project Manager/Project Coordinator', value: 'Project Manager/Project Coordinator' },
				{ text:'Quality Control Officer', value: 'Quality Control Officer' },
				{ text:'Refrigeration and Air Conditioning Mechanic', value: 'Refrigeration and Air Conditioning Mechanic' },
				{ text:'Roofer', value: 'Roofer' },
				{ text:'Rotating Equipment Inpector', value: 'Rotating Equipment Inpector' },
				{ text:'Safety Inspector/Consultant', value: 'Safety Inspector/Consultant' },
				{ text:'Scaffolder', value: 'Scaffolder' },
				{ text:'Sheet Metal Worker', value: 'Sheet Metal Worker' },
				{ text:'Shingler', value: 'Shingler' },
				{ text:'Shop Foreman', value: 'Shop Foreman' },
				{ text:'Site Manager', value: 'Site Manager' },
				{ text:'Steamfitter/pipefitter', value: 'Steamfitter/pipefitter' },
				{ text:'Stone Mason', value: 'Stone Mason' },
				{ text:'Surveyor', value: 'Surveyor' },
				{ text:'Tile Setter', value: 'Tile Setter' },
				{ text:'Tiling Operative', value: 'Tiling Operative' },
				{ text:'Tradesman', value: 'Tradesman' },
				{ text:'Truckman', value: 'Truckman' },
				{ text:'Welder', value: 'Truckman' }
				
			]
		}
	})
</script>
@endsection