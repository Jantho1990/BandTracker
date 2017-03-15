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
    public function index(Request $request)
    {
        $bands = Band::all();
        // Apply sorting, if necessary.
        $sort = $request->input('sort');
        $sortdirection = $request->sortdirection === 'asc' ? 'desc' : 'asc';
        if($request->input('sort') !== ''){
          $this->sort($bands, $sort, $sortdirection);
        }

        return view('bands.index', ['bands' => $bands, 'sort' => $sort, 'sortdirection' => $sortdirection]);
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
      $this->validate($request, [
        'name' => 'required|unique:bands,name|max:255|string',
        'start_date' => '',
        'website' => 'nullable|url',
        'still_active' => ''
      ]);

      // Extract and store data
      $band = new Band();
      $band->name = $request->name;
      $band->start_date = $request->start_date;
      $band->website = $request->website;
      $band->still_active = (bool)$request->still_active;
      $band->save();

      // Flash message
      Session::flash('success', "The band $band->name was successfully saved!");

      // Return show route
      return redirect()->route('bands.show', ['band' => $band]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $band = Band::find($id);
        return view('bands.show', ['band' => $band]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $band = Band::find($id);
        return view('bands.edit', ['band' => $band]);
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
      $band = Band::find($id);
      if($band->name === $request->name){
        $this->validate($request, [
          'start_date' => 'sometimes|string',
          'website' => '',
          'still_active' => 'sometimes|boolean'
        ]);
      }else{
        $this->validate($request, [
          'name' => 'required|exists:albums,name|max:255|alpha_dash',
          'start_date' => 'sometimes|date',
          'website' => '',
          'still_active' => 'sometimes|boolean'
        ]);
      }

      // Extract and store data
      $band = Band::find($id);
      $band->name = $request->name;
      $band->start_date = $request->start_date;
      $band->website = $request->website;
      $band->still_active = $request->still_active;
      $band->save();

      // Flash message
      Session::flash('success', "The band $band->name was successfully saved!");

      // Return show route
      return redirect()->route('bands.show', ['band' => $band]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $band = Band::find($id);
      $albums = $band->albums;
      foreach($albums as $album){
        $album->delete();
      }
      $band->delete();
      Flash::session('success', "$band->name and their albums were successfully deleted.");
      return redirect()->route('bands.index');
    }
}
