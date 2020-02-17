@extends('layouts.app')

@section('content')
	<div class="my-content-wrapper">
		<div class="content-container white">
			<div class="sectionWrap">
				{{-- TABLE --}}
                <div class="sectionTableWrap" style="padding-top:0px;">
                    <h6 style="padding:12px; background:#eee; text-align:center; font-weight:bold;">Deliveries Pending Approval</h6>
                    <table class="highlight responsive-table centered">
                        <thead>
                            <tr>
                                <th>Ref No.</th>
                                @if(auth()->user()->isAdmin)
                                <th>Sender</th>
                                @endif
                                <th>State</th>
                                <th>LGA</th>
                                <th>Address</th>
                                <th>Weight</th>
                                <th>Cost</th>
                                <th>Teller No.</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($deliveries as $delivery)
                                <tr>
                                    <td>{{ $delivery->RefNo }}</td>
                                    @if(auth()->user()->isAdmin)
                                    <td>{{ ucwords($delivery->senderName) }}</td>
                                    @endif
                                    <td>{{ ucwords($delivery->state) }}</td>
                                    <td>{{ ucwords($delivery->lga) }}</td>
                                    <td>{{ ucwords($delivery->address) }}</td>
                                    <td>{{ ucwords($delivery->weight) }}</td>
                                    <td>{{ ucwords($delivery->cost) }}</td>
                                    <td>{{ ucwords($delivery->tellerNumber) }}</td>
                                    <td>
                                        @if(auth()->user()->isAdmin)
                                        <a href="{{ route('approveDelivery', $delivery->id) }}" class="btn waves-effect green waves-light">Approve</a>
                                        @endif
                                        <a href="{{ route('declineUser', $delivery->id) }}" class="btn waves-effect red waves-light">Cancel</a>
                                    </td>
                                </tr>
                            @endforeach
                            @if($deliveries->count() < 1)
                                <tr>
                                    <td colspan="8" style="text-align:center;">No Data Available</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
			</div>
		</div>
		<div class="footer z-depth-1">
			<p>&copy; Courier Management System</p>
		</div>
	</div>
@endsection
