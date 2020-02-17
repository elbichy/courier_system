@extends('layouts.app')

@section('content')
	<div class="my-content-wrapper">
		<div class="content-container white">
			<div class="sectionWrap">
                {{-- TABLE --}}
                <div class="sectionTableWrap" style="padding-top:0px;">
                    <h6 style="padding:12px; background:#eee; text-align:center; font-weight:bold;">New Delivery Request</h6>
                    <form action="{{ route('deliveryStore') }}" method="POST" enctype="multipart/form-data" name="create_form" id="create_form">
						@csrf
						<div class="row">
							{{-- Sender name --}}
							<div class="input-field col s12 l4">
							<input id="senderName" name="senderName" type="text" value="{{ auth()->user()->name }}" required readonly>
								<label for="senderName">Sender Name</label>
							</div>
							{{-- State --}}
							<div class="input-field col s12 l4">
								<input id="state" name="state" type="text" required>
								@if ($errors->has('state'))
									<span class="helper-text red-text">
										<strong>{{ $errors->first('state') }}</strong>
									</span>
								@endif
								<label for="state">State</label>
							</div>
							{{-- LGA --}}
							<div class="input-field col s12 l4">
								<input id="lga" name="lga" type="text" required>
								@if ($errors->has('lga'))
									<span class="helper-text red-text">
										<strong>{{ $errors->first('lga') }}</strong>
									</span>
								@endif
								<label for="lga">LGA</label>
							</div>
							{{-- Address --}}
							<div class="input-field col s12 l6">
								<input id="address" name="address" type="text" required>
								@if ($errors->has('address'))
									<span class="helper-text red-text">
										<strong>{{ $errors->first('address') }}</strong>
									</span>
								@endif
								<label for="address">Address</label>
							</div>
							{{-- Weight --}}
							<div class="input-field col s12 l3">
								<input id="weight" name="weight" type="text" required>
								@if ($errors->has('weight'))
									<span class="helper-text red-text">
										<strong>{{ $errors->first('weight') }}</strong>
									</span>
								@endif
								<label for="weight">Weight</label>
							</div>
							{{-- Cost --}}
							<div class="input-field col s12 l3">
								<input id="cost" name="cost" type="text" required>
								@if ($errors->has('cost'))
									<span class="helper-text red-text">
										<strong>{{ $errors->first('cost') }}</strong>
									</span>
								@endif
								<label for="cost">Cost</label>
							</div>
							{{-- Teller number --}}
							<div class="input-field col s12 l4">
								<input id="tellerNumber" name="tellerNumber" type="text" required>
								@if ($errors->has('tellerNumber'))
									<span class="helper-text red-text">
										<strong>{{ $errors->first('tellerNumber') }}</strong>
									</span>
								@endif
								<label for="tellerNumber">Teller No.</label>
							</div>
							
							{{-- Description --}}
							<div class="input-field col s12 l8">
								<textarea id="description" name="description" class="materialize-textarea"></textarea>
								@if ($errors->has('description'))
									<span class="helper-text red-text">
										<strong>{{ $errors->first('description') }}</strong>
									</span>
								@endif
								<label for="description">Description</label>
							</div>
							
							<div class="input-field col s12 l3 right">
								<button class="submit btn waves-effect waves-light right" type="submit"><i class="material-icons right">send</i>Place Request</button>
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