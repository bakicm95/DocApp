@extends('layouts.manage')

@section('content')

<div class="flex-container">
  <div class="columns">

    <div class="column">
      <h1 class="title">Manage Users</h1>
    </div>

    <div class="column">
      <a href="{{ route('users.create') }}" class="button is-primary is-pulled-right"><i class="fa fa-user-plus m-r-10"> Create User</i></a>
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
            <th>Title</th>
            <th>Email</th>
            <th>Created Date</th>
            <th></th>
          </tr>
        </thead>

        <tbody>
            @foreach($users as $user)
              <tr>
                <th>{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>@if($user->spec != "")
                      {{ $user->spec }}  
                    @else Nurse 
                    @endif</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at->toFormattedDateString() }}</td>
                <td class="has-text-right">
                  <a href="{{ route('users.show', $user->id) }}" class="button is-outlined m-r-5">View</a>
                  <a href="{{ route('users.edit', $user->id) }}" class="button is-outlined">Edit</a>
                </td>
              </tr>
            @endforeach
        </tbody>

      </table> {{-- end of table --}}
    </div>
  </div> {{-- end of .card --}}
</div> {{-- end of .flex-container --}}
  
@endsection