@extends('layouts.app')

@section('content')

<div class="py-3 mb-4 shadow-sm  border-top" style="color: black;">
  <div class="container">
    <h5 class="mb-0">
    <a href="{{ URL::previous() }}"><i class="fa fa-arrow-left"></i></a> /
    <a href="{{url('/')}}"> <i class="fa fa-home"></i> </a>
    </h5>
</div>
</div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <div class="container p-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ $title ?? "" }} {{ __('Mettre à jour mes informations') }}</div>

                <div class="card-body">
    <form action="{{ route('utilisateur.mettreAJour') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">Nom :</label>
            <div class="col-md-7">
            <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control" required>
          </div>
        </div>

        <div class="row mb-3">
            <label for="lname" class="col-md-4 col-form-label text-md-end">Prénom :</label>
            <div class="col-md-7">
            <input type="text" name="lname" id="lname" value="{{ $user->lname }}" class="form-control" required>
        </div>
       </div>

        <div class="row mb-3">
            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __("télephone") }}</label>
            <div class="col-md-7">
            <input type="text" name="phone" id="phone" value="{{ $user->phone }}" class="form-control" required>
</div>
        </div>
        
        <div class="row mb-3">
            <label for="phone" class="col-md-4 col-form-label text-md-end">Adress:</label>
            <div class="col-md-7">
            <input type="text" name="adress1" id="adress1" value="{{ $user->adress1 }}" class="form-control" required>
            </div>
        </div>
        </div>

        
        <div class="row mb-3">
    <label for="country" class="col-md-4 col-form-label text-md-end">{{ __("Pays") }}</label>
    <div class="col-md-7">
        <select id="country" value="{{ $user->country }}"  class="form-control @error('country') is-invalid @enderror" name="country" required>
            <option value="maroc">Maroc</option>
            <option value="france">France</option>
            <option value="algerie">Algérie</option>
            <option value="tunisie">Tunisie</option>
            <option value="italie">Italie</option>
        </select>
      
    </div>
</div>

    <div class="row mb-3">
        <label for="city" class="col-md-4 col-form-label text-md-end">{{ __("Ville") }}</label>
        <div class="col-md-7">
             <select id="city" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $user->city }}"  required>
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
          
       </div>
   </div>

      

        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">Email :</label>
            <div class="col-md-7">
            <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control" required>
        </div>
       </div>

        <div class="row mb-3">
        <label for="password" class="col-md-4 col-form-label text-md-end">Mot de passe :</label>
        <div class="col-md-7">
        <input type="password" name="password" id="password" class="form-control" required>
        </div>
        </div>

        <div class="row mb-3">
         <label for="password_confirmation" class="col-md-4 col-form-label text-md-end">Confirmer le mot de passe :</label>
         <div class="col-md-7">
         <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
        </div>
        </div>
        <br>

       <center> <button type="submit" class="btn btn-dark w-50">Mettre à jour</button></center><br>
    </form>
    </div>
    </div>
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
@endsection
