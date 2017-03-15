@extends('layouts.public')

@section('title', 'Albums')

@section('content')
<div class="row title-line">
  <div class="col-sm-8 col-md-6 col-md-offset-2">
    <h1>Albums</h1>
  </div>
  <div class="col-sm-2 col-sm-offset-2 col-md-2 col-md-offset-0">
    <a class="btn btn-success btn-headline" href="/albums/create{{ $band_id !== null ? "?band_id=$band_id" : '' }}">Add New Album</a>
  </div>
</div>
<div class="row data">
  <div class="col-md-8 col-md-offset-2 table-responsive">
    <table class='table'>
      <thead>
        <tr>
          <th><a href="{{ route('albums.index', ['sort' => 'band_name', 'sortdirection' => 'band_name' === $sort ? $sortdirection : 'asc']) }}">Band Name</a></th>
          <th><a href="{{ route('albums.index', ['sort' => 'name', 'sortdirection' => 'name' === $sort ? $sortdirection : 'asc']) }}">Album Name</a></th>
          <th><a href="{{ route('albums.index', ['sort' => 'recorded_date', 'sortdirection' => 'recorded_date' === $sort ? $sortdirection : 'asc']) }}">Recorded Date</a></th>
          <th><a href="{{ route('albums.index', ['sort' => 'release_date', 'sortdirection' => 'release_date' === $sort ? $sortdirection : 'asc']) }}">Release Date</a></th>
          <th><a href="{{ route('albums.index', ['sort' => 'number_of_tracks', 'sortdirection' => 'number_of_tracks' === $sort ? $sortdirection : 'asc']) }}">Number of Tracks</a></th>
          <th><a href="{{ route('albums.index', ['sort' => 'label', 'sortdirection' => 'label' === $sort ? $sortdirection : 'asc']) }}">Label</a></th>
          <th><a href="{{ route('albums.index', ['sort' => 'producer', 'sortdirection' => 'producer' === $sort ? $sortdirection : 'asc']) }}">Producer</a></th>
          <th><a href="{{ route('albums.index', ['sort' => 'genre', 'sortdirection' => 'genre' === $sort ? $sortdirection : 'asc']) }}">Genre</a></th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($albums as $album)
            <tr>
              <td>
                <a href="/bands/{{ $album->band->id }}">{{ $album->band->name }}</a>
              </td>
              <td>
                <a href="/albums/{{ $album->id }}">{{ $album->name }}</a>
              </td>
              <td>{{ $album->recorded_date }}</td>
              <td>{{ $album->release_date }}</td>
              <td>{{ $album->number_of_tracks }}</td>
              <td>{{ $album->label }}</td>
              <td>{{ $album->producer }}</td>
              <td>{{ $album->genre }}</td>
              <td><a class="btn btn-warning" href="/albums/{{ $album->id }}/edit">Edit</a></td>
              <td>
                <form class="" action="{{ route('albums.destroy', ['id' => $album->id]) }}" method="post">
                  {{ method_field('DELETE') }}
                  {{ csrf_field() }}
                  <button class="btn btn-danger" type="submit" name="button">Delete</button>
                </form>
              </td>
            </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@stop
