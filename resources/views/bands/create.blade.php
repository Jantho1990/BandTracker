@extends('layouts.public')

@section('headerscripts')

@stop

@section('title', 'Add New Band')

@section('content')
  {{-- {{ dd(session()->getOldInput()) }} --}}
  {{-- {!! $old = session()->getOldInput() !!} --}}
  {{-- {{ dd($old) }} --}}
<div class="row title-line">
  <div class="col-sm-8 col-md-6 col-md-offset-2">
    <h1>Add New Band</h1>
  </div>
</div>
<div class="row data">
  <div class="col-md-8 col-md-offset-2">
    <form class="form" action="/bands" method="post">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="name">Band Name:</label>
        <input class="form-control" type="text" name="name" value="{{ old('name', '') }}">
      </div>
      <div class="form-group">
        <label for="start_date">Start Date:</label>
        <input class="form-control" type="text" name="start_date" value="{{ old('start_date', '') }}">
      </div>
      <div class="form-group">
        <label for="website">Website:</label>
        <input class="form-control" type="text" name="website" value="{{ old('website', '') }}">
      </div>
      <div class="form-group">
        <label for="still_active">Still Active:</label>
        <select class="form-control" name="still_active">
          <option value="0" {{ old('still_active', '') == false ? 'selected' : '' }}>{{ __('app.band.still_active.false') }}</option>
          <option value="1" {{ old('still_active', '') == false ? '' : 'selected' }}>{{ __('app.band.still_active.true') }}</option>
        </select>
      </div>

      <a class="btn btn-danger" href="{{ URL::previous() }}">Back</a>
      <button class="btn btn-success" type="submit">Save</button>
    </form>
  </div>
</div>

@stop
