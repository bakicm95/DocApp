@extends('layouts.manage')

@section('content')

<div class="flex-container">
  <div class="columns">

    <div class="column">
      <h1 class="title">Manage Permissions</h1>
    </div>

    <div class="column">
      <a href="{{ route('permissions.create') }}" class="button is-primary is-pulled-right">Create Permission</a>
    </div>

  </div> {{-- end of .columns --}}


  <hr style="background-color: silver; height: 0.5px;">

  <div class="card">
    <div class="card-content">
      <table class="table is-narrow is-hoverable" style="width: 100%;">
        <thead>
          <tr>
            <th>Name</th>
            <th>Slug</th>
            <th>Description</th>
            <th>Created Date</th>
            <th></th>
          </tr>
        </thead>

        <tbody>
            @foreach($permissions as $permission)
              <tr>
                <th>{{ $permission->display_name }}</th>
                <td>{{ $permission->name }}</td>
                <td>{{ $permission->description }}</td>
                <td>{{ $permission->created_at->toFormattedDateString() }}</td>
                <td class="has-text-right">
                  <a href="{{ route('permissions.show', $permission->id) }}" class="button is-outlined m-r-5">View</a>
                  <a href="{{ route('permissions.edit', $permission->id) }}" class="button is-outlined">Edit</a>
                </td>
              </tr>
            @endforeach
        </tbody>

      </table> {{-- end of table --}}
    </div>
  </div> {{-- end of .card --}}
</div> {{-- end of .flex-container --}}
  
@endsection