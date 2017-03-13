@extends('layouts.public')

@section('title', 'Albums by ' . $band->name)

@section('content')
<div class="row title-line">
  <div class="col-sm-8 col-md-6 col-md-offset-2">
    <h1>Albums by {{ $band->name }}</h1>
  </div>
  <div class="col-sm-2 col-sm-offset-2 col-md-2 col-md-offset-0">
    <a class="btn btn-success btn-headline" href="/bands/{{ $band->id }}/albums/create">Add New Album</a>
  </div>
</div>
<div class="row data">
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
