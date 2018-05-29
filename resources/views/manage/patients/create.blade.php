@extends('layouts.manage')


@section('content')
	
	<div class="flex-container">
		<div class="columns">
			<div class="column">
				<h1 class="title">Create New Patient</h1>
			</div>
		</div> {{-- end of .columns --}}

		<hr class="m-t-0" style="background-color: silver; height: 0.5px;">
		
		@include('layouts.errors')

		<form action="{{ route('patients.store') }}" method="post">
			{{ csrf_field() }}

			<div class="columns">
				<div class="column">
					
					<div class="field"> {{-- NAME --}}
						<label for="name" class="label">Name</label>
						<p class="control">
							<input type="text" class="input" name="name" id="name">
						</p>
					</div>

					<div class="field"> {{-- EMAIL --}}
						<label for="email" class="label">Email</label>
						<p class="control">
							<input type="email" class="input" name="email" id="email">
						</p>
					</div>


					<div class="field"> {{-- JMBG --}}
						<label for="jmbg" class="label">JMBG</label>
						<p class="control">
							<input type="text" class="input" name="jmbg" id="jmbg">
						</p>
					</div>
		
					<div class="field">
						<label for="Gender" class="label">Gender</label>

						<div class="field">
							<b-radio name="gender" v-model="gender" native-value="Male">Male</b-radio>
						</div>

						<div class="field">
							<b-radio name="gender" v-model="gender" native-value="Female">Female</b-radio>
						</div>

					</div> {{-- end of .field --}}


				</div> {{-- end of .column --}}

				<div class="column">
					<div class="field"> {{-- Date of Birth --}}
						<label for="dateofb" class="label">Date of Birth</label>
						<p class="control">
							<input type="text" class="input" name="dateofb" id="dateofb">
						</p>
					</div>

					<div class="field"> {{-- Home Address --}}
						<label for="homeaddress" class="label">Home Address</label>
						<p class="control">
							<input type="text" class="input" name="homeaddress" id="homeaddress">
						</p>
					</div>
				
					<div class="field"> {{-- Phone Number --}}
						<label for="phonenumber" class="label">Phone Number</label>
						<p class="control">
							<input type="text" class="input" name="phonenumber" id="phonenumber">
						</p>
					</div>
				</div> {{-- end of .column --}}
			</div> {{-- end of .columns --}}

			<div class="columns">
				<div class="column">
					<hr class="m-t-0" style="background-color: silver; height: 1px;"> {{-- Submit Btn --}}
					<button class="button is-primary is-pulled-left m-t-10" style="width: 250px;">Create Patient</button>
				</div>
			</div>

		</form> {{-- end of form --}}

	</div> {{-- end of .flex-container --}}

@endsection

@section('scripts')
	<script>
		var app = new Vue({
			el: '#app',
			data: {
				gender: 'Male'
			}
		});
	</script>
@endsection