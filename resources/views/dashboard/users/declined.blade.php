@extends('layouts.app')

@section('content')
	<div class="my-content-wrapper">
		<div class="content-container white">
			<div class="sectionWrap">
                {{-- TABLE --}}
                <div class="sectionTableWrap" style="padding-top:0px;">
                    <h6 style="padding:12px; background:#eee; text-align:center; font-weight:bold;">Declined Users</h6>
                    <table class="highlight responsive-table centered">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Fullname</th>
                                <th>Gender</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ ucwords($user->name) }}</td>
                                    <td>{{ ucwords($user->gender) }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a href="{{ route('approveUser', $user->id) }}" class="btn waves-effect green waves-light">Approve</a>
                                        <form action="{{ route('deleteUser', $user->id) }}" method="POST" style="display:inline;">
                                            @method('DELETE')
						                    @csrf
                                            <button type="submit" class="btn waves-effect red waves-light">Delete</a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @if($users->count() < 1)
                                <tr>
                                    <td colspan="6" style="text-align:center;">No Data Available</td>
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