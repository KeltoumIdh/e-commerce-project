@extends('layouts.admin')

@section('content')
<div class="container text-center">
    <h1 class="mb-4">Profile</h1>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="mb-3">Personal Information</h2>
            <div class="card">
                <div class="card-body">
                    <p><strong>Name:</strong> {{ $users->name }}</p>
                    <p><strong>Email:</strong> {{ $users->email }}</p>
                    <!-- Ajoutez d'autres informations spécifiques au profil -->
                </div>
            </div>
        </div>
    </div>
</div>


    <!-- Formulaire de modification des informations personnelles -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Change Information') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('update') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>





                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save changes') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Formulaire de modification mdp -->





@endsection
