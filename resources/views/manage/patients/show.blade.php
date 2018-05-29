@extends('layouts.manage')


@section('content')

<script>
	function addForm() {
		var x = document.getElementById("addForm");
		if (x.style.display === "none") {
			x.style.display = "block";
		} else {
			x.style.display = "none";
		}
	}
</script>

<div class="flex-container">
	<div class="columns m-t-10">
		<div class="column">
			<h2 class="title">{{ $patient->name }}'s Profile</h2>
		</div>

		<div class="column">
			{{-- for any button or something else in future >>>> right side <<<< --}}
		</div>
	</div> {{-- end of .columns --}}

	<hr class="m-t-0" style="background-color: silver; height: 0.5px;">

	<div class="columns">
		<div class="column">
			<div class="card" style="width: 500px;">
				<div class="card-content">
					<label style="font-size: 18px;">Name:</label><span class="m-l-20" style="font-size: 18px;"><i>{{ $patient->name }}</i></span><hr style="padding: 0; margin: 3px;">
					<label style="font-size: 18px">Email:</label><span class="m-l-20" style="font-size: 18px;"><i>{{ $patient->email }}</i></span><hr style="padding: 0; margin: 3px;">
					<label style="font-size: 18px">JMBG:</label><span class="m-l-20" style="font-size: 18px;"><i>{{ $patient->jmbg }}</i></span><hr style="padding: 0; margin: 3px;">
					<label style="font-size: 18px">Gender:</label><span class="m-l-20" style="font-size: 18px;"><i>{{ $patient->gender }}</i></span><hr style="padding: 0; margin: 3px;">
					<label style="font-size: 18px">Date of Birth:</label><span class="m-l-20" style="font-size: 18px;"><i>{{ $patient->dateofb }}</i></span>
					<hr style="padding: 0; margin: 3px;">
					<label style="font-size: 18px">Address:</label><span class="m-l-20" style="font-size: 18px;"><i>{{ $patient->homeaddress }}</i></span><hr style="padding: 0; margin: 3px;">
					<label style="font-size: 18px">Phone Number:</label><span class="m-l-20" style="font-size: 18px;"><i>{{ $patient->phonenumber }}</i></span><hr style="padding: 0; margin: 3px;">
					<label style="font-size: 18px">Join Date:</label><span class="m-l-20" style="font-size: 18px;"><i>{{ $patient->created_at->toDayDateTimeString()  }}</i></span><br>
				</div>
			</div> {{-- end of .card --}}

			<a href="#" class="button is-primary m-t-15" onclick="addForm()">Schedule an Appointment</a>

		</div> {{-- end of .column --}}

		<div class="column">
			<a href="{{ route('patients.edit', $patient->id) }}" class="button is-primary">Edit Patient</a>
			<a href="#" class="button is-danger is-pulled-right">Delete Patient</a>
			

			<hr class="m-t-0" style="background-color: silver; height: 1px;">

			<div class="card" style="width: 500px;">
				<div class="card-header">
					<div class="card-header-title">
						<i>{{ $patient->name }}'s Appointments List</i>
					</div>
				</div>
				<div class="card-content">
					<table class="table is-narrow is-hoverable" style="width: 100%;">
						<thead>
							<tr>
								<th>Title</th>
								<th>Date</th>
							</tr>
						</thead>

						<tbody>
							@if(count($appointments) > 0)
								@foreach($appointments as $appointment)
									<tr>
										<th><a href="{{ route('appointments.show', $appointment->id) }}">{{ $appointment->title }}</a></th>
										<td>{{ $appointment->created_at->toDayDateTimeString() }}</td>
									</tr>
								@endforeach
							@else
								<th style="color: red;">- Patient have no appointment's yet.</th>
							@endif
						</tbody>
					</table> {{-- end of table --}}
				</div>
			</div> {{-- end of .card --}}
		</div>
	</div> {{-- end of .columns --}}
	
	<div class="columns">
		<div class="column is-half">
			<div class="m-t-10 m-b-10">
				@include('layouts.errors')
			</div>
			<form action="{{ route('appointments.store', $patient->id) }}" method="post" id="addForm" style="display: none;">
				{{ csrf_field() }}

				<div class="field">
					<label for="Title" class="label">Title</label>
					<p class="control">
						<input type="text" class="input" name="title">
					</p>
				</div>
				
				<div class="field">
					<label for="Title" class="label">Report</label>
					<p class="control">
						<textarea name="report" id="" cols="30" rows="10" class="textarea"></textarea>
					</p>
				</div>

				<input type="hidden" name="patient_id" value="{{ $patient->id }}">
				<input type="hidden" name="patient_name" value="{{ $patient->name }}">

				<div class="field">
					<button class="button is-primary">Submit</button>
				</div>

			</form>
		</div> {{-- end of .column --}}
	</div>	{{-- end of .columns --}}
	

</div> {{-- end of .flex-container --}}

@endsection