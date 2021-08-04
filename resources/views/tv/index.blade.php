@extends('layouts.main')

@section('content')


<div class="container mx-auto px-4 pt-16">
<div class="popular-tv">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular Tv Shows</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
               @foreach($popularTv as $tv)
            <div class="mt-8 grid-cols-1">
         <a href="{{ route('tv.show', $tv['id']) }}"><img src="{{ 'https://image.tmdb.org/t/p/w500/'.$tv['poster_path']  }}" alt="Parasite" class="hover:opacity-75 transition ease-in-out duration-150"></a>
         <div class="mt-2">
         <a href="{{ route('tv.show', $tv['id']) }}" class="text-lg hover:text-gray:300">{{ $tv['name'] }}</a>
         <div class="flex items-center text-gray-400 text-sm mt-1">
         <svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>
                    
         <span class="ml-1">{{  $tv['vote_average']*10 .'%'}}</span>
         <span class="mx-2">|</span>
         <span>{{  \carbon\carbon::parse($tv['first_air_date'])->format('M d,Y') }}</span>
         </div>
         <div class="text-gray-400 text-sm">
         @foreach($tv['genre_ids'] as $genre)
         {{  $genres->get($genre)}} @if(!$loop->last) , @endif
         @endforeach
         </div>
         </div>
         </div>
          @endforeach
            </div>
        </div>
        <br>   
        <!-- end pouplar-movies -->
        <div class="popular-movies">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Top Rated Shows</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
               @foreach($topRated as $tv)
               <div class="mt-8 grid-cols-1">
         <a href="{{ route('tv.show', $tv['id']) }}"><img src="{{ 'https://image.tmdb.org/t/p/w500/'.$tv['poster_path']  }}" alt="Parasite" class="hover:opacity-75 transition ease-in-out duration-150"></a>
         <div class="mt-2">
         <a href="{{ route('tv.show', $tv['id']) }}"class="text-lg hover:text-gray:300">{{ $tv['name'] }}</a>
         <div class="flex items-center text-gray-400 text-sm mt-1">
         <svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>
                    
         <span class="ml-1">{{  $tv['vote_average']*10 .'%'}}</span>
         <span class="mx-2">|</span>
         <span>{{  \carbon\carbon::parse($tv['first_air_date'])->format('M d,Y') }}</span>
         </div>
         <div class="text-gray-400 text-sm">
         <span>
         @foreach($tv['genre_ids'] as $genre)
         {{  $genres->get($genre)}} @if(!$loop->last) , @endif
         @endforeach
         </span>
         </div>
         </div>
         </div>
               @endforeach
         
         
            </div>
        </div>
</div>







             
       
       
        
  
@endsection