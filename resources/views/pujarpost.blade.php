@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar  ') }}</div>

                <div class="card-body">
                <form method="post" action="{{ route('updatepost') }}" enctype="multipart/form-data">
                        @csrf
                        
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
                        <div class="row mb-3">
                            <label for="descripcio" class="col-md-4 col-form-label text-md-end">{{ __('Descripció') }}</label>

                            <div class="col-md-6">
                                <textarea id="descripcio" type="text" class="form-control @error('descripcio') is-invalid @enderror" name="descripcio" value="{{ old('descripcio') }}"  autocomplete="descripcio"></textarea>

                                @error('descripcio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Pujar Post') }}
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