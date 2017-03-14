<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Album as Album;
use App\Band as Band;
use Session;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Band $band = null)
    {
      //dd($band);
      if($band !== null && $band->exists){
        $albums = Album::where('band_id', $band->id)->get();
      }else{
        $albums = Album::all();
        $band = null;
      }
      return view('albums.index', ['albums' => $albums, 'band' => $band]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($band_id = 0)
    {
        $bands = Band::all();
        return view('albums.create', ['band_id' => $band_id, 'bands' => $bands]);
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
      $this->validate($request, [
        'band_id' => 'required|unique:bands,id|integer',
        'name' => 'required|max:255|alpha_dash',
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

      // Return show route
      return redirect()->route('albums.show', ['album' => $album]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($band_id, $id)
    {
        $album = Album::find($id);
        return view('albums.show', ['album' => $album]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $album = Album::find($id);
      return view('albums.edit', ['album' => $album]);
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
      // Validate the data
      $this->validate($request, [
        'band_id' => 'required|unique:bands,id|integer',
        'name' => 'required|max:255|alpha_dash',
        'recorded_date' => 'sometimes|date',
        'release_date' => 'sometimes|date',
        'number_of_tracks' => 'sometimes|integer',
        'label' => 'sometimes|max:255',
        'producer' => 'sometimes|max:255',
        'genre' => 'sometimes|genre'
      ]);

      // Extract and store data
      $album = Album::find($id);
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

      // Return show route
      return redirect()->route('albums.show', ['album' => $album]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $album = Album::find($id);
      $album->delete();
      Flash::session('success', "$album->name was successfully deleted.");
      return redirect()->route('albums.index');
    }
}
