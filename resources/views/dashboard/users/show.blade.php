@extends('layouts.app', ['title' => 'Staff Profile' ])

@section('content')
    <div class="my-content-wrapper">
        <div class="content-container white">
            <div class="sectionWrap z-depth-0">
                <div class="sectionProfileWrap z-depth-0" style="margin-top:18px; padding:0;">
					<h5 style="padding:8px; width:100%; margin:0 0 20px 0; border-bottom: 2px dotted #ccc; text-align:center; font-weight:bold;">{{ $personnel->name }}'s File</h5>
					
					{{-- PROFILE INFO --}}
					<div class="profile">
						<div class="row infoWrap">
							{{-- BASIC INFORMATION --}}
							<div class="row">
								<div class="col s12 l3">
									<div class="detailWrap">
										<h6>Service name</h6>
										<p>{{ $personnel->name }}</p>
									</div>
								</div>
								<div class="col s12 l3">
									<div class="detailWrap">
										<h6>Gender</h6>
										<p>{{ $personnel->gender }}</p>
									</div>
								</div>
								<div class="col s12 l3">
									<div class="detailWrap">
										<h6>Date of Birth</h6>
										<p>{{ $personnel->dob }}</p>
									</div>
								</div>
								<div class="col s12 l3">
									<div class="detailWrap">
										<h6>Religion</h6>
										<p>{{ $personnel->religion }}</p>
									</div>
								</div>
								<div class="col s12 l3">
									<div class="detailWrap">
										<h6>Tribe</h6>
										<p>{{ $personnel->tribe }}</p>
									</div>
								</div>
								<div class="col s12 l3">
									<div class="detailWrap">
										<h6>Region</h6>
										<p>{{ $personnel->geoPol }}</p>
									</div>
								</div>
								<div class="col s12 l3">
									<div class="detailWrap">
										<h6>State of origin</h6>
										<p>{{ $state !== NULL ? $state->state_name : '' }}</p>
									</div>
								</div>
								<div class="col s12 l3">
									<div class="detailWrap">
										<h6>LGA</h6>
										<p>{{ $lga !== NULL ? $lga->lg_name : '' }}</p>
									</div>
								</div>
								<div class="col s12 l6">
									<div class="detailWrap">
										<h6>Address</h6>
										<p>{{ $personnel->address }}</p>
									</div>
								</div>
								<div class="col s12 l3">
									<div class="detailWrap">
										<h6>Phone</h6>
										<p>{{ $personnel->phone }}</p>
									</div>
								</div>
								<div class="col s12 l3">
									<div class="detailWrap">
										<h6>Email</h6>
										<p>{{ $personnel->email }}</p>
									</div>
								</div>
								<div class="col s12 l3">
									<div class="detailWrap">
										<h6>Service no.</h6>
										<p>{{ $personnel->service_number }}</p>
									</div>
								</div>
								<div class="col s12 l3">
									<div class="detailWrap">
										<h6>Date of 1st Appt.</h6>
										<p>{{ $personnel->dofa }}</p>
									</div>
								</div>
								<div class="col s12 l3">
									<div class="detailWrap">
										<h6>Date of Confirmation</h6>
										<p>{{ $personnel->doc }}</p>
									</div>
								</div>
								<div class="col s12 l3">
									<div class="detailWrap">
										<h6>Date of Present Appt.</h6>
										<p>{{ $personnel->dopa }}</p>
									</div>
								</div>
								<div class="col s12 l5">
									<div class="detailWrap">
										<h6>Current Rank</h6>
										<p>{{ $rank !== NULL ? $rank->full_title : '' }}</p>
									</div>
								</div>
								<div class="col s12 l3">
									<div class="detailWrap">
										<h6>Category</h6>
										<p>{{ $personnel->type }}</p>
									</div>
								</div>
								<div class="col s12 l4">
									<div class="detailWrap">
										<h6>Serving Command</h6>
										<p>{{ $personnel->command }}</p>
									</div>
								</div>
								<div class="col s12 l3">
									<div class="detailWrap">
										<h6>Bank</h6>
										<p>{{ $personnel->bank }}</p>
									</div>
								</div>
								<div class="col s12 l3">
									<div class="detailWrap">
										<h6>IPPS No.</h6>
										<p>{{ $personnel->ippisNo }}</p>
									</div>
								</div>
								<div class="col s12 l3">
									<div class="detailWrap">
										<h6>Account Name</h6>
										<p>{{ $personnel->accName }}</p>
									</div>
								</div>
								<div class="col s12 l3">
									<div class="detailWrap">
										<h6>Account No.</h6>
										<p>{{ $personnel->accNo }}</p>
									</div>
								</div>
								<div class="col s12 l3">
									<div class="detailWrap">
										<h6>Account No.</h6>
										<p>{{ $personnel->accNo }}</p>
									</div>
								</div>
								<div class="col s12 l3">
									<div class="detailWrap">
										<h6>Command</h6>
										<p>{{ $personnel->command }}</p>
									</div>
								</div>
							</div>
						</div>
						<div class="sideColumn">
							<div class="profilePic">
								@if ($personnel->passport == NULL)
									<img src="{{ asset('storage/avaterMale.jpg') }}" alt="Profile Pic" width="100%">
								@else
									<img src="{{ asset('storage/documents/'.$personnel->service_number.'/passport/'.$personnel->passport) }}" alt="Profile Pic" width="100%">
								@endif
							</div>
							<a href="{{ route('editPersonnel', $personnel->service_number) }}" class="edit waves-effect waves-light btn"><i class="fas fa-user-edit"></i> EDIT RECORD</a>
							<a class="delete waves-effect waves-light btn"><i class="fas fa-user-times"></i> DELETE RECORD</a>
							 {{-- DELETE PERSONNEL FORM --}}
							 <form action="{{ route('deletePersonnel', $personnel->id) }}" method="post" id="deletePersonnel">
								@method('delete')
								@csrf
							</form>
						</div>
					</div>

					{{-- PERSONNEL DOCUMENTS --}}
					<fieldset>
						<legend>PERSONNEL CREDENTIALS</legend>
						<div class="docWrapper">
							@if(!$personnel->documents->isEmpty())
								@foreach($personnel->documents as $document)
									<ul>
										<a href="#" class="deleteDocument" id="delete"><i class="tiny material-icons">close</i></a>
										{{-- DELETE DOCUMENT FORM --}}
										<form action="{{ route('deletePersonnelDocument', $document->id) }}" method="post" id="deletePersonnelDocument">
											@method('delete')
											@csrf
										</form>

										<li>
											<a href="{{ asset('storage/documents/'.$personnel->service_number.'/'.$document->file) }}" data-lightbox="documents"  data-title="{{ strtoupper($document->title) }}">
												<img src="{{ asset('storage/documents/'.$personnel->service_number.'/'.$document->file) }}" width="80px">
											</a>
										</li>
										<li>{{ strtoupper($document->title) }}</li>
									</ul>
								@endforeach
							@else
								<tr>
									<td colspan="2" style="text-align:center;">No Documents Uploaded</td>
								</tr>
							@endif
						</div>
					</fieldset>
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
		lightbox.option({
			'resizeDuration': 200,
			'wrapAround': true,
			'fitImagesInViewport': true,
			'maxHeight': 800,
			'disableScrolling': false
		});
        $(function() {
			$('.delete').click(function(event){
				event.preventDefault();
				if(confirm("Are you sure you want to delete personnel?")){
					$('#deletePersonnel').submit();
				}
			});
			$('.deleteDocument').click(function(event){
				event.preventDefault();
				
				if(confirm("Are you sure you want to delete document?")){
					event.currentTarget.nextElementSibling.submit();
				}
			});
        });
    </script>
@endpush