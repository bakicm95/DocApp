@extends('layouts.manage')


@section('content')

<script>
	function currentAppointment() {
		var x = document.getElementById("currentForm");
		if (x.style.display === "none") {
			x.style.display = "block";
		} else {
			x.style.display = "none";
		}
	}

	function scheduleAppointment() {
		var x = document.getElementById("scheduleForm");
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

			<a href="#" class="button is-primary m-t-15" onclick="currentAppointment()">Current Appointment</a>
			<a href="#" class="button is-primary m-t-15 m-l-100" onclick="scheduleAppointment()">Schedule an Appointment</a>

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
		<div class="column is-three-quarters">
			<div class="m-t-10 m-b-10">
				@include('layouts.errors')
			</div>

			{{-- FORM FOR CURRENT APPOINTMENT --}}
			<form action="{{ route('appointments.store', $patient->id) }}" method="post" id="currentForm" style="display: none;">
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
				<input type="hidden" name="checked" value="false">

				<div class="field">
					<button class="button is-primary">Submit</button>
				</div>

			</form> {{-- end of FORM FOR CURRENT APPOINTMENT --}}


			{{-- SCHEDULE AN APPOINTMENT FORM --}}
			<form action="{{ route('appointments.store', $patient->id) }}" method="post" id="scheduleForm" style="display: none;">
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

				<div class="field">
					<div class="columns">

						<div class="column">
							<label for="appointment_date" class="label">Select Month</label>
							<p class="control">
								<div class="control">
									<div class="select is-primary">
										<select class="is-focused" name="appointment_date_month">
											<option value="1">January</option>
											<option value="2">February</option>
											<option value="3">March</option>
											<option value="4">April</option>
											<option value="5">May</option>
											<option value="6">June</option>
											<option value="7">July</option>
											<option value="8">August</option>
											<option value="9">September</option>
											<option value="10">October</option>
											<option value="11">November</option>
											<option value="12">December</option>
										</select>
									</div>
								</div>
							</p>
						</div>

						<div class="column">
							<label for="appointment_date" class="label">Insert Day</label>
							<p class="control">
								<input type="number" class="input" name="appointment_date_days">
							</p>
						</div>

						<div class="column">
							<label for="appointment_date" class="label">Insert Hours</label>
							<div class="control">
								<input type="number" class="input" name="appointment_date_hours">
							</div>
						</div>

						<div class="column">
							<label for="appointment_date" class="label">Insert Minutes</label>
							<div class="control">
								<input type="number" class="input" name="appointment_date_minutes">
							</div>
						</div>

					</div>	{{-- end of .columns --}}
				</div> {{-- end of .field --}}

				<input type="hidden" name="patient_id" value="{{ $patient->id }}">
				<input type="hidden" name="patient_name" value="{{ $patient->name }}">
				<input type="hidden" name="checked" value="true">

				<div class="field">
					<button class="button is-primary">Submit</button>
				</div>

			</form> {{-- end of SCHEDULE AN APPOINTMENT FORM --}}

		</div> {{-- end of .column --}}
	</div>	{{-- end of .columns --}}
	

</div> {{-- end of .flex-container --}}

@endsection