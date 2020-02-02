@extends('layouts.app')

@section('content')
	<div class="my-content-wrapper">
		<div class="content-container white">
			<div class="sectionWrap">
				{{-- STATISTICS --}}
				<div id="card-stats">
					<div class="row mt-1">
						<div class="col s12 m6 l3">
							<div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text">
								<div class="padding-4">
									<div class="col s4 m4">
										<i class="material-icons background-round mt-5">folder_shared</i>
									</div>
									<div class="col s8 m8 right-align">
										<h5 class="mb-0">53534</h5>
										<p class="no-margin">Personnel Files</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col s12 m6 l3">
							<div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text">
								<div class="padding-4">
									<div class="col s4 m4">
										<i class="material-icons background-round mt-5">folder</i>
									</div>
									<div class="col s8 m8 right-align">
										<h5 class="mb-0">4534</h5>
										<p class="no-margin">Policy Files</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col s12 m6 l3">
							<div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text">
								<div class="padding-4">
									<div class="col s4 m4">
										<i class="material-icons background-round mt-5">repeat</i>
									</div>
									<div class="col s8 m8 right-align">
										<h5 class="mb-0">345</h5>
										<p class="no-margin">File Transactions</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col s12 m6 l3">
							<div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text">
								<div class="padding-4">
									<div class="col s4 m4">
										<i class="material-icons background-round mt-5">done_all</i>
									</div>
									<div class="col s8 m8 right-align">
										<h5 class="mb-0">155</h5>
										<p class="no-margin">Completed</p>
									</div>
								</div>
							</div>
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
