<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Band as Band;
use Session;

class BandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bands = Band::all();
        return view('bands.index', ['bands' => $bands]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // Validate the data
      $this->validate([
        'name' => 'required|unique:bands,name|max:255|alpha_dash',
        'start_date' => 'sometimes|date',
        'website' => '',
        'still_active' => 'sometimes|boolean'
      ]);

      // Extract and store data
      $band = new Band();
      $band->name = $request->name;
      $band->start_date = $request->start_date;
      $band->website = $request->website;
      $band->still_active = $request->still_active;
      $band->save();

      // Flash message
      Session::flash('success', "The band $band->name was successfully saved!");

      // Return show view
      return view('bands.show', ['id' => $band->id]);
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
