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
    public function index(Request $request)
    {
      // If band_idis a parameter, get all albums by that
      // band; otherwise return all.
      if($request->band_id !== null){
        $albums = Album::where('band_id', $request->band_id)->get();
      }else{
        $albums = Album::all();
      }

      // Add band names as part of the album collection, so
      // we can sort by that column.
      foreach($albums as $album){
        $album->band_name = $album->band->name;
      }

      // Apply sorting, if necessary.
      if($request->input('sort') !== ''){
        $sort = $request->input('sort');
        $sortdirection = $request->sortdirection === 'asc' ? 'desc' : 'asc';
        $this->sort($albums, $sort, $sortdirection);
      }

      return view('albums.index', ['albums' => $albums, 'sort' => $sort, 'sortdirection' => $sortdirection]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $band_id = $request->band_id; // This is null if no band_id present.
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
        'band_id' => 'required|exists:bands,id|integer',
        'name' => 'required|max:255|string',
        'recorded_date' => 'sometimes|string',
        'release_date' => 'sometimes|string',
        'number_of_tracks' => 'sometimes|integer',
        'label' => 'sometimes|max:255',
        'producer' => 'sometimes|max:255',
        'genre' => 'sometimes|max:255'
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
      return redirect()->route('albums.show', ['id' => $album->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
      $bands = Band::all();
      return view('albums.edit', ['album' => $album, 'bands' => $bands]);
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
