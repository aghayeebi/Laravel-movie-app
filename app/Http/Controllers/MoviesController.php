<?php

namespace App\Http\Controllers;

use App\ViewModels\MoviesViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $popularMovies = Http::withToken(config('services.tmdb.token'))->
        get('https://api.themoviedb.org/3/movie/popular')
            ->json()['results'];


        $nowPlayingMovies = Http::withToken(config('services.tmdb.token'))->
        get('https://api.themoviedb.org/3/movie/now_playing')
            ->json()['results'];

//        $genreList = Http::withToken(config('services.tmdb.token'))->
//        get('https://api.themoviedb.org/3/genre/movie/list')
//            ->json()['genres'];

        $genres = Http::withToken(config('services.tmdb.token'))->
        get('https://api.themoviedb.org/3/genre/movie/list')
            ->json()['genres'];


//        return view('layouts.index', [
//            'popularMovies' => $popularMovies,
////            'genreList' => $genreList,
//            'genres' => $genres,
//            'nowPlayingMovies' => $nowPlayingMovies,
//        ]);
        $viewModel = new MoviesViewModel(
            $popularMovies,
            $nowPlayingMovies,
            $genres,
        );
        return view('layouts.index', $viewModel);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $movie = Http::withToken(config('services.tmdb.token'))->
        get('https://api.themoviedb.org/3/movie/' . $id . '?append_to_response=credits,videos,images')
            ->json();
//        dump($movie);
        $viewModel = new MoviesViewModel($movie);
        return view('layouts.show', $viewModel);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
