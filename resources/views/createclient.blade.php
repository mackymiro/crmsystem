@extends('layouts.app')
@section('title', 'Create Clients | RMTG')
@section('content')
<div id="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Create Clients</li>
			
          </ol>
		  <div class="row">
			<div class="col-lg-12">
				<div class="card mb-3">
					<div class="card-header">
					  <i class="fa fa-black-tie"></i>
					  Create New Clients
					  <a href="{{ url('clients') }}" class="pull-right">Back to Clients</a>
					</div>
					<form action="{{ action('ClientController@store') }}" method="POST">
					{{csrf_field()}}
					<div class="card-body">
						<div class="form-group">
							<p>Client Information</p>
							<div class="pull-right">
								<button type="submit" class="btn btn-success">
									<i class="fa fa-plus" aria-hidden="true"></i> Add Client
								</button>
							</div>
							<br>
							<br>
							<div style="clear:both; "></div>
							<div class="form-row">
								<div class="col-md-2">
									<label>Title; </label>
									<div id="app-title">
										<select name="title" class="form-control">
											<option v-for="option in options" v-bind:value="option.value">
												@{{ option.text }}
											</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<label>First Name; </label>
									<input type="text" name="firstName" class="form-control" required />
									@if ($errors->has('firstName'))
										<div class="alert alert-danger">
											<strong>{{ $errors->first('firstName') }}</strong>
										</div>
									@endif
								</div>
								<div class="col-md-4">
									<label>Last Name; </label>
									<input type="text" name="lastName" class="form-control" required  />
									@if ($errors->has('lastName'))
										<div class="alert alert-danger">
											<strong>{{ $errors->first('lastName') }}</strong>
										</div>
									@endif
								</div>
								<div class="col-md-2">
									<label>Middle Name; </label>
									<input type="text" name="middleName" class="form-control" required />
									@if ($errors->has('middleName'))
										<div class="alert alert-danger">
											<strong>{{ $errors->first('middleName') }}</strong>
										</div>
									@endif
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-6">
									<label>Company; </label>
									<input type="text" name="company" class="form-control"  required />
									@if ($errors->has('company'))
										<div class="alert alert-danger">
											<strong>{{ $errors->first('company') }}</strong>
										</div>
									@endif
								</div>
								<div class="col-md-2">
									<label>Birthday; </label>
									<select name="day" class="form-control">
										<option value="1" >1</option>
										<option value="2" >2</option>
										<option value="3" >3</option>
										<option value="4" >4</option>
										<option value="5" >5</option>
										<option value="6" >6</option>
										<option value="7" >7</option>
										<option value="8" >8</option>
										<option value="9" >9</option>
										<option value="10" >10</option>
										<option value="11" >11</option>
										<option value="12" >12</option>
										<option value="13" >13</option>
										<option value="14" >14</option>
										<option value="15" >15</option>
										<option value="16" >16</option>
										<option value="17" >17</option>
										<option value="18" >18</option>
										<option value="19" >19</option>
										<option value="20" >20</option>
										<option value="21" >21</option>
										<option value="22" >22</option>
										<option value="23" >23</option>
										<option value="24" >24</option>
										<option value="25" >25</option>
										<option value="26" >26</option>
										<option value="27" >27</option>
										<option value="28" >28</option>
										<option value="29" >29</option>
										<option value="30" >30</option>
										<option value="31" >31</option>
									</select>
								</div>
								<div class="col-md-2">
									<label>Month; </label>
									<select name="month" class="form-control">
										<option value="1">January</option>
										<option value="2">February</option>
										<option value="3">March</option>
										<option value="4">April</option>
										<option value="5">May</option>
										<option value="6">June</option>
										<option value="7">July</option>
										<option value="8">August</option>
										<option value="9">September</option>
										<option value="10">October</option>
										<option value="11">Novemeber</option>
										<option value="12">December</option>
									</select>
								</div>
								<div class="col-md-2">
									
									<label>Year; </label>
									<select name="year" class="form-control">
										<option value="1970">1970</option>
										<option value="1971">1971</option>
										<option value="1972">1972</option>
										<option value="1973">1973</option>
										<option value="1974">1974</option>
										<option value="1975">1975</option>
										<option value="1976">1976</option>
										<option value="1977">1977</option>
										<option value="1978">1978</option>
										<option value="1979">1979</option>
										<option value="1980">1980</option>
										<option value="1981">1981</option>
										<option value="1982">1982</option>
										<option value="1983">1983</option>
										<option value="1984">1984</option>
										<option value="1985">1985</option>
										<option value="1986">1986</option>
										<option value="1987">1987</option>
										<option value="1988">1988</option>
										<option value="1989">1989</option>
										<option value="1990">1990</option>
										<option value="1991">1991</option>
										<option value="1992">1992</option>
										<option value="1993">1993</option>
										<option value="1994">1994</option>
										<option value="1995">1995</option>
										<option value="1996">1996</option>
										<option value="1997">1997</option>
										<option value="1998">1998</option>
										<option value="1999">1999</option>
										<option value="2000">2000</option>
										<option value="2001">2001</option>
										<option value="2002">2002</option>
										<option value="2003">2003</option>
										<option value="2004">2004</option>
										<option value="2005">2005</option>
										<option value="2006">2006</option>
										<option value="2007">2007</option>
										<option value="2008">2008</option>
										<option value="2009">2009</option>
										<option value="2010">2010</option>
										<option value="2011">2011</option>
										<option value="2012">2012</option>
										<option value="2013">2013</option>
										<option value="2014">2014</option>
										<option value="2015">2015</option>
										<option value="2016">2016</option>
										<option value="2017">2017</option>
										<option value="2018">2018</option>
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
											<option v-for="profession in professions" v-bind:value="profession.value" >
												@{{ profession.text }}
											</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<label>Phone Number; </label>
									<input type="text" name="phoneNumber" class="form-control" />
								</div>
								<div class="col-md-4">
									<label>Email Address; </label>
									<input type="text" name="email" class="form-control" required />
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-4">
									<label>Mobile Number; </label>
									<input type="text" name="mobileNumber" class="form-control" required/>
								</div>
								<div class="col-md-4">
									<label>Referral </label>
									<select name="referral" class="form-control">
										<option></option>
									</select>	
								</div>
								<div class="col-md-4">
									<label>Commission </label>
									<input type="text" name="commission" class="form-control" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-4">
									<label>Employment Type; </label>
									<div id="app-employmentType">
										<select name="employmentType" class="form-control">
											<option v-for="employmentType in employmentTypes" v-bind:value="employmentType.value">
												@{{ employmentType.text }}
											</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<label>National Insurance; </label>
									<input type="text" name="nationalInsurance" class="form-control" required />
								</div>
								<div class="col-md-4">
									<label>UTR; </label>
									<input type="text" name="utr" class="form-control" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-4">
									<label>648-Registered; </label>
									<div id="app-registered">
										<select name="648reg" class="form-control">
											<option v-for="register in registers" v-bind:value="register.value">
												@{{ register.text }}
											</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<label>Authority Letter </label>
									<div id="app-authLetter">	
										<select name="authLetter" class="form-control">
											<option v-for="authLetter in authLetters" v-bind:value="authLetter.value">
												@{{ authLetter.text }}
											</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<label>Bank Authority </label>
									<div id="app-bankAuth">
										<select name="bankAuth" class="form-control">
											<option v-for="bankAuth in bankAuths" v-bind:value="bankAuth.value">
												@{{ bankAuth.text }}
											</option>
										</select>
									</div>
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
									<input type="text" name="street" class="form-control"  required />
								</div>
								<div class="col-md-4">
									<label>City;</label>
									<input type="text" name="city" class="form-control"  required />
								</div>
								<div class="col-md-4">
									<label>Province;</label>
									<input type="text" name="province" class="form-control"  required />
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-4">
									<label>Zip;</label>
									<input type="text" name="zip" class="form-control"  />
								</div>
								<div class="col-md-4">
									<label>Country;</label>
				
									<select name="country" class="form-control">
										<option value="Andorra">Andorra</option>
										<option value="United Arab Emirates">United Arab Emirates</option>
										<option value="Afghanistan">Afghanistan</option>
										<option value="Antigua and Barbuda">Antigua and Barbuda</option>
										<option value="Anguilla">Anguilla</option>
										<option value="Albania">Albania</option>
										<option value="Armenia">Armenia</option>
										<option value="Netherlands Antilles">Netherlands Antilles</option>
										<option value="Angola">Angola</option>
										<option value="Antarctica">Antarctica</option>
										<option value="Argentina">Argentina</option>
										<option value="Old style Arpanet">Old style Arpanet</option>
										<option value="American Samoa">American Samoa</option>
										<option value="Austria">Austria</option>
										<option value="Australia">Australia</option>
										<option value="Aruba">Aruba</option>
										<option value="Azerbaidjan">Azerbaidjan</option>
										<option value="Bosnia-Herzegovina">Bosnia-Herzegovina</option>
										<option value="Barbados">Barbados</option>
										<option value="Bangladesh">Bangladesh</option>
										<option value="Belgium">Belgium</option>
										<option value="Burkina Faso">Burkina Faso</option>
										<option value="Bulgaria">Bulgaria</option>
										<option value="Bahrain">Bahrain</option>
										<option value="Burundi">Burundi</option>
										<option value="Benin">Benin</option>
										<option value="Bermuda">Bermuda</option>
										<option value="Brunei Darussalam">Brunei Darussalam</option>
										<option value="Bolivia">Bolivia</option>
										<option value="Brazil">Brazil</option>
										<option value="Bahamas">Bahamas</option>
										<option value="Bhutan">Bhutan</option>
										<option value="Bouvet Island">Bouvet Island</option>
										<option value="Botswana">Botswana</option>
										<option value="Belarus">Belarus</option>
										<option value="Belize">Belize</option>
										<option value="Canada">Canada</option>
										<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
										<option value="Central African Republic">Central African Republic</option>
										<option value="Congo">Congo</option>
										<option value="Switzerland">Switzerland</option>
										<option value="Ivory Coast (Cote D&#39;Ivoire)">Ivory Coast (Cote D&#39;Ivoire)</option>
										<option value="Cook Islands">Cook Islands</option>
										<option value="Chile">Chile</option>
										<option value="Cameroon">Cameroon</option>
										<option value="China">China</option>
										<option value="Colombia">Colombia</option>
										<option value="Commercial">Commercial</option>
										<option value="Costa Rica">Costa Rica</option>
										<option value="Former Czechoslovakia">Former Czechoslovakia</option>
										<option value="Cuba">Cuba</option>
										<option value="Cape Verde">Cape Verde</option>
										<option value="Christmas Island">Christmas Island</option>
										<option value="Cyprus">Cyprus</option>
										<option value="Czech Republic">Czech Republic</option>
										<option value="Germany">Germany</option>
										<option value="Djibouti">Djibouti</option>
										<option value="Denmark">Denmark</option>
										<option value="Dominica">Dominica</option>
										<option value="Dominican Republic">Dominican Republic</option>
										<option value="Algeria">Algeria</option>
										<option value="Ecuador">Ecuador</option>
										<option value="USA Educational">USA Educational</option>
										<option value="Estonia">Estonia</option>
										<option value="Egypt">Egypt</option>
										<option value="Western Sahara">Western Sahara</option>
										<option value="Eritrea">Eritrea</option>
										<option value="Spain">Spain</option>
										<option value="Ethiopia">Ethiopia</option>
										<option value="Finland">Finland</option>
										<option value="Fiji">Fiji</option>
										<option value="Falkland Islands">Falkland Islands</option>
										<option value="Micronesia">Micronesia</option>
										<option value="Faroe Islands">Faroe Islands</option>
										<option value="France">France</option>
										<option value="France (European Territory)">France (European Territory)</option>
										<option value="Gabon">Gabon</option>
										<option value="Great Britain">Great Britain</option>
										<option value="Grenada">Grenada</option>
										<option value="Georgia">Georgia</option>
										<option value="French Guyana">French Guyana</option>
										<option value="Ghana">Ghana</option>
										<option value="Gibraltar">Gibraltar</option>
										<option value="Greenland">Greenland</option>
										<option value="Gambia">Gambia</option>
										<option value="Guinea">Guinea</option>
										<option value="USA Government">USA Government</option>
										<option value="Guadeloupe (French)">Guadeloupe (French)</option>
										<option value="Equatorial Guinea">Equatorial Guinea</option>
										<option value="Greece">Greece</option>
										<option value="S. Georgia &amp; S. Sandwich Isls.">S. Georgia &amp; S. Sandwich Isls.</option>
										<option value="Guatemala">Guatemala</option>
										<option value="Guam (USA)">Guam (USA)</option>
										<option value="Guinea Bissau">Guinea Bissau</option>
										<option value="Guyana">Guyana</option>
										<option value="Hong Kong">Hong Kong</option>
										<option value="Heard and McDonald Islands">Heard and McDonald Islands</option>
										<option value="Honduras">Honduras</option>
										<option value="Croatia">Croatia</option>
										<option value="Haiti">Haiti</option>
										<option value="Hungary">Hungary</option>
										<option value="Indonesia">Indonesia</option>
										<option value="Ireland">Ireland</option>
										<option value="Israel">Israel</option>
										<option value="India">India</option>
										<option value="International">International</option>
										<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
										<option value="Iraq">Iraq</option>
										<option value="Iran">Iran</option>
										<option value="Iceland">Iceland</option>
										<option value="Italy">Italy</option>
										<option value="Jamaica">Jamaica</option>
										<option value="Jordan">Jordan</option>
										<option value="Japan">Japan</option>
										<option value="Kenya">Kenya</option>
										<option value="Kyrgyzstan">Kyrgyzstan</option>
										<option value="Cambodia">Cambodia</option>
										<option value="Kiribati">Kiribati</option>
										<option value="Comoros">Comoros</option>
										<option value="Saint Kitts &amp; Nevis Anguilla">Saint Kitts &amp; Nevis Anguilla</option>
										<option value="North Korea">North Korea</option>
										<option value="South Korea">South Korea</option>
										<option value="Kuwait">Kuwait</option>
										<option value="Cayman Islands">Cayman Islands</option>
										<option value="Kazakhstan">Kazakhstan</option>
										<option value="Laos">Laos</option>
										<option value="Lebanon">Lebanon</option>
										<option value="Saint Lucia">Saint Lucia</option>
										<option value="Liechtenstein">Liechtenstein</option>
										<option value="Sri Lanka">Sri Lanka</option>
										<option value="Liberia">Liberia</option>
										<option value="Lesotho">Lesotho</option>
										<option value="Lithuania">Lithuania</option>
										<option value="Luxembourg">Luxembourg</option>
										<option value="Latvia">Latvia</option>
										<option value="Libya">Libya</option>
										<option value="Morocco">Morocco</option>
										<option value="Monaco">Monaco</option>
										<option value="Moldavia">Moldavia</option>
										<option value="Madagascar">Madagascar</option>
										<option value="Marshall Islands">Marshall Islands</option>
										<option value="USA Military">USA Military</option>
										<option value="Macedonia">Macedonia</option>
										<option value="Mali">Mali</option>
										<option value="Myanmar">Myanmar</option>
										<option value="Mongolia">Mongolia</option>
										<option value="Macau">Macau</option>
										<option value="Northern Mariana Islands">Northern Mariana Islands</option>
										<option value="Martinique (French)">Martinique (French)</option>
										<option value="Mauritania">Mauritania</option>
										<option value="Montserrat">Montserrat</option>
										<option value="Malta">Malta</option>
										<option value="Mauritius">Mauritius</option>
										<option value="Maldives">Maldives</option>
										<option value="Malawi">Malawi</option>
										<option value="Mexico">Mexico</option>
										<option value="Malaysia">Malaysia</option>
										<option value="Mozambique">Mozambique</option>
										<option value="Namibia">Namibia</option>
										<option value="NATO (this was purged in 1996 - see hq.nato.int)">NATO (this was purged in 1996 - see hq.nato.int)</option>
										<option value="New Caledonia (French)">New Caledonia (French)</option>
										<option value="Niger">Niger</option>
										<option value="Network">Network</option>
										<option value="Norfolk Island">Norfolk Island</option>
										<option value="Nigeria">Nigeria</option>
										<option value="Nicaragua">Nicaragua</option>
										<option value="Netherlands">Netherlands</option>
										<option value="Norway">Norway</option>
										<option value="Nepal">Nepal</option>
										<option value="Nauru">Nauru</option>
										<option value="Neutral Zone">Neutral Zone</option>
										<option value="Niue">Niue</option>
										<option value="New Zealand">New Zealand</option>
										<option value="Oman">Oman</option>
										<option value="Non-Profit Making Organisations (sic)">Non-Profit Making Organisations (sic)</option>
										<option value="Panama">Panama</option>
										<option value="Peru">Peru</option>
										<option value="Polynesia (French)">Polynesia (French)</option>
										<option value="Papua New Guinea">Papua New Guinea</option>
										<option value="Philippines">Philippines</option>
										<option value="Pakistan">Pakistan</option>
										<option value="Poland">Poland</option>
										<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
										<option value="Pitcairn Island">Pitcairn Island</option>
										<option value="Puerto Rico">Puerto Rico</option>
										<option value="Portugal">Portugal</option>
										<option value="Palau">Palau</option>
										<option value="Paraguay">Paraguay</option>
										<option value="Qatar">Qatar</option>
										<option value="Reunion (French)">Reunion (French)</option>
										<option value="Romania">Romania</option>
										<option value="Russian Federation">Russian Federation</option>
										<option value="Rwanda">Rwanda</option>
										<option value="Saudi Arabia">Saudi Arabia</option>
										<option value="Solomon Islands">Solomon Islands</option>
										<option value="Seychelles">Seychelles</option>
										<option value="Sudan">Sudan</option>
										<option value="Sweden">Sweden</option>
										<option value="Singapore">Singapore</option>
										<option value="Saint Helena">Saint Helena</option>
										<option value="Slovenia">Slovenia</option>
										<option value="Svalbard and Jan Mayen Islands">Svalbard and Jan Mayen Islands</option>
										<option value="Slovak Republic">Slovak Republic</option>
										<option value="Sierra Leone">Sierra Leone</option>
										<option value="San Marino">San Marino</option>
										<option value="Senegal">Senegal</option>
										<option value="Somalia">Somalia</option>
										<option value="Suriname">Suriname</option>
										<option value="Saint Tome (Sao Tome) and Principe">Saint Tome (Sao Tome) and Principe</option>
										<option value="Former USSR">Former USSR</option>
										<option value="El Salvador">El Salvador</option>
										<option value="Syria">Syria</option>
										<option value="Swaziland">Swaziland</option>
										<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
										<option value="Chad">Chad</option>
										<option value="French Southern Territories">French Southern Territories</option>
										<option value="Togo">Togo</option>
										<option value="Thailand">Thailand</option>
										<option value="Tadjikistan">Tadjikistan</option>
										<option value="Tokelau">Tokelau</option>
										<option value="Turkmenistan">Turkmenistan</option>
										<option value="Tunisia">Tunisia</option>
										<option value="Tonga">Tonga</option>
										<option value="East Timor">East Timor</option>
										<option value="Turkey">Turkey</option>
										<option value="Trinidad and Tobago">Trinidad and Tobago</option>
										<option value="Tuvalu">Tuvalu</option>
										<option value="Taiwan">Taiwan</option>
										<option value="Tanzania">Tanzania</option>
										<option value="Ukraine">Ukraine</option>
										<option value="Uganda">Uganda</option>
										<option selected="selected" value="United Kingdom">United Kingdom</option>
										<option value="USA Minor Outlying Islands">USA Minor Outlying Islands</option>
										<option value="United States">United States</option>
										<option value="Uruguay">Uruguay</option>
										<option value="Uzbekistan">Uzbekistan</option>
										<option value="Vatican City State">Vatican City State</option>
										<option value="Saint Vincent &amp; Grenadines">Saint Vincent &amp; Grenadines</option>
										<option value="Venezuela">Venezuela</option>
										<option value="Virgin Islands (British)">Virgin Islands (British)</option>
										<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
										<option value="Vietnam">Vietnam</option>
										<option value="Vanuatu">Vanuatu</option>
										<option value="Wallis and Futuna Islands">Wallis and Futuna Islands</option>
										<option value="Samoa">Samoa</option>
										<option value="Yemen">Yemen</option>
										<option value="Mayotte">Mayotte</option>
										<option value="Yugoslavia">Yugoslavia</option>
										<option value="South Africa">South Africa</option>
										<option value="Zambia">Zambia</option>
										<option value="Zaire">Zaire</option>
										<option value="Zimbabwe">Zimbabwe</option>

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
						<textarea name="description" class="form-control" rows="10" cols="10"></textarea>
						<br>
					</div>
					<div class="col-md-12">
						<div class="pull-right">
							<button type="submit" class="btn btn-success">
									<i class="fa fa-plus" aria-hidden="true"></i> Add Client
								</button>
								<br>
								<br>
								<br>
						</div>
					</div>
				</div>
				</form>
		  </div>
	</div>	
</div>
<script>
	//Title data
	new Vue({
	el: '#app-title',
		data: {
			options:[
				{ text:'Mr', value: 'Mr' },
				{ text:'Mrs', value: 'Mrs'}
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
	
	//Employment type data
	new Vue({
	el: '#app-employmentType',
		data: {
			employmentTypes:[
				{ text:'Self-Employed', value: 'Self-Employed' },
				{ text:'Employed', value: 'Employed'}
			]
		}
	})
	
	//648-Registered data
	new Vue({
	el: '#app-registered',
		data: {
			registers:[
				{ text:'Yes', value: 'Yes' },
				{ text:'No', value: 'No'}
			]
		}
	})
	
	//auth letter data
	new Vue({
	el: '#app-authLetter',
		data: {
			authLetters:[
				{ text:'Yes', value: 'Yes' },
				{ text:'No', value: 'No'}
			]
		}
	})
	
	//bank authority data
	new Vue({
	el: '#app-bankAuth',
		data: {
			bankAuths:[
				{ text:'Yes', value: 'Yes' },
				{ text:'No', value: 'No'}
			]
		}
	})

</script>
@endsection