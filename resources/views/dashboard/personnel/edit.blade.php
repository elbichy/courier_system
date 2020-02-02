@extends('layouts.app', ['title' => 'Edit Personnel Records'])

@section('content')
    <div class="my-content-wrapper">
        <div class="content-container">
            <div class="sectionWrap">
                {{-- SECTION HEADING --}}
                <h6 class="center sectionHeading">EDIT PERSONNEL RECORDS</h6>

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
					<form action="{{ route('updatePersonnel', $personnel->id) }}" method="POST" enctype="multipart/form-data" name="create_form" id="create_form">
						@method('PUT')
						@csrf
						<div id="personal-data" class="col s12">
							<div class="row">
								{{-- Fullname --}}
								<div class="input-field col s12 l8">
									<input id="name" name="name" type="text" value="{{ $personnel->name }}" required>
									@if ($errors->has('name'))
										<span class="helper-text red-text">
											<strong>{{ $errors->first('name') }}</strong>
										</span>
									@endif
									<label for="name">Fullname</label>
								</div>
								{{-- Date of Birth --}}
								<div class="input-field col s12 l4">
									<input id="dob" name="dob" type="text" value="{{ $personnel->dob }}" class="datepicker">
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
										<option value="male" {{ $personnel->gender == 'male' ? 'selected' : '' }}>Male</option>
										<option value="female" {{ $personnel->gender == 'female' ? 'selected' : '' }}>Female</option>
										<option value="other" {{ $personnel->gender == 'other' ? 'selected' : '' }}>Other</option>
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
										<option value="islam" {{ $personnel->religion == 'islam' ? 'selected' : '' }}>Islam</option>
										<option value="christianity" {{ $personnel->religion == 'christianity' ? 'selected' : '' }}>Christianity</option>
										<option value="other" {{ $personnel->religion == 'other' ? 'selected' : '' }}>Other</option>
									</select>
									@if ($errors->has('religion'))
										<span class="helper-text red-text">
											<strong>{{ $errors->first('religion') }}</strong>
										</span>
									@endif
								</div>
								{{-- Tribe --}}
								<div class="input-field col s12 l3">
									<input id="tribe" name="tribe" type="text" value="{{ $personnel->tribe }}">
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
										<option value="north west" {{ $personnel->geoPol == 'north west' ? 'selected' : '' }}>North-West</option>
										<option value="north east" {{ $personnel->geoPol == 'north east' ? 'selected' : '' }}>North-East</option>
										<option value="north central" {{ $personnel->geoPol == 'north central' ? 'selected' : '' }}>North-Central</option>
										<option value="south east" {{ $personnel->geoPol == 'south east' ? 'selected' : '' }}>South-East</option>
										<option value="south south"{{ $personnel->geoPol == 'south south' ? 'selected' : '' }}>South-South</option>
										<option value="south west"{{ $personnel->geoPol == 'south west' ? 'selected' : '' }}>South-West</option>
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
										<option value="1" {{ $personnel->soo == 1 ? 'selected' : '' }}>Abia</option>
										<option value="2" {{ $personnel->soo == 2 ? 'selected' : '' }}>Adamawa</option>
										<option value="3" {{ $personnel->soo == 3 ? 'selected' : '' }}>Akwa-ibom</option>
										<option value="4" {{ $personnel->soo == 4 ? 'selected' : '' }}>Anambra</option>
										<option value="5" {{ $personnel->soo == 5 ? 'selected' : '' }}>Bauchi</option>
										<option value="6" {{ $personnel->soo == 6 ? 'selected' : '' }}>Bayelsa</option>
										<option value="7" {{ $personnel->soo == 7 ? 'selected' : '' }}>Benue</option>
										<option value="8" {{ $personnel->soo == 8 ? 'selected' : '' }}>Borno</option>
										<option value="9" {{ $personnel->soo == 9 ? 'selected' : '' }}>Cross-river</option>
										<option value="10" {{ $personnel->soo == 10 ? 'selected' : '' }}>Delta</option>
										<option value="11" {{ $personnel->soo == 11 ? 'selected' : '' }}>Ebonyi</option>
										<option value="12" {{ $personnel->soo == 12 ? 'selected' : '' }}>Edo</option>
										<option value="13" {{ $personnel->soo == 13 ? 'selected' : '' }}>Ekiti</option>
										<option value="14" {{ $personnel->soo == 14 ? 'selected' : '' }}>Enugu</option>
										<option value="15" {{ $personnel->soo == 15 ? 'selected' : '' }}>Fct</option>
										<option value="16" {{ $personnel->soo == 16 ? 'selected' : '' }}>Gombe</option>
										<option value="17" {{ $personnel->soo == 17 ? 'selected' : '' }}>Imo</option>
										<option value="18" {{ $personnel->soo == 18 ? 'selected' : '' }}>Jigawa</option>
										<option value="19" {{ $personnel->soo == 19 ? 'selected' : '' }}>Kaduna</option>
										<option value="20" {{ $personnel->soo == 20 ? 'selected' : '' }}>Kano</option>
										<option value="21" {{ $personnel->soo == 21 ? 'selected' : '' }}>Katsina</option>
										<option value="22" {{ $personnel->soo == 22 ? 'selected' : '' }}>Kebbi</option>
										<option value="23" {{ $personnel->soo == 23 ? 'selected' : '' }}>Kogi</option>
										<option value="24" {{ $personnel->soo == 24 ? 'selected' : '' }}>Kwara</option>
										<option value="25" {{ $personnel->soo == 25 ? 'selected' : '' }}>Lagos</option>
										<option value="26" {{ $personnel->soo == 26 ? 'selected' : '' }}>Nasarawa</option>
										<option value="27" {{ $personnel->soo == 27 ? 'selected' : '' }}>Niger</option>
										<option value="28" {{ $personnel->soo == 28 ? 'selected' : '' }}>Ogun</option>
										<option value="29" {{ $personnel->soo == 29 ? 'selected' : '' }}>Ondo</option>
										<option value="30" {{ $personnel->soo == 30 ? 'selected' : '' }}>Osun</option>
										<option value="31" {{ $personnel->soo == 31 ? 'selected' : '' }}>Oyo</option>
										<option value="32" {{ $personnel->soo == 32 ? 'selected' : '' }}>Plateau</option>
										<option value="33" {{ $personnel->soo == 33 ? 'selected' : '' }}>Rivers</option>
										<option value="34" {{ $personnel->soo == 34 ? 'selected' : '' }}>Sokoto</option>
										<option value="35" {{ $personnel->soo == 35 ? 'selected' : '' }}>Taraba</option>
										<option value="36" {{ $personnel->soo == 36 ? 'selected' : '' }}>Yobe</option>
										<option value="37" {{ $personnel->soo == 37 ? 'selected' : '' }}>Zamfara</option>
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
										<option value="{{ $personnel->lgoo }}" selected>{{ $lga }}</option>
									</select>
									@if ($errors->has('lgoo'))
										<span class="helper-text red-text">
											<strong>{{ $errors->first('lgoo') }}</strong>
										</span>
									@endif
								</div>
								{{-- Address --}}
								<div class="input-field col s12 l5">
									<input id="address" name="address" type="text" value="{{ $personnel->address }}">
									@if ($errors->has('address'))
										<span class="helper-text red-text">
											<strong>{{ $errors->first('address') }}</strong>
										</span>
									@endif
									<label for="address">Address</label>
								</div>
								{{-- Phone --}}
								<div class="input-field col s12 l2">
									<input id="phone" name="phone" type="text" value="{{ $personnel->phone }}">
									@if ($errors->has('phone'))
										<span class="helper-text red-text">
											<strong>{{ $errors->first('phone') }}</strong>
										</span>
									@endif
									<label for="phone">Phone</label>
								</div>
								{{-- Email --}}
								<div class="input-field col s12 l3">
									<input id="email" name="email" type="text" value="{{ $personnel->email }}">
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
									<input id="service_number" name="service_number" type="text" value="{{ $personnel->service_number }}" required novalidate>
									@if ($errors->has('service_number'))
										<span class="helper-text red-text">
											<strong>{{ $errors->first('service_number') }}</strong>
										</span>
									@endif
									<label for="service_number">File/Svc No.</label>
								</div>

								{{-- Date of 1st Appt. --}}
								<div class="input-field col s12 l3">
									<input id="dofa" name="dofa" type="text" value="{{ $personnel->dofa }}" class="datepicker">
									@if ($errors->has('dofa'))
										<span class="helper-text red-text">
											<strong>{{ $errors->first('dofa') }}</strong>
										</span>
									@endif
									<label for="dofa">Date of 1st Appt.</label>
								</div>
								
								{{-- Date of Conf. --}}
								<div class="input-field col s12 l3">
									<input id="doc" name="doc" type="text" value="{{ $personnel->doc }}" class="datepicker">
									@if ($errors->has('doc'))
										<span class="helper-text red-text">
											<strong>{{ $errors->first('doc') }}</strong>
										</span>
									@endif
									<label for="doc">Date of Conf.</label>
								</div>
								
								{{-- Date of Present Appt. --}}
								<div class="input-field col s12 l3">
									<input id="dopa" name="dopa" type="text" value="{{ $personnel->dopa }}" class="datepicker">
									@if ($errors->has('dopa'))
										<span class="helper-text red-text">
											<strong>{{ $errors->first('dopa') }}</strong>
										</span>
									@endif
									<label for="dopa">Date of Present Appt.</label>
								</div>

								{{-- IPPIS NO --}}
								<div class="input-field col s12 l3">
									<input id="ippisNo" name="ippisNo" type="text" value="{{ $personnel->ippisNo }}">
									@if ($errors->has('ippisNo'))
										<span class="helper-text red-text">
											<strong>{{ $errors->first('ippisNo') }}</strong>
										</span>
									@endif
									<label for="ippisNo">IPPIS No.</label>
								</div>
								
								{{-- BANK --}}
								<div class="input-field col s12 l3">
									<input id="bank" name="bank" type="text" value="{{ $personnel->bank }}">
									@if ($errors->has('bank'))
										<span class="helper-text red-text">
											<strong>{{ $errors->first('bank') }}</strong>
										</span>
									@endif
									<label for="bank">Bank</label>
								</div>
								
								{{-- ACC NAME. --}}
								<div class="input-field col s12 l3">
									<input id="accName" name="accName" type="text" value="{{ $personnel->accName }}">
									@if ($errors->has('accName'))
										<span class="helper-text red-text">
											<strong>{{ $errors->first('accName') }}</strong>
										</span>
									@endif
									<label for="accName">Account Name</label>
								</div>
								
								{{-- ACC NO. --}}
								<div class="input-field col s12 l3">
									<input id="accNo" name="accNo" type="text" value="{{ $personnel->accNo }}">
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
										<option value="uniform" {{ $personnel->type == 'uniform' ? 'selected' : '' }}>Uniform</option>
										<option value="civilian" {{ $personnel->type == 'civilian' ? 'selected' : '' }}>Civilian</option>
									</select>
								</div>

								{{-- Ranks --}}
								<div class="col s12 l4">
									<label for="rank">Select Rank</label>
									<select id="rank" name="rank" class=" browser-default" required>
										<option disabled selected>Select Rank</option>
										<option value="1" {{ $personnel->rank == 1 ? 'selected' : '' }}>Commandant General of Corps</option>
										<option value="2" {{ $personnel->rank == 2 ? 'selected' : '' }}>Deputy Commandant General of Corps</option>
										<option value="3" {{ $personnel->rank == 3 ? 'selected' : '' }}>Assistant Commandant General of Corps</option>
										<option value="4" {{ $personnel->rank == 4 ? 'selected' : '' }}>Commandant of Corps</option>
										<option value="5" {{ $personnel->rank == 5 ? 'selected' : '' }}>Deputy Commandant of Corps</option>
										<option value="6" {{ $personnel->rank == 6 ? 'selected' : '' }}>Assistant Commandant of Corps</option>
										<option value="7" {{ $personnel->rank == 7 ? 'selected' : '' }}>Chief Superintendent of Corps</option>
										<option value="8" {{ $personnel->rank == 8 ? 'selected' : '' }}>Superintendent of Corps</option>
										<option value="9" {{ $personnel->rank == 9 ? 'selected' : '' }}>Deputy Superintendent of Corps</option>
										<option value="10" {{ $personnel->rank == 10 ? 'selected' : '' }}>Assistant Superintendent of Corps I</option>
										<option value="11" {{ $personnel->rank == 11 ? 'selected' : '' }}>Assistant Superintendent of Corps II</option>
										<option value="12" {{ $personnel->rank == 12 ? 'selected' : '' }}>Chief Inspector of Corps</option>
										<option value="13" {{ $personnel->rank == 13 ? 'selected' : '' }}>Deputy Chief Inspector of Corps</option>
										<option value="14" {{ $personnel->rank == 14 ? 'selected' : '' }}>Assistant Chief Inspector of Corps</option>
										<option value="15" {{ $personnel->rank == 15 ? 'selected' : '' }}>Principal Inspector of Corps I</option>
										<option value="16" {{ $personnel->rank == 16 ? 'selected' : '' }}>Principal Inspector of Corps II</option>
										<option value="17" {{ $personnel->rank == 17 ? 'selected' : '' }}>Senior Inspector of Corps</option>
										<option value="18" {{ $personnel->rank == 18 ? 'selected' : '' }}>Inspector of Corps</option>
										<option value="19" {{ $personnel->rank == 19 ? 'selected' : '' }}>Assistant Inspector of Corps</option>
										<option value="20" {{ $personnel->rank == 20 ? 'selected' : '' }}>Chief Corps Assistant</option>7
										<option value="21" {{ $personnel->rank == 21 ? 'selected' : '' }}>Senior Corps Assistant</option>
										<option value="22" {{ $personnel->rank == 22 ? 'selected' : '' }}>Corps Assistant I</option>
										<option value="23" {{ $personnel->rank == 23 ? 'selected' : '' }}>Corps Assistant II</option>
										<option value="24" {{ $personnel->rank == 24 ? 'selected' : '' }}>Corps Assistant III</option>
									</select>
									@if ($errors->has('rank'))
										<span class="helper-text red-text">
											<strong>{{ $errors->first('rank') }}</strong>
										</span>
									@endif
								</div>

								{{-- Command --}}
								<div class="input-field col s12 l3">
									<input type="text" name="command" value="{{ $personnel->command }}" id="autocomplete-input" class="autocomplete">
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