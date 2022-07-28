@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar  ') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="surname" class="col-md-4 col-form-label text-md-end">{{ __('Surname') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="surname" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname">

                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nick" class="col-md-4 col-form-label text-md-end">{{ __('Nick') }}</label>

                            <div class="col-md-6">
                                <input id="nick" type="nick" class="form-control @error('nick') is-invalid @enderror" name="nick" value="{{ old('nick') }}" required autocomplete="nick">

                                @error('nick')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form><br>
                    <form method="POST" action="{{ route('updateavatar') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="imatge" class="col-md-4 col-form-label text-md-end">{{ __('Avatar') }}</label>
                            
                            <div class="col-md-6">
                            @if(Auth::user()->image)
                                <div class="container-avatar">
                                    <img src="{{ route('user.avatar',['filename'=>Auth::user()->image])}}" class="avatarform">
                                </div>
                                @else 
                                    {{ Auth::user()->name }}
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="imatge" class="col-md-4 col-form-label text-md-end">{{ __('Penjar Avatar') }}</label>

                            <div class="col-md-6">
                                <input id="imatge" type="file" class="form-control @error('imatge') is-invalid @enderror" name="imatge" value="{{ old('imatge') }}" required autocomplete="imatge">

                                @error('imatge')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Cambiar Avatar') }}
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