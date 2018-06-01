@extends('layouts.manage')

@section('content')

<div class="flex-container">
  <div class="columns m-t-10">
   <div class="column">
    <h1 class="title">List of Appointments</h1>
  </div>

  <div class="column">
    <a href="{{ route('appointments.create') }}" class="button is-primary is-pulled-right">Schedule an Appointment</a>
  </div>
</div> {{-- end of .columns --}}

<hr style="background-color: silver; height: 0.5px;">

<div class="card">

  <div class="is-pulled-right m-t-5 m-r-5">
    <div class="field">
      <b-radio name="appointment_type" v-model="appointment_type" native-value="completed">Completed Appointments</b-radio>
    
      <b-radio name="appointment_type" v-model="appointment_type" native-value="scheduled">Scheduled Appointments</b-radio>
    </div>

  </div>
  

  <div class="card-content">
    <table class="table is-narrow is-hoverable" style="width: 100%;">
      <thead>
        <tr>
          <th>id</th>
          <th>Patient</th>
          <th>Title</th>
          <th>Doctor</th>
          <th>Date</th>
          <th></th>
        </tr>
      </thead>

      <tbody v-if="appointment_type == 'completed'"> {{-- IF Appointment type is completed --}}
        @foreach($completed_appointments as $appointment)
          @foreach($patients as $patient)
            <tr>
              <th>{{ $appointment->id }}</th>
              <td><a href="{{ route('patients.show', $patient->id) }}">{{ $appointment->patient_name }}</a></td>
              <td>{{ $appointment->title }}</td>
              <td>{{ $appointment->doctor_name }}</td>
              <td>{{ $appointment->created_at->toDayDateTimeString() }}</td>
              <td class="has-text-right">
                <a href="{{ route('appointments.show', $appointment->id) }}" class="button is-outlined m-r-5">View</a>
                <a href="{{ route('appointments.edit', $appointment->id) }}" class="button is-outlined">Edit</a>
              </td>
            </tr>
          @endforeach
        @endforeach
      </tbody>

      <tbody v-if="appointment_type == 'scheduled'"> {{-- IF Appointment type is completed --}}
        @foreach($scheduled_appointments as $appointment)
          @foreach($patients as $patient)
            <tr>
              <th>{{ $appointment->id }}</th>
              <td><a href="{{ route('patients.show', $patient->id) }}">{{ $appointment->patient_name }}</a></td>
              <td>{{ $appointment->title }}</td>
              <td>{{ $appointment->doctor_name }}</td>
              <td>{{ $appointment->created_at->toDayDateTimeString() }}</td>
              <td class="has-text-right">
                <a href="{{ route('appointments.show', $appointment->id) }}" class="button is-outlined m-r-5">View</a>
                <a href="{{ route('appointments.edit', $appointment->id) }}" class="button is-outlined">Edit</a>
              </td>
            </tr>
          @endforeach
        @endforeach
      </tbody>

    </table> {{-- end of table --}}
  </div>
</div> {{-- end of .card --}}

</div> {{-- end of .flex-container --}}

@endsection

@section('scripts')
<script>
  var app = new Vue({
    el: '#app',
    data: {
      appointment_type: 'completed'
    }
  });
</script>
@endsection