@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark">
                <div class="card-header">{{ __('Modifica un film') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('movie.update', ['movie'=>$movie]) }}">
                        @csrf

                        <div class="mb-2 row">
                            <label for="title" class="col-md-4 col-form-label text-md-right"> {{__('Titolo')}} </label>
                            <div class="col-md-6">
                              <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title',$movie->title) }}" autocomplete="title">

                              @error('title')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror

                            </div>
                        </div>

                        <div class="mb-2 row">
                          <label for="why" class="col-md-4 col-form-label text-md-right"> {{__('Motivazione')}} </label>
                          <div class="col-md-6">
                            <input id="why" type="text" class="form-control @error('why') is-invalid @enderror" name="why" value="{{ old('why',$movie->why) }}" autocomplete="why">

                            @error('why')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                        </div>

                        <div class="mb-2 row">
                          <label for="description" class="col-md-4 col-form-label text-md-right"> {{__('Descrizione')}} </label>
                          <div class="col-md-6">
                            <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="description">{{ old('description',$movie->description) }}</textarea>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                        </div>

                        <div class="mb-0 row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  {{ __('Aggiungi') }}
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
