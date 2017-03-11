<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Album as Album;
use Session;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $albums = Album::all();
      return view('albums.index', ['albums' => $albums]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('albums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // Validate the data
      $this->validate([
        'name' => 'required|unique:albums,name|max:255|alpha_dash',
        'recorded_date' => 'sometimes|date',
        'release_date' => 'sometimes|date',
        'number_of_tracks' => 'sometimes|integer',
        'label' => 'sometimes|max:255',
        'producer' => 'sometimes|max:255',
        'genre' => 'sometimes|genre'
      ]);

      // Extract and store data
      $album = new Album();
      $album->band_id = $request->band_id;
      $album->name = $request->name;
      $album->recorded_date = $request->recorded_date;
      $album->release_date = $request->release_date;
      $album->number_of_tracks = $request->number_of_tracks;
      $album->label = $request->label;
      $album->producer = $request->producer;
      $album->genre = $request->genre;
      $album->save();

      // Flash message
      Session::flash('success', "The album $album->name was successfully saved!");

      // Return show view
      return view('albums.show', ['id' => $album->id, 'band_id' => $album->band_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
