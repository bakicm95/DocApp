@extends('layouts.manage')


@section('content')
	
	<div class="flex-container">
		<div class="columns">
			<div class="column">
				<h1 class="title">Create New User</h1>
			</div>
		</div> {{-- end of .columns --}}

		<hr class="m-t-0" style="background-color: silver; height: 0.5px;">
		
		@include('layouts.errors')

		<form action="{{ route('users.store') }}" method="post">
			{{ csrf_field() }}

			<div class="columns">
				<div class="column is-three-fifths">
					
					<div class="field">
						<label for="name" class="label">Name</label>
						<p class="control">
							<input type="text" class="input" name="name" id="name">
						</p>
					</div>

					<div class="field">
						<label for="email" class="label">Email</label>
						<p class="control">
							<input type="email" class="input" name="email" id="email">
						</p>
					</div>

					<div class="field">
						<label for="password" class="label">Password</label>
						<p class="control">
							<input type="password" class="input" name="password" id="password" v-if="!auto_password" placeholder="Manually give a password to User">
							<b-checkbox class="m-t-15" name="auto_generate" v-model="auto_password">Auto Generate Password</b-checkbox>
						</p>
					</div>

				</div> {{-- end of .column --}}


				<div class="column">
					<label for="role" class="label">Role</label>
					<input type="hidden" name="roles" :value="rolesSelected">
					@foreach($roles as $role)
						<div class="field">
							<b-checkbox class="m-t-15" v-model="rolesSelected" name="role" :native-value="{{ $role->id }}">{{ $role->display_name }}</b-checkbox>
						</div>
					@endforeach
				</div> {{-- end of .column --}}

				<div class="column" v-if="rolesSelected == 1" >
					<label for="spec" class="label">Specialist</label>
					<input type="hidden" name="specs" :value="specsSelected">

					<div class="field">
						<b-checkbox class="m-t-15" v-model="specsSelected" name="spec" native-value="Primary_care">Primary Care</b-checkbox>
					</div>

					<div class="field">
						<b-checkbox class="m-t-15" v-model="specsSelected" name="spec" native-value="Pediatrician">Pediatrician</b-checkbox>
					</div>

					<div class="field">
						<b-checkbox class="m-t-15" v-model="specsSelected" name="spec" native-value="Oftamologist">Oftamologist</b-checkbox>
					</div>

					<div class="field">
						<b-checkbox class="m-t-15" v-model="specsSelected" name="spec" native-value="Neurologist">Neurologist</b-checkbox>
					</div>

					<div class="field">
						<b-checkbox class="m-t-15" v-model="specsSelected" name="spec" native-value="Gynecologist">Gynecologist</b-checkbox>
					</div>
					
				</div> {{-- end of .column --}}
			</div> {{-- end of .columns --}}

			<div class="columns">
				<div class="column">
					<hr class="m-t-0" style="background-color: silver; height: 1px;"> {{-- Submit Btn --}}
					<button class="button is-primary is-pulled-left m-t-10" style="width: 250px;">Create User</button>
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
				auto_password: true,
				specsSelected: [],
				rolesSelected: [{!! old('roles') ? old('roles') : '' !!}]
			}
		});
	</script>
@endsection