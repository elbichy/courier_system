@extends('layouts.app', ['title' => 'Add New Records'])

@section('content')
    <div class="my-content-wrapper">
        <div class="content-container">
            <div class="sectionWrap">
                {{-- SECTION HEADING --}}
                <h6 class="center sectionHeading">NEW PERSONNEL</h6>

                {{-- SECTION TABLE --}}
                <div class="sectionFormWrap z-depth-1" style="padding:24px;">
					<ul id="tabs-swipe-demo" class="tabs">
						<li class="tab col s3"><a class="active" href="#personal-data">PERSONAL DATA</a></li>
						<li class="tab col s3"><a href="#contact-data">CONTACT DATA</a></li>
						<li class="tab col s3"><a href="#official-data">OFFICIAL DATA</a></li>
						<li class="tab col s3"><a href="#docs-upload">UPLOAD DOCUMENT</a></li>
					</ul>
					<p class="formMsg grey lighten-3 left-align">
						Fill the form below with the personnel information and proceed.
					</p>
					<form action="{{ route('storePersonnel') }}" method="POST" enctype="multipart/form-data" name="create_form" id="create_form">
						@csrf
						<div id="personal-data" class="col s12">
							<div class="row">
								{{-- Fullname --}}
								<div class="input-field col s12 l8">
									<input id="name" name="name" type="text" required>
									@if ($errors->has('name'))
										<span class="helper-text red-text">
											<strong>{{ $errors->first('name') }}</strong>
										</span>
									@endif
									<label for="name">Fullname</label>
								</div>
								{{-- Date of Birth --}}
								<div class="input-field col s12 l4">
									<input id="dob" name="dob" type="text" class="datepicker">
									@if ($errors->has('dob'))
										<span class="helper-text red-text">
											<strong>{{ $errors->first('dob') }}</strong>
										</span>
									@endif
									<label for="dob">Date of Birth</label>
								</div>
								{{-- Gender --}}
								<div class="col s12 l3">
									<label for="gender">Select Gender</label>
									<select id="gender" name="gender" class=" browser-default">
										<option disabled>Select Type</option>
										<option value="male" selected>Male</option>
										<option value="female">Female</option>
										<option value="other">Other</option>
									</select>
									@if ($errors->has('gender'))
										<span class="helper-text red-text">
											<strong>{{ $errors->first('gender') }}</strong>
										</span>
									@endif
								</div>
								{{-- Religion --}}
								<div class="col s12 l3">
									<label for="religion">Select Religion</label>
									<select id="religion" name="religion" class=" browser-default">
										<option disabled>Select Type</option>
										<option value="islam" selected>Islam</option>
										<option value="christianity">Christianity</option>
										<option value="other">Other</option>
									</select>
									@if ($errors->has('religion'))
										<span class="helper-text red-text">
											<strong>{{ $errors->first('religion') }}</strong>
										</span>
									@endif
								</div>
								{{-- Tribe --}}
								<div class="input-field col s12 l3">
									<input id="tribe" name="tribe" type="text">
									@if ($errors->has('tribe'))
										<span class="helper-text red-text">
											<strong>{{ $errors->first('tribe') }}</strong>
										</span>
									@endif
									<label for="tribe">Tribe</label>
								</div>
								<div class="input-field col s12 l3">
									<button class="contact-data btn waves-effect waves-light right" type="button"><i class="material-icons right">send</i>PROCEED</button>
								</div>

							</div>
						</div>
						<div id="contact-data" class="col s12">
							<div class="row">
								{{-- Geo-Political Zone --}}
								<div class="col s12 l4">
									<label for="geoPol">Select Geo-Pol</label>
									<select id="geoPol" name="geoPol" class=" browser-default">
										<option disabled>Select Type</option>
										<option value="north west" selected>North-West</option>
										<option value="north east">North-East</option>
										<option value="north central">North-Central</option>
										<option value="south east">South-East</option>
										<option value="south south">South-South</option>
										<option value="south west">South-West</option>
									</select>
									@if ($errors->has('geoPol'))
										<span class="helper-text red-text">
											<strong>{{ $errors->first('geoPol') }}</strong>
										</span>
									@endif
								</div>
								{{-- State of Origin --}}
								<div class="col s12 l4">
									<label for="soo">State of Origin</label>
									<select id="soo" name="soo" class="browser-default" required>
										<option disabled selected>Select State</option>
										<option value="1">Abia</option>
										<option value="2">Adamawa</option>
										<option value="3">Akwa-ibom</option>
										<option value="4">Anambra</option>
										<option value="5">Bauchi</option>
										<option value="6">Bayelsa</option>
										<option value="7">Benue</option>
										<option value="8">Borno</option>
										<option value="9">Cross-river</option>
										<option value="10">Delta</option>
										<option value="11">Ebonyi</option>
										<option value="12">Edo</option>
										<option value="13">Ekiti</option>
										<option value="14">Enugu</option>
										<option value="15">Fct</option>
										<option value="16">Gombe</option>
										<option value="17">Imo</option>
										<option value="18">Jigawa</option>
										<option value="19">Kaduna</option>
										<option value="20">Kano</option>
										<option value="21">Katsina</option>
										<option value="22">Kebbi</option>
										<option value="23">Kogi</option>
										<option value="24">Kwara</option>
										<option value="25">Lagos</option>
										<option value="26">Nasarawa</option>
										<option value="27">Niger</option>
										<option value="28">Ogun</option>
										<option value="29">Ondo</option>
										<option value="30">Osun</option>
										<option value="31">Oyo</option>
										<option value="32">Plateau</option>
										<option value="33">Rivers</option>
										<option value="34">Sokoto</option>
										<option value="35">Taraba</option>
										<option value="36">Yobe</option>
										<option value="37">Zamfara</option>
									</select>
									@if ($errors->has('soo'))
										<span class="helper-text red-text">
											<strong>{{ $errors->first('soo') }}</strong>
										</span>
									@endif
								</div>
								{{-- Local Govt --}}
								<div class="col s12 l4">
									<label for="lgoo">Local Govt.</label>
									<select id="lgoo" name="lgoo" class="browser-default" required>
										<option disabled selected>Select State</option>
									</select>
									@if ($errors->has('lgoo'))
										<span class="helper-text red-text">
											<strong>{{ $errors->first('lgoo') }}</strong>
										</span>
									@endif
								</div>
								{{-- Address --}}
								<div class="input-field col s12 l5">
									<input id="address" name="address" type="text">
									@if ($errors->has('address'))
										<span class="helper-text red-text">
											<strong>{{ $errors->first('address') }}</strong>
										</span>
									@endif
									<label for="address">Address</label>
								</div>
								{{-- Phone --}}
								<div class="input-field col s12 l2">
									<input id="phone" name="phone" type="text">
									@if ($errors->has('phone'))
										<span class="helper-text red-text">
											<strong>{{ $errors->first('phone') }}</strong>
										</span>
									@endif
									<label for="phone">Phone</label>
								</div>
								{{-- Email --}}
								<div class="input-field col s12 l3">
									<input id="email" name="email" type="text">
									@if ($errors->has('email'))
										<span class="helper-text red-text">
											<strong>{{ $errors->first('email') }}</strong>
										</span>
									@endif
									<label for="email">Email</label>
								</div>
								<div class="input-field col s12 l2">
									<button class="official-data btn waves-effect waves-light right" type="button"><i class="material-icons right">send</i>PROCEED</button>
								</div>
							</div>
						</div>
						<div id="official-data" class="col s12">
                            <div class="row">
								{{-- Service Number --}}
								<div class="input-field col s12 l3">
									<input id="service_number" name="service_number" type="text" required novalidate>
									@if ($errors->has('service_number'))
										<span class="helper-text red-text">
											<strong>{{ $errors->first('service_number') }}</strong>
										</span>
									@endif
									<label for="service_number">File/Svc No.</label>
								</div>

								{{-- Date of 1st Appt. --}}
								<div class="input-field col s12 l3">
									<input id="dofa" name="dofa" type="text" class="datepicker">
									@if ($errors->has('dofa'))
										<span class="helper-text red-text">
											<strong>{{ $errors->first('dofa') }}</strong>
										</span>
									@endif
									<label for="dofa">Date of 1st Appt.</label>
								</div>
								
								{{-- Date of Conf. --}}
								<div class="input-field col s12 l3">
									<input id="doc" name="doc" type="text" class="datepicker">
									@if ($errors->has('doc'))
										<span class="helper-text red-text">
											<strong>{{ $errors->first('doc') }}</strong>
										</span>
									@endif
									<label for="doc">Date of Conf.</label>
								</div>
								
								{{-- Date of Present Appt. --}}
								<div class="input-field col s12 l3">
									<input id="dopa" name="dopa" type="text" class="datepicker">
									@if ($errors->has('dopa'))
										<span class="helper-text red-text">
											<strong>{{ $errors->first('dopa') }}</strong>
										</span>
									@endif
									<label for="dopa">Date of Present Appt.</label>
								</div>

								{{-- IPPIS NO --}}
								<div class="input-field col s12 l3">
									<input id="ippisNo" name="ippisNo" type="text">
									@if ($errors->has('ippisNo'))
										<span class="helper-text red-text">
											<strong>{{ $errors->first('ippisNo') }}</strong>
										</span>
									@endif
									<label for="ippisNo">IPPIS No.</label>
								</div>
								
								{{-- BANK --}}
								<div class="input-field col s12 l3">
									<input id="bank" name="bank" type="text">
									@if ($errors->has('bank'))
										<span class="helper-text red-text">
											<strong>{{ $errors->first('bank') }}</strong>
										</span>
									@endif
									<label for="bank">Bank</label>
								</div>
								
								{{-- ACC NAME. --}}
								<div class="input-field col s12 l3">
									<input id="accName" name="accName" type="text">
									@if ($errors->has('accName'))
										<span class="helper-text red-text">
											<strong>{{ $errors->first('accName') }}</strong>
										</span>
									@endif
									<label for="accName">Account Name</label>
								</div>
								
								{{-- ACC NO. --}}
								<div class="input-field col s12 l3">
									<input id="accNo" name="accNo" type="text">
									@if ($errors->has('accNo'))
										<span class="helper-text red-text">
											<strong>{{ $errors->first('accNo') }}</strong>
										</span>
									@endif
									<label for="accNo">Account Number</label>
								</div>

								{{-- Type --}}
								<div class="col s12 l3">
									<label for="type">Select Category</label>
									<select id="type" name="type" class=" browser-default">
										<option disabled>Select Type</option>
										<option value="uniform" selected>Uniform</option>
										<option value="civilian">Civilian</option>
									</select>
								</div>

								{{-- Ranks --}}
								<div class="col s12 l4">
									<label for="rank">Select Rank</label>
									<select id="rank" name="rank" class=" browser-default" required>
										<option disabled selected>Select Rank</option>
										<option value="1">Commandant General of Corps</option>
										<option value="2">Deputy Commandant General of Corps</option>
										<option value="3">Assistant Commandant General of Corps</option>
										<option value="4">Commandant of Corps</option>
										<option value="5">Deputy Commandant of Corps</option>
										<option value="6">Assistant Commandant of Corps</option>
										<option value="7">Chief Superintendent of Corps</option>
										<option value="8">Superintendent of Corps</option>
										<option value="9">Deputy Superintendent of Corps</option>
										<option value="10">Assistant Superintendent of Corps I</option>
										<option value="11">Assistant Superintendent of Corps II</option>
										<option value="12">Chief Inspector of Corps</option>
										<option value="13">Deputy Chief Inspector of Corps</option>
										<option value="14">Assistant Chief Inspector of Corps</option>
										<option value="15">Principal Inspector of Corps I</option>
										<option value="16">Principal Inspector of Corps II</option>
										<option value="17">Senior Inspector of Corps</option>
										<option value="18">Inspector of Corps</option>
										<option value="19">Assistant Inspector of Corps</option>
										<option value="20">Chief Corps Assistant</option>7
										<option value="21">Senior Corps Assistant</option>
										<option value="22">Corps Assistant I</option>
										<option value="23">Corps Assistant II</option>
										<option value="24">Corps Assistant III</option>
									</select>
									@if ($errors->has('rank'))
										<span class="helper-text red-text">
											<strong>{{ $errors->first('rank') }}</strong>
										</span>
									@endif
								</div>

								{{-- Command --}}
								<div class="input-field col s12 l3">
									<input type="text" name="command" id="autocomplete-input" class="autocomplete">
									@if ($errors->has('command'))
									<span class="helper-text red-text">
										<strong>{{ $errors->first('command') }}</strong>
									</span>
									@endif
									<label for="command">Select Command</label>
								</div>

								<div class="input-field col s12 l2 right">
									<button class="docs-upload btn waves-effect waves-light right" type="button"><i class="material-icons right">send</i>PROCEED</button>
								</div>
							</div>
						</div>
						<div id="docs-upload" class="col s12">
                            <div class="row" style="width:100%; margin-left: 0; margin-right: 0;">
								<div class="file-field col s12 l6 input-field">
									<div class="uploadBtn">
										<span>SELECT IMAGE</span>
										<input type="file" name="passport" id="passport" accept="image/*">
									</div>
									<div class="file-path-wrapper">
										<input class="file-path validate" type="text" placeholder="Upload personnel passport photograph">
									</div>
								</div>
								<div class="file-field col s12 l6 input-field">
									<div class="uploadBtn">
										<span>SELECT SCANNED FILES</span>
										<input type="file" name="file[]" id="file" accept="image/*" multiple>
									</div>
									<div class="file-path-wrapper">
										<input class="file-path validate" type="text" placeholder="Upload one or more files">
									</div>
								</div>
								<div class="input-field col s12 right">
									<button class="submit btn waves-effect waves-light right" type="submit">
										<i class="material-icons right">send</i>ADD RECORD
									</button>
								</div>
								<br />
								<div class="progress" style="display:none;">
									<div class="indeterminate"></div>
								</div>
							</div>
						</div>
						
					</form>
				</div>
				
				<div class="importRecords">
					<div class="card green darken-1">
						<div class="card-content">
							<h5 class="card-title white-text">Import records from excel</h5>
							<form style="margin-top: 15px;padding: 10px;" action="{{ route('importData') }}" method="post" enctype="multipart/form-data" class="row">
								@csrf
				
								<input type="file" name="import_file" class="left"/>
								<button class="btn waves-effect waves-light green darken-2 right">Import File</button>
							</form>
						</div>
					</div>
				</div>
            </div>
        </div>
        <div class="footer z-depth-1">
            <p>&copy; Nigeria Security & Civil Defence Corps</p>
        </div>
    </div>
@endsection

@push('scripts')
	<script>
		$(document).ready(function(){
			$('.datepicker').datepicker({
				format: 'yyyy-mm-dd',
				yearRange: [1960, 2019]
			});
			$('.timepicker').timepicker({
				defaultTime: 'now'
			});

			$('input.autocomplete').autocomplete({
				data: {
					'National Headquarters' : null,
					'Abia State Command' : null,
					'Adamawa State Command' : null,
					'Akwa-ibom State Command' : null,
					'Anambra State Command' : null,
					'Bauchi State Command' : null,
					'Bayelsa State Command' : null,
					'Benue State Command' : null,
					'Borno State Command' : null,
					'Cross-river State Command' : null,
					'Delta State Command' : null,
					'Ebonyi State Command' : null,
					'Edo State Command' : null,
					'Ekiti State Command' : null,
					'Enugu State Command' : null,
					'FCT Command' : null,
					'Gombe State Command' : null,
					'Imo State Command' : null,
					'Jigawa State Command' : null,
					'Kaduna State Command' : null,
					'Kano State Command' : null,
					'Katsina State Command' : null,
					'Kebbi State Command' : null,
					'Kogi State Command' : null,
					'Kwara State Command' : null,
					'Lagos State Command' : null,
					'Nasarawa State Command' : null,
					'Niger State Command' : null,
					'Ogun State Command' : null,
					'Ondo State Command' : null,
					'Osun State Command' : null,
					'Oyo State Command' : null,
					'Plateau State Command' : null,
					'Rivers State Command' : null,
					'Sokoto State Command' : null,
					'Taraba State Command' : null,
					'Yobe State Command' : null,
					'Zamfara State Command' : null,
					'Zone A HQ, Lagos' : null,
					'Zone B HQ, Kaduna' : null,
					'Zone C HQ, Bauchi' : null,
					'Zone D HQ, Minna' : null,
					'Zone E HQ, Oweri' : null,
					'Zone F HQ, Abeokuta' : null,
					'Zone G HQ, Benin' : null,
					'Zone H HQ, Makurdi' : null,
					'College of Security Management, Abeokuta' : null,
					'College of Peace, Conflic Resolution &Desaster Management, Katsina' : null,
					'Civil Defence Academy, Sauka' : null
				},
			});

			$('.tabs').tabs();

			$('.contact-data').click(function(){
				$('.tabs').tabs('select', 'contact-data');
			});
			$('.official-data').click(function(){
				$('.tabs').tabs('select', 'official-data');
			});
			$('.docs-upload').click(function(){
				$('.tabs').tabs('select', 'docs-upload');
			});

			$('#create_form').submit(function (e) { 
				$('.submit').prop('disabled', true).html('ADDING RECORD...');
			});

			// LOAD LGAs AFTER SELECTING STATE OF ORIGIN
			$('#soo').change(function() {
				let stateSelected = $(this).val();
				// GET ALL LOCAL GOVERNMENT AREAS IN NIGERIA
				axios.get(`${base_url}/get-lgoo/${stateSelected}`)
					.then(function(response) {
						// console.log(response.data);
						let lgaArray = response.data;
						$('#lgoo').html('<option value="" disabled selected>Choose your option</option>');
						lgaArray.map(function(lga) {
							$(`<option value="${lga.id}">${lga.lg_name}</option>`).appendTo('#lgoo');
						});
					})
					.catch(function(error) {
						// handle error
						console.log(error.data);
					})
					.finally(function() {
						// always executed
					});
			});

			$('.submit').click(function(){
				$('.progress').fadeIn();
			});

		});
	</script>
@endpush