@extends('layouts.app')

@section('content')
	<div class="my-content-wrapper">
		<div class="content-container white">
			<div class="sectionWrap">

				{{-- Shows records restricted info --}}
				@includeWhen(auth()->user()->isAdmin, 'dashboard.extended.admin')

				{{-- Shows account restricted info --}}
				@includeWhen(!auth()->user()->isAdmin, 'dashboard.extended.user')

				
			</div>
		</div>
		<div class="footer z-depth-1">
			<p>&copy; Courier Management System</p>
		</div>
	</div>
@endsection
