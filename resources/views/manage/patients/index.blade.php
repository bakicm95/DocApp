@extends('layouts.manage')

@section('content')

<div class="flex-container">
  <div class="columns">

    <div class="column">
      <h1 class="title">Manage Patients</h1>
    </div>

    <div class="column">
      <a href="{{ route('patients.create') }}" class="button is-primary is-pulled-right">Create Patient</a>
    </div>

  </div> {{-- end of .columns --}}


  <hr style="background-color: silver; height: 0.5px;">

  <div class="card">
    <div class="card-content">
      <table class="table is-narrow is-hoverable" style="width: 100%;">
        <thead>
          <tr>
            <th>id</th>
            <th>Name</th>
            <th>JMBG</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Created Date</th>
            <th></th>
          </tr>
        </thead>

        <tbody>
            @foreach($patients as $patient)
              <tr>
                <th>{{ $patient->id }}</th>
                <td>{{ $patient->name }}</td>
                <td>{{ $patient->jmbg }}</td>
                <td>{{ $patient->email }}</td>
                <td>{{ $patient->phonenumber }}</td>
                <td>{{ $patient->created_at->toFormattedDateString() }}</td>
                <td class="has-text-right">
                  <a href="{{ route('patients.show', $patient->id) }}" class="button is-outlined m-r-5">View</a>
                  <a href="{{ route('patients.edit', $patient->id) }}" class="button is-outlined">Edit</a>
                </td>
              </tr>
            @endforeach
        </tbody>

      </table> {{-- end of table --}}
    </div>
  </div> {{-- end of .card --}}
</div> {{-- end of .flex-container --}}
  
@endsection