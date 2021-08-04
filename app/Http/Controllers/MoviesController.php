<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function index(){
     
        $popularMovies = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/popular?api_key=7fd0289ee662f6184e676ba6e0d2ee14')
        ->json()['results'];

        $nowPlayingMovies = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/now_playing?api_key=7fd0289ee662f6184e676ba6e0d2ee14')
        ->json()['results'];


        $genresArray = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/movie/list?api_key=7fd0289ee662f6184e676ba6e0d2ee14')
            ->json()['genres'];


           $genres= collect($genresArray)->mapWithKeys(function ($genre){
               return [$genre['id']=>$genre['name']];
           });




      //  dump($nowPlayingMovies);



        return view('index', [
            'popularMovies'=> $popularMovies,
            'nowPlayingMovies'=>$nowPlayingMovies,
            'genres'=>$genres,
        ]);
    }

    public function show($id){
       
        $movie = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/'.$id.'?api_key=7fd0289ee662f6184e676ba6e0d2ee14&append_to_response=credits,videos,images')
        ->json();
      //  dump($movie);

        
        return view('show',[
            'movie'=>$movie,
        ]);

    }





}
