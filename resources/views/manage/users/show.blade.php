@extends('layouts.manage')


@section('content')

	<div class="flex-container">
		<div class="columns m-t-10">
			<div class="column">
				<h2 class="title">View Users Informations</h2>
			</div>

			<div class="column">
				<a href="#" class="button is-danger is-pulled-right m-l-10">Delete User</a>
				<a href="{{ route('users.edit', $user->id) }}" class="button is-primary is-pulled-right">Edit User</a>
			</div>
		</div> {{-- end of .columns --}}

		<hr class="m-t-0" style="background-color: silver; height: 0.5px;">

		<div class="field">
			<label for="name" class="label">Name:</label>
			<pre style="font-size: 20px;">{{ $user->name }}</pre>
		</div>
		
		<div class="field">
			<label for="name" class="label">Email:</label>
			<pre style="font-size: 20px;">{{ $user->email }}</pre>
		</div>

		@if($user->spec != "")
			<div class="field">
				<label for="spec" class="label">Specialist</label>
				<pre style="font-size: 20px;">{{ $user->spec }}</pre>
			</div>
		@else
			<div class="field">
				<label for="spec" class="label">Job</label>
				<pre style="font-size: 20px;">Nurse</pre>
			</div>
		@endif

		<div class="field">
			<label for="name" class="label">Role:</label>
			@foreach($user->roles as $role)
				<pre style="font-size: 20px;">{{ $role->display_name }} ({{ $role->description }})</pre>
			@endforeach
		</div>

		
	</div> {{-- end of .flex-container --}}

@endsection