@extends('layouts.public')

@section('headerscripts')

@stop

@section('title', 'Edit Album')

@section('content')
<div class="row title-line">
  <div class="col-sm-8 col-md-6 col-md-offset-2">
    <h1>Edit {{ $album->name }}</h1>
    <h2>by {{ $album->band->name }}</h2>
  </div>
</div>
<div class="row data">
  <div class="col-md-8 col-md-offset-2">
    <form class="form" action="/albums/{{ $album->id }}" method="post">
      {{ method_field('PUT') }}
      {{ csrf_field() }}
      <div class="form-group">
        <label for="band_id">Band</label>
        <select class="form-control" name="band_id">
          @foreach($bands as $band)
            <option value="{{ $band->id }}" {{ $band->id === (int)$album->band->id ? 'selected' : '' }}>{{ $band->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="name">Album Name:</label>
        <input class="form-control" type="text" name="name" value="{{ $album->name }}">
      </div>
      <div class="form-group">
        <label for="recorded_date">Recorded Date:</label>
        <input class="form-control" type="text" name="recorded_date" value="{{ $album->recorded_date }}">
      </div>
      <div class="form-group">
        <label for="release_date">Release Date:</label>
        <input class="form-control" type="text" name="release_date" value="{{ $album->release_date }}">
      </div>
      <div class="form-group">
        <label for="number_of_tracks">Number of Tracks:</label>
        <input class="form-control" type="integer" name="number_of_tracks" value="{{ $album->number_of_tracks }}">
      </div>
      <div class="form-group">
        <label for="label">Label:</label>
        <input class="form-control" type="text" name="label" value="{{ $album->label }}">
      </div>
      <div class="form-group">
        <label for="producer">Producer:</label>
        <input class="form-control" type="text" name="producer" value="{{ $album->producer }}">
      </div>
      <div class="form-group">
        <label for="genre">Genre:</label>
        <input class="form-control" type="text" name="genre" value="{{ $album->genre }}">
      </div>

      <a class="btn btn-danger" href="{{ URL::previous() }}">Back</a>
      <button class="btn btn-success" type="submit">Save</button>
    </form>
  </div>
</div>

@stop
