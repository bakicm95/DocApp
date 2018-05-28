@extends('layouts.manage')


@section('content')

	<div class="flex-container">
		<div class="columns m-t-10">
			<div class="column">
				<h2 class="title">View Patient Informations</h2>
			</div>

			<div class="column">
				<a href="#" class="button is-danger is-pulled-right m-l-10">Delete Patient</a>
				<a href="{{ route('patients.edit', $patient->id) }}" class="button is-primary is-pulled-right">Edit Patient</a>
			</div>
		</div> {{-- end of .columns --}}

		<hr class="m-t-0" style="background-color: silver; height: 0.5px;">

		<div class="field">
			<label for="name" class="label">Name:</label>
			<pre style="font-size: 20px;">{{ $patient->name }}</pre>
		</div>
		
		<div class="field">
			<label for="name" class="label">Email:</label>
			<pre style="font-size: 20px;">{{ $patient->email }}</pre>
		</div>

		<div class="field">
			<label for="name" class="label">JMBG:</label>
			<pre style="font-size: 20px;">{{ $patient->jmbg }}</pre>
		</div>
		
		<div class="field">
			<label for="name" class="label">Gender:</label>
			<pre style="font-size: 20px;">{{ $patient->gender }}</pre>
		</div>

		<div class="field">
			<label for="name" class="label">Date of Birth:</label>
			<pre style="font-size: 20px;">{{ $patient->dateofb }}</pre>
		</div>

		<div class="field">
			<label for="name" class="label">Home Address:</label>
			<pre style="font-size: 20px;">{{ $patient->homeaddress }}</pre>
		</div>

		<div class="field">
			<label for="name" class="label">Phone Number:</label>
			<pre style="font-size: 20px;">{{ $patient->phonenumber }}</pre>
		</div>

		<div class="field">
			<label for="name" class="label">Join Date:</label>
			<pre style="font-size: 20px;">{{ $patient->created_at->toDayDateTimeString() }}</pre>
		</div>

		
	</div> {{-- end of .flex-container --}}

@endsection