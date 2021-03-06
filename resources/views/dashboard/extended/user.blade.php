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
						<h5 class="mb-0">0</h5>
						<p class="no-margin">Pending</p>
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
						<p class="no-margin">In-progress</p>
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
						<p class="no-margin">Cancelled</p>
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

{{-- TABLE --}}
<div class="sectionTableWrap" style="padding-top:0px;">
	<h6 style="padding:12px; background:#eee; text-align:center; font-weight:bold;">Deliveries In-progress</h6>
	<table class="highlight responsive-table centered">
		<thead>
			<tr>
				<th>Ref No.</th>
				<th>Reciever Name</th>
				<th>R.Gender</th>
				<th>R.Phone</th>
				<th>R.State</th>
				<th>R.LGA</th>
				<th>R.Address</th>
				<th>Weight</th>
				<th>Cost</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($deliveries as $delivery)
			@if($delivery->status == 0 || $delivery->status == 1)
				<tr>
					<td>{{ $delivery->RefNo }}</td>
					<td>{{ ucwords($delivery->recieverName) }}</td>
					<td>{{ ucwords($delivery->gender) }}</td>
					<td>{{ ucwords($delivery->phone) }}</td>
					<td>{{ ucwords($delivery->state) }}</td>
					<td>{{ ucwords($delivery->lga) }}</td>
					<td>{{ ucwords($delivery->address) }}</td>
					<td>{{ ucwords($delivery->weight) }}</td>
					<td>{{ ucwords($delivery->cost) }}</td>
					<td>{{ $delivery->status == 0 ? 'Pending' : 'In-progress' }}</td>
					<td>
						@if($delivery->status == 1)
						<a href="{{ route('requestReciept', $delivery->id) }}" class="btn waves-effect green waves-light">Reciept</a>
						@endif

						<a href="{{ route('declineUser', $delivery->id) }}" class="btn waves-effect red waves-light">Cancel</a>
					</td>
				</tr>
			@else
				<tr>
					<td colspan="10" style="text-align:center;">No Data Available</td>
				</tr>
			@endif
			@endforeach
		</tbody>
	</table>
</div>