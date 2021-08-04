<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class TvController extends Controller
{
    public function index()
    {
       
        $popularTv = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/tv/popular?api_key=7fd0289ee662f6184e676ba6e0d2ee14')
        ->json()['results'];

        $topRated = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/tv/top_rated?api_key=7fd0289ee662f6184e676ba6e0d2ee14')
        ->json()['results'];


        $genresArray = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/tv/list?api_key=7fd0289ee662f6184e676ba6e0d2ee14')
            ->json()['genres'];


           $genres= collect($genresArray)->mapWithKeys(function ($genre){
               return [$genre['id']=>$genre['name']];
           });




      // dump($popularTv);



        return view('tv.index', [
            'popularTv'=> $popularTv,
            'topRated'=>$topRated,
            'genres'=>$genres,
        ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
       
        $tvshow = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/tv/'.$id.'?api_key=7fd0289ee662f6184e676ba6e0d2ee14&append_to_response=credits,videos,images')
        ->json();
       //dump($tvshow);

        
        return view('tv.show',[
            'tvshow'=>$tvshow,
        ]);

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
