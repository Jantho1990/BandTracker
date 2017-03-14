@extends('layouts.public')

@section('title', 'Bands')

@section('content')
<div class="row title-line">
  <div class="col-sm-8 col-md-6 col-md-offset-2">
    <h1>All Bands</h1>
  </div>
  <div class="col-sm-2 col-sm-offset-2 col-md-2 col-md-offset-0">
    <a class="btn btn-success btn-headline" href="/bands/create">Add New Band</a>
  </div>
</div>
<div class="row data">
  <div class="col-md-8 col-md-offset-2 table-responsive">
    <table class='table'>
      <thead>
        <tr>
          <th><a href="{{ route('bands.index', ['sort' => 'name', 'sortdirection' => 'name' === $sort ? $sortdirection : 'asc']) }}">Name</a></th>
          <th><a href="{{ route('bands.index', ['sort' => 'start_date', 'sortdirection' => 'start_date' === $sort ? $sortdirection : 'asc']) }}">Start Date</a></th>
          <th><a href="{{ route('bands.index', ['sort' => 'website', 'sortdirection' => 'website' === $sort ? $sortdirection : 'asc']) }}">Website</a></th>
          <th><a href="{{ route('bands.index', ['sort' => 'still_active', 'sortdirection' => 'still_active' === $sort ? $sortdirection : 'asc']) }}">Still Active</a></th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($bands as $band)
          <tr>
            <td>
              <a href="/bands/{{ $band->id }}">{{ $band->name }}</a></td>
            <td>{{ $band->start_date }}</td>
            <td>
              <a target="_blank" href="{{ $band->website }}">{{ $band->website }}</a>
            </td>
            <td>{{ $band->still_active ? 'Yes' : 'No' }}</td>
            <td><a class="btn btn-info" href="/bands/{{ $band->id }}/albums">View Albums</a></td>
            <td><a class="btn btn-warning" href="/bands/edit">Edit</a></td>
            <td>
              <a class="btn btn-danger" href="#">Delete</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@stop
