@extends('layouts.public')

@section('title', 'Albums')

@section('content')
<div class="row title-line">
  <div class="col-sm-8 col-md-6 col-md-offset-2">
    <h1>Albums {{ $band !== null ? "by $band->name" : '' }}</h1>
  </div>
  <div class="col-sm-2 col-sm-offset-2 col-md-2 col-md-offset-0">
    <a class="btn btn-success btn-headline" href="/bands/albums/create">Add New Album</a>
  </div>
</div>
<div class="row data">
  <div class="col-md-8 col-md-offset-2 table-responsive">
    <table class='table'>
      <thead>
        <tr>
          <th>Band Name</th>
          <th>Album Name</th>
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
              <td>
                <a href="/bands/{{ $album->band->id }}">{{ $album->band->name }}</a>
              </td>
              <td>
                <a href="/bands/{{ $album->band->id }}/albums/{{ $album->id }}">{{ $album->name }}</a>
              </td>
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
