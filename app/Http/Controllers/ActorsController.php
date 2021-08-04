<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ActorsController extends Controller
{
    public function index()
    {
        
        $popularActors = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/person/popular?api_key=7fd0289ee662f6184e676ba6e0d2ee14')
        ->json()['results'];


        dump($popularActors);


        
        return view('actors.index', [
            'popularActors'=> $popularActors,
            
            //'topRated'=>$topRated,
            //'genres'=>$genres,
        ]);
    }

    public function show($id)
    {
        $actor = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/person/'.$id.'?api_key=7fd0289ee662f6184e676ba6e0d2ee14')
            ->json();

       
       

        return view('actors.show',[
            'actor'=>$actor,
         
            
        ]);
    }


}
