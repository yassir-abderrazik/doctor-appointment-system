@extends('layouts.app')

@section('content')
    {{-- LOGIN page START --}}

    <div class="vertical-center bg-login">
        <div class="container">
            <div class="row justify-content-center m-3">
                <div class="col-md-8 bg-light rounded-form-home p-4">
                    <center>
                        <img src="{{ asset('/storage/logo.png') }}" alt="logo" height="200px">
                    </center>
                    <h1 class="h1 text-center"> SE CONNECTER </h1>

                    <form method="POST" class="mt-3" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Adresse mail :</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Mot de passe :</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn bg-login">
                                    Se connecter
                                </button>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    {{-- LOGIN page END --}}

@endsection
