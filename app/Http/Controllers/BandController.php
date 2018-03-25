<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Band;
use App\Http\Requests\BandRequest;

class BandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bands = Band::all();

        // Apply sorting.
        $sort = $request->sort;
        $sortdirection = $request->sortdirection;
        switch ($sortdirection) {
            case 'asc':
                $bands = $bands->sortBy($sort);
                $sortdirection = 'desc';
                break;
            case 'desc':
                $bands = $bands->sortByDesc($sort);
                $sortdirection = 'asc';
                break;
            default:
                $bands = $bands->sortBy($sort);
                $sortdirection = 'asc';
        }

        return view('bands.index', compact('bands', 'sort', 'sortdirection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\BandRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BandRequest $request)
    {
        $band = Band::create($request->all());

        session()->flash('success', "The band $band->name was successfully saved!");

        return redirect()->route('bands.show', compact('band'));
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Band  $band
     * @return \Illuminate\Http\Response
     */
    public function show(Band $band)
    {
        return view('bands.show', compact('band'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Band  $band
     * @return \Illuminate\Http\Response
     */
    public function edit(Band $band)
    {
        return view('bands.edit', compact('band'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\BandRequest  $request
     * @param  App\Band  $band
     * @return \Illuminate\Http\Response
     */
    public function update(BandRequest $request, Band $band)
    {
        $band->update($request->all());

        session()->flash('success', "The band $band->name was successfully updated!");
        
        return redirect()->route('bands.show', ['band' => $band]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Band  $band
     * @return \Illuminate\Http\Response
     */
    public function destroy(Band $band)
    {
        $band->load('albums');

        \App\Album::destroy($band->albums->pluck('id')->all());

        $band->delete();

        session()->flash('success', "$band->name and their albums were successfully deleted.");
        
        return redirect()->route('bands.index');
    }
}
