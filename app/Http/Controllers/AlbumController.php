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
            ? Album::with('band')->where('band_id', $band_id)->get()
            : Album::with('band')->get();

        // Apply sorting.
        $sort = $request->sort;
        $sortdirection = $request->sortdirection;
        switch ($sortdirection) {
            case 'asc':
                $albums = $albums->sortBy($sort);
                $sortdirection = 'desc';
                break;
            case 'desc':
                $albums = $albums->sortByDesc($sort);
                $sortdirection = 'asc';
                break;
            default:
                $albums = $albums->sortBy($sort);
                $sortdirection = 'asc';
        }

        // Get all band names, so we can populate the filter select.
        $bands = Band::select('name', 'id')->get();

        return view('albums.index', compact('albums', 'bands', 'band_id', 'sort', 'sortdirection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $band_id = $request->band_id;
        
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

        session()->flash('success', __('app.album.flash.saved', ['name' => $album->name]));

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
        $album->load('band');
        
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
        $album->load('band');
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

        session()->flash('success', __('app.album.flash.updated', ['name' => $album->name]));

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

        session()->flash('success', __('app.album.flash.deleted', ['name' => $album->name]));
        
        return redirect()->route('albums.index');
    }
}
