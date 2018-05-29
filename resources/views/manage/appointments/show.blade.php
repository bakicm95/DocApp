@extends('layouts.manage')

@section('content')

	<div class="flex-container">
		<div class="columns m-t-10">
			<div class="column">
				<h1 class="title">{{ $appointment->title }}</h1>
			</div>

			<div class="column">
				<a href="#" class="button is-danger is-pulled-right m-l-10">Delete Appointment</a>
				<a href="{{ route('appointments.edit', $appointment->id) }}" class="button is-primary is-pulled-right">Edit Appointment</a>
			</div>

		</div> {{-- end of .columns --}}


		<hr class="m-t-0" style="background-color: silver; height: 0.5px;">
		
		<div class="card">
			<div class="card-header">
				<div class="card-header-title"><i>{{ $appointment->title }}</i></div>
			</div>
			<div class="card-content">
				<label for="" class="label">Report:</label><hr style="width: 200px; padding: 0; margin: 5px;">
				{{ $appointment->report }}
			</div>
			<div class="card-footer">
				<div class="card-footer-item"><i>dr {{ $appointment->doctor_name }}</i></div>
				<div class="card-footer-item"><i>{{ $appointment->created_at->toDayDateTimeString() }}</i></div>
			</div>
		</div>




	</div> {{-- end of .flex-container --}}

@endsection