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

    <div id="movies-list" class="accordion accordion-flush">

      @foreach ($movies as $movie)

        <div class="accordion-item movie @if($movie->seen) is-seen @endif">
          <h2 id="heading-{{$loop->index}}" class="title accordion-header" >
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{$loop->index}}" aria-expanded="true" aria-controls="collapse-{{$loop->index}}">
                <strong>{{$movie->title}}</strong>
            </button>
          </h2>
          <div id="collapse-{{$loop->index}}" class="inner-details collapse accordion-collapse collapse" aria-labelledby="heading-{{$loop->index}}" data-bs-parent="#movies-list">
            <div class="accordion-body">
              <div class="movie-details">
                <div class="why">
                  <small>Perchè guardarlo?<br></small>
                  {{$movie->why}}
                </div>
                <div class="description">
                  <small>Descrizione<br></small>
                  {{$movie->description}}
                </div>
  
                <div class="created-by">
                  <small>Suggerito da </small>
                  {{$movie->user->name}}
                </div>
              </div>

              <div class="movie-actions">
                <div class="movie-edit-button">
                  <a href="{{ route('movie.edit', ['movie' => $movie])}}">
                    <span class="material-symbols-rounded">
                      edit_note
                    </span>
                  </a>
                </div>
                <div class="movie-delete-button">
                  
                  <a type="submit" href="{{ route('movie.delete', ['movie' => $movie]) }}">
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
              </div>
            </div>
          </div>
        </div>

          
           
      @endforeach

    </ul>
  </div>

@endsection