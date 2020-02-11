@extends('layouts.app')

@section('content')
	<div class="my-content-wrapper">
		<div class="content-container white">
			<div class="sectionWrap">
                {{-- TABLE --}}
                <div class="sectionTableWrap" style="padding-top:0px;">
                    <h6 style="padding:12px; background:#eee; text-align:center; font-weight:bold;">Edit Prifile Details</h6>
                    <form action="{{ route('updateProfile') }}" method="POST" enctype="multipart/form-data" name="create_form" id="create_form">
						@method('PUT')
						@csrf
						<div class="row">
							{{-- Username --}}
							<div class="input-field col s12 l3">
								<input id="username" type="text" value="{{ $user->username }}" readonly>
								<label for="username">Username</label>
							</div>
							{{-- Fullname --}}
							<div class="input-field col s12 l3">
								<input id="name" name="name" type="text" value="{{ $user->name }}" required>
								@if ($errors->has('name'))
									<span class="helper-text red-text">
										<strong>{{ $errors->first('name') }}</strong>
									</span>
								@endif
								<label for="name">Fullname</label>
							</div>
							{{-- Gender --}}
							<div class="col s12 l3">
								<label for="gender">Select Gender</label>
								<select id="gender" name="gender" class=" browser-default">
									<option disabled>Select Type</option>
									<option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
									<option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
									<option value="other" {{ $user->gender == 'other' ? 'selected' : '' }}>Other</option>
								</select>
								@if ($errors->has('gender'))
									<span class="helper-text red-text">
										<strong>{{ $errors->first('gender') }}</strong>
									</span>
								@endif
							</div>
							{{-- Phone --}}
							<div class="input-field col s12 l3">
								<input id="phone" name="phone" type="text" value="{{ $user->phone }}">
								@if ($errors->has('phone'))
									<span class="helper-text red-text">
										<strong>{{ $errors->first('phone') }}</strong>
									</span>
								@endif
								<label for="phone">Phone</label>
							</div>
						</div>
						<div class="row">
							{{-- Email --}}
							<div class="input-field col s12 l3">
								<input id="email" name="email" type="text" value="{{ $user->email }}">
								@if ($errors->has('email'))
									<span class="helper-text red-text">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
								<label for="email">Email</label>
							</div>
	
							<div class="input-field col s12 l3 left">
								<button class="submit btn waves-effect waves-light left" type="submit"><i class="material-icons right">send</i>UPDATE</button>
							</div>
						</div>
					</form>
                </div>
			</div>
		</div>
		<div class="footer z-depth-1">
			<p>&copy; Courier Management System</p>
		</div>
	</div>
@endsection