@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark">
                <div class="card-header">{{ __('Modifica un film') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('movie.destroy', ['movie'=>$movie]) }}">
                        @csrf
                        @method('DELETE')
                        
                        Sei sicuro di voler eliminare il film <i>{{ $movie->title }}</i>?

                        <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  {{ __('Elimina') }}
                              </button>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
