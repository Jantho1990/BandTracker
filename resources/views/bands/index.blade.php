@extends('layouts.public')

@section('title', 'Bands')

@section('content')
<div class="row">
  <div class="col-sm-8">
    <h1>Band Tracker</h1>
  </div>
  <div class="col-sm-2 col-sm-offset-1">
    <a class="btn btn-success" href="/bands/create">Add New Band</a>
  </div>
  <hr>
</div>
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <table class='table'>
      <thead>
        <tr>
          <th>Name</th>
          <th>Start Date</th>
          <th>Website</th>
          <th>Still Active</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($bands as $band)
            <tr>
              <td>{{ $band->name }}</td>
              <td>{{ $band->start_date }}</td>
              <td>
                <a target="_blank" href="{{ $band->website }}">{{ $band->website }}</a>
              </td>
              <td>{{ $band->still_active ? 'Yes' : 'No' }}</td>
              <td><a class="btn btn-info" href="/bands/{{ $band->id }}/albums">View Albums</a></td>
              <td><a class="btn btn-warning" href="/bands/edit">Edit</a></td>
              <td>
                <a class="btn btn-danger" href="#">Delete</a>
              </td>
            </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@stop
