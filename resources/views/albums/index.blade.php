@extends('layouts.public')

@section('title', 'Albums by ' . $albums[0]->band->name)

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <ul class='tbl-list'>
      @foreach($albums as $album)
        <li class='tbl-item'>
          <ul>
            <li>{{ $album->name }}</li>
            <li>{{ $album->recorded_date }}</li>
            <li>{{ $album->release_date }}</li>
            <li>{{ $album->number_of_tracks }}</li>
            <li>{{ $album->label }}</li>
            <li>{{ $album->producer }}</li>
            <li>{{ $album->genre }}</li>
          </ul>
        </li>
      @endforeach
    </ul>
  </div>
</div>
@stop
