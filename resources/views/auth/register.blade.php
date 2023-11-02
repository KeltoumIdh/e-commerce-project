@extends('layouts.app')

@section('content')
<div class="container p-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ $title ?? "" }} {{ __('Inscription') }}</div>

                <div class="card-body">
                    @isset($route)
                        <form method="POST" action="{{ $route }}">
                    @else
                        <form method="POST" action="{{ route('register') }}">
                    @endisset
                        @csrf
                        
                

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __("Prénom") }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('User name') is-invalid @enderror" name="name" value="{{ old('User name') }}" required autocomplete="name" autofocus>

                                @error('User Name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="lname" class="col-md-4 col-form-label text-md-end">{{ __("Nom ") }}</label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required autocomplete="lname" autofocus>

                                @error('lName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email ') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Tel ') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="adress1" class="col-md-4 col-form-label text-md-end">{{ __("Adresse") }}</label>

                            <div class="col-md-6">
                                <input id="adress1" type="text" class="form-control @error('adress1') is-invalid @enderror" name="adress1" value="{{ old('adress1') }}" required autocomplete="adress1" autofocus>

                                @error('adress1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
    <label for="country" class="col-md-4 col-form-label text-md-end">{{ __("Pays") }}</label>
    <div class="col-md-6">
        <select id="country" class="form-control @error('country') is-invalid @enderror" name="country" required>
            <option value="maroc">Maroc</option>
            <option value="france">France</option>
            <option value="algerie">Algérie</option>
            <option value="tunisie">Tunisie</option>
            <option value="italie">Italie</option>
        </select>
        @error('country')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

    <div class="row mb-3">
        <label for="city" class="col-md-4 col-form-label text-md-end">{{ __("Ville") }}</label>
           <div class="col-md-6">
             <select id="city" class="form-control @error('city') is-invalid @enderror" name="city" required>
                <!-- Options de ville pour le pays Maroc -->
            <option value="casablanca">Casablanca</option>
            <option value="rabat">Rabat</option>
            <option value="marrakech">Marrakech</option>

            <!-- Options de ville pour le pays France -->
            <option value="paris">Paris</option>
            <option value="marseille">Marseille</option>
            <option value="lyon">Lyon</option>

            <!-- Options de ville pour le pays Algérie -->
            <option value="alger">Alger</option>
            <option value="oran">Oran</option>
            <option value="constantine">Constantine</option>

            <!-- Options de ville pour le pays Tunisie -->
            <option value="tunis">Tunis</option>
            <option value="sfax">Sfax</option>
            <option value="sousse">Sousse</option>

            <!-- Options de ville pour le pays Italie -->
            <option value="rome">Rome</option>
            <option value="milan">Milan</option>
              <option value="venise">Venise</option>
            </select>
           @error('city')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
           @enderror
     </div>
</div>

@section('scripts')
    <script>
        // Obtenir les références des menus déroulants de pays et de ville
        const countrySelect = document.getElementById('country');
        const citySelect = document.getElementById('city');

        // Définir les options de ville pour chaque pays
        const cityOptions = {
            maroc: [
                { value: 'casablanca', label: 'Casablanca' },
                { value: 'rabat', label: 'Rabat' },
                { value: 'marrakech', label: 'Marrakech' }
            ],
            france: [
                { value: 'paris', label: 'Paris' },
                { value: 'marseille', label: 'Marseille' },
                { value: 'lyon', label: 'Lyon' }
            ],
            algerie: [
                { value: 'alger', label: 'Alger' },
                { value: 'oran', label: 'Oran' },
                { value: 'constantine', label: 'Constantine' }
            ],
            tunisie: [
                { value: 'tunis', label: 'Tunis' },
                { value: 'sfax', label: 'Sfax' },
                { value: 'sousse', label: 'Sousse' }
            ],
            italie: [
                { value: 'rome', label: 'Rome' },
                { value: 'milan', label: 'Milan' },
                { value: 'venise', label: 'Venise' }
            ]
        };

        // Mettre à jour les options de ville en fonction du pays sélectionné
        function updateCityOptions() {
            const selectedCountry = countrySelect.value;
            const selectedCity = citySelect.value;

            // Supprimer toutes les options de ville actuelles
            while (citySelect.options.length > 0) {
                citySelect.remove(0);
            }

            // Ajouter les options de ville appropriées
            const cities = cityOptions[selectedCountry];
            cities.forEach(city => {
                const option = new Option(city.label, city.value);
                citySelect.add(option);
            });

            // Rétablir la ville sélectionnée si elle existe toujours
            if (cities.find(city => city.value === selectedCity)) {
                citySelect.value = selectedCity;
            }
        }

        // Écouter les changements de pays et mettre à jour les options de ville
        countrySelect.addEventListener('change', updateCityOptions);

        // Initialiser les options de ville lors du chargement de la page
        updateCityOptions();
    </script>
@endsection

                        

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmer Mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark " >
                                    {{ __('Inscription') }}
                                </button> <br>
                                vous avez déja un compte?  <a class="btn btn-link" href="{{url('/login')}}">se connecter!</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection