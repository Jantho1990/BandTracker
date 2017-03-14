@extends('layouts.public')

@section('title', htmlspecialchars($album->name) . ' by ' . htmlspecialchars($album->band->name))

@section('content')

<div class="row title-line">
  <div class="col-sm-8 col-sm-offset-2">
    <h1>
      <p>{{ $album->name }}</p>
      <p>by {{ $album->band->name }}</p>
    </h1>
  </div>
</div>
<div class="row data">
  <div class="col-sm-8 col-sm-offset-2">
    <div class="row">
      <div class="col-sm-12">
        <dl class="dl-horizontal well">
          <dt>Name:</dt>
          <dd>{{ $album->name }}</dd>
          <dt>Recorded Date:</dt>
          <dd>{{ $album->recorded_date }}</dd>
          <dt>Release Date:</dt>
          <dd>{{ $album->release_date }}</dd>
          <dt>Number of Tracks:</dt>
          <dd>{{ $album->number_of_tracks }}</dd>
          <dt>Label:</dt>
          <dd>{{ $album->label }}</dd>
          <dt>Producer:</dt>
          <dd>{{ $album->producer }}</dd>
          <dt>Genre:</dt>
          <dd>{{ $album->genre }}</dd>
        </dl>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-3">
        <a class="btn btn-info" href="/bands/{{ $album->band->id }}/albums">Back</a>
      </div>
      <div class="col-sm-3 col-sm-offset-1">
        <a class="btn btn-warning" href="/bands/{{ $album->band->id }}/albums/{{ $album->id }}/edit">Edit</a>
      </div>
    </div>
  </div>
  </div>
</div>

@stop
