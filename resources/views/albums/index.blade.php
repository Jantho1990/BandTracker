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
      {!! dd(Route::current()) !!}
      <thead>
        <tr>
          <th><a href="{{ route(Route::currentRouteName(), ['sort' => 'band', 'sortdirection' => 'band' === $sort ? $sortdirection : 'asc']) }}">Band Name</a></th>
          <th><a href="{{ route(Route::currentRouteName(), ['sort' => 'name', 'sortdirection' => 'name' === $sort ? $sortdirection : 'asc']) }}">Album Name</a></th>
          <th><a href="{{ route(Route::currentRouteName(), ['sort' => 'recorded_date', 'sortdirection' => 'recorded_date' === $sort ? $sortdirection : 'asc']) }}">Recorded Date</a></th>
          <th><a href="{{ route(Route::currentRouteName(), ['sort' => 'release_date', 'sortdirection' => 'release_date' === $sort ? $sortdirection : 'asc']) }}">Release Date</a></th>
          <th><a href="{{ route(Route::currentRouteName(), ['sort' => 'number_of_tracks', 'sortdirection' => 'number_of_tracks' === $sort ? $sortdirection : 'asc']) }}">Number of Tracks</a></th>
          <th><a href="{{ route(Route::currentRouteName(), ['sort' => 'label', 'sortdirection' => 'label' === $sort ? $sortdirection : 'asc']) }}">Label</a></th>
          <th><a href="{{ route(Route::currentRouteName(), ['sort' => 'producer', 'sortdirection' => 'producer' === $sort ? $sortdirection : 'asc']) }}">Producer</a></th>
          <th><a href="{{ route(Route::currentRouteName(), ['sort' => 'genre', 'sortdirection' => 'genre' === $sort ? $sortdirection : 'asc']) }}">Genre</a></th>
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
