@extends('layouts.public')

@section('title', 'Bands')

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <ul class='tbl-list'>
      @foreach($bands as $band)
        <li class='tbl-item'>
          <ul>
            <li>{{ $band->name }}</li>
            <li>{{ $band->start_date }}</li>
            <li>{{ $band->website }}</li>
            <li>{{ $band->still_active }}</li>
          </ul>
        </li>
      @endforeach
    </ul>
  </div>
</div>
@stop
