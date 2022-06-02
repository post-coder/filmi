@extends('layouts.app')

@section('content')
  <div class="container">
    <div id="header">
      <a id="addMovie" href="{{ route('movie.create') }}">
        Aggiungi
      </a>
    </div>

  </div>

  <div id="movies-index" class="container">
    <div class="h1">Lista dei film da vedere</div>

    <ul id="movies-list">

      @foreach ($movies as $movie)

        <li class="movie-row @if($movie->seen) is-seen @endif">
          <button class="movie-details" data-bs-toggle="collapse" data-bs-target="#collapse-{{$loop->index}}" aria-expanded="false">
            <div class="row">

              <div class="title col-12 col-sm-3">
                <strong>{{$movie->title}}</strong>
              </div>

              <div id="collapse-{{$loop->index}}" class="inner-details collapse">

                <div class="why col-12 col-sm-4">
                  <small>Perchè guardarlo?<br></small>
                  {{$movie->why}}
                </div>
                <div class="description col-12 col-sm-5">
                  <small>Descrizione<br></small>
                  {{$movie->description}}
                </div>

                <div class="created-by col-12 col-sm-3">
                  <small>Suggerito da </small>
                  {{$movie->user->name}}
                </div>
              </div>
            </div>
          </button>

          <div class="movie-edit-button">
            <a href="{{ route('movie.edit', ['movie' => $movie])}}">
              <span class="material-symbols-rounded">
                edit_note
              </span>
            </a>
          </div>
          <div class="movie-delete-button">
            
            <a type="submit"href="{{ route('movie.delete', ['movie' => $movie]) }}">
              <span class="material-symbols-rounded">
                delete_forever
              </span>
            </a>
            
          </div>
          <div class="movie-seen">
            @if($movie->seen)
              <a class="badge bg-success" href="{{route('movie.unsee', ['movie' => $movie])}}">Visto</a>
            @else
              <a class="badge bg-danger" href="{{route('movie.see', ['movie' => $movie])}}">Da vedere</a>
            @endif
          </div>
        </li> 
           
      @endforeach

    </ul>
  </div>

@endsection