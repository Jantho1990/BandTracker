@extends('layouts.public')

@section('title', 'View ' . htmlspecialchars($band->name))

@section('content')

<div class="row title-line">
  <div class="col-sm-8 col-sm-offset-2">
    <h1>{{ $band->name }}</h1>
  </div>
</div>
<div class="row data">
  <div class="col-sm-8 col-sm-offset-2">
    <div class="row">
      <div class="col-xs-12">
        <dl class="dl-horizontal well">
          <dt>Start Date:</dt>
          <dd>{{ $band->start_date }}</dd>
          <dt>Website:</dt>
          <dd>
            <a target="_blank" href="{{ $band->website }}">{{ $band->website }}</a>
          </dd>
          <dt>Still Active:</dt>
          <dd>{{ $band->still_active ? 'True' : 'False' }}</dd>
          <dt>Albums:</dt>
          <dd>
            @foreach($band->albums as $album)
              <p><a href="/albums/{{ $album->id }}">{{ $album->name }}</a></p>
            @endforeach
          </dd>
        </dl>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-3">
        <a class="btn btn-info" href="{{ URL::previous() }}">Back</a>
      </div>
      <div class="col-sm-3 col-sm-offset-1">
        <a class="btn btn-warning" href="/bands/{{ $band->id }}/edit">Edit</a>
      </div>
      <div class="col-sm-3 col-sm-offset-1">
        <form class="" action="{{ route('bands.destroy', ['id' => $band->id]) }}" method="post">
          {{ method_field('DELETE') }}
          {{ csrf_field() }}
          <button class="btn btn-danger" type="submit" name="button">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

@stop
