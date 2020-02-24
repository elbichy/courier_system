@extends('layouts.app')

@section('content')
	<div class="my-content-wrapper">
		<div class="content-container white">
			<div class="sectionWrap">
				{{-- TABLE --}}
                <div class="sectionTableWrap" style="padding-top:0px;">
                    <h6 style="padding:12px; background:#eee; text-align:center; font-weight:bold;">Completed Deliveries</h6>
                    <table class="highlight responsive-table centered">
                        <thead>
                            <tr>
                                <th>Ref No.</th>
                                <th>State</th>
                                <th>LGA</th>
                                <th>Address</th>
                                <th>Weight</th>
                                <th>Cost</th>
                                <th>Teller No.</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($deliveries as $delivery)
                                <tr>
                                    <td>{{ $delivery->RefNo }}</td>
                                    <td>{{ ucwords($delivery->state) }}</td>
                                    <td>{{ ucwords($delivery->lga) }}</td>
                                    <td>{{ ucwords($delivery->address) }}</td>
                                    <td>{{ ucwords($delivery->weight) }}</td>
                                    <td>{{ ucwords($delivery->cost) }}</td>
                                    <td>{{ ucwords($delivery->tellerNumber) }}</td>
                                </tr>
                            @endforeach
                            @if($deliveries->count() < 1)
                                <tr>
                                    <td colspan="7" style="text-align:center;">No Data Available</td>
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