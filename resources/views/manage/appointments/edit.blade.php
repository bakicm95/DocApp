@extends('layouts.manage')


@section('content')

<div class="flex-container">
	<div class="columns">
		<div class="column">
			<h1 class="title">Edit Appointment</h1>
		</div>

		<div class="column">
			
		</div>
	</div> {{-- end of .columns --}}

		<hr style="background-color: silver; height: 0.5px;">

		<form action="{{ route('appointments.update', $patient->id) }}" method="post">
				{{ method_field('PUT') }}
				{{ csrf_field() }}

				<div class="field">
					<label for="Title" class="label">Title</label>
					<p class="control">
						<input type="text" class="input" name="title" value="{{ $appointment->title }}">
					</p>
				</div>
				
				<div class="field">
					<label for="Title" class="label">Report</label>
					<p class="control">
						<textarea name="report" id="" cols="30" rows="10" class="textarea">{{ $appointment->report }}</textarea>
					</p>
				</div>

				<input type="hidden" name="patient_id" value="{{ $patient->id }}">
				<input type="hidden" name="patient_name" value="{{ $patient->name }}">

				<div class="field">
					<button class="button is-primary">Submit</button>
				</div>

			</form>


	
</div> {{-- end of .flex-container --}}

@endsection