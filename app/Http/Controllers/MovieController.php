<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //show all movies in reverse chronological order
        $movies = Movie::orderBy('seen')->orderBy('updated_at', 'desc')->get();
        //$movies = Movie::all();
        $user = auth()->user();

        return view('index', compact('movies', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //redirects to index page
        $movie = new Movie;
        $movie->title = $request->title;
        $movie->why = $request->why;
        $movie->description = $request->description;
        $movie->user_id = auth()->user()->id;
        $movie->save();

        return redirect()->route('index');       

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
        return view('movie.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        $movie->title = $request->title;
        $movie->why = $request->why;
        $movie->description = $request->description;
        $movie->user_id = auth()->user()->id;
        $movie->save();

        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('index');
    }

    public function delete(Movie $movie)
    {
        return view('movie.delete', compact('movie'));
    }


    public function seeMovie(Movie $movie)
    {
        $movie->seen = true;
        $movie->save();

        return redirect()->route('index');
    }

    public function unseeMovie(Movie $movie)
    {
        $movie->seen = false;
        $movie->save();

        return redirect()->route('index');
    }
}
