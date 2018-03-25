<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Album;
use App\Band;
use App\Http\Requests\AlbumRequest;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // If band_id is a parameter, get all albums by that
        // band; otherwise return all.
        $band_id = $request->band_id;
        $albums = $band_id !== null
            ? Album::where('band_id', $band_id)->get()
            : Album::all();

        // Apply sorting, if necessary.
        $sort = $request->sort;
        $sortdirection = $request->sortdirection;
        $albums = $sortdirection === 'asc'
            ? $albums->sortBy($sort)
            : $albums->sortByDesc($sort);

        // This has to come afterward so that toggling works.
        $sortdirection = $request->sortdirection === 'asc' ? 'desc' : 'asc';

        // Get all bands, so we can populate the filter select.
        $bands = Band::all();

        return view('albums.index', compact('albums', 'bands', 'band_id', 'sort', 'sortdirection'));
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
        
        return view('albums.create', compact('band_id', 'bands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\AlbumRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlbumRequest $request)
    {
        $album = Album::create($request->all());

        session()->flash('success', "The album $album->name was successfully saved!");

        return redirect()->route('albums.show', compact('album'));
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        return view('albums.show', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        $bands = Band::all();

        return view('albums.edit', compact('album', 'bands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\AlbumRequest  $request
     * @param  App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(AlbumRequest $request, Album $album)
    {
        $album->update($request->all());

        session()->flash('success', "The album $album->name was successfully saved!");

        return redirect()->route('albums.show', compact('album'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        $album->delete();

        session()->flash('success', "$album->name was successfully deleted.");
        
        return redirect()->route('albums.index');
    }
}
