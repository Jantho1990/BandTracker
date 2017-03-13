@extends('layouts.public')

@section('title', 'Albums by ' . $band->name))

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <h1>Albums by {{ $band->name }}</h1>
  </div>
</div>
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <table class='table'>
      <thead>
        <tr>
          <th>Name</th>
          <th>Recorded Date</th>
          <th>Release Date</th>
          <th>Number of Tracks</th>
          <th>Label</th>
          <th>Producer</th>
          <th>Genre</th>
        </tr>
      </thead>
      <tbody>
        @foreach($albums as $album)
            <tr>
              <td>{{ $album->name }}</td>
              <td>{{ $album->recorded_date }}</td>
              <td>{{ $album->release_date }}</td>
              <td>{{ $album->number_of_tracks }}</td>
              <td>{{ $album->label }}</td>
              <td>{{ $album->producer }}</td>
              <td>{{ $album->genre }}</td>
            </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@stop
