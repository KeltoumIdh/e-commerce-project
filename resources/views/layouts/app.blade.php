<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> -->

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Roboto&display=swap" rel="stylesheet">

     

     <!-- styles -->

    <link href="{{asset('frontend/css/bootstrap5.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/custom.css')}}" rel="stylesheet">
     <link href="{{asset('frontend/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/owl.theme.default.min.css')}}" rel="stylesheet"> 

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"  />

    

 

    <style>
        a{
            text-decoration:none;
            color:black;
           
        },
        
        h1{
            text: bold;
            
        }
        
        
    </style>
</head>
<body>



<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-2 ">
  <div class="container">
    <a class="navbar-brand " href="{{Url('/')}}">
        <img src="" width=50 alt="">
        KS-BIKE
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="searchbar">
    <form action="{{url('searchproduct')}}" method="POST">
        @csrf
       <div class="input-group ">
          <input type="search" class="form-control" id="floatingInputGroup1" required name="product_name" placeholder="Recherche Produits..">
          
           <button type="submit" class="input-group-text"><i class="fa fa-search"></i></button>
        </div>
    </form>
    
    </div>
   
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="{{Url('/')}}">Acceuil</a>
        </li>
        

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="{{url('category')}}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
          </a>
          <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{url('category/')}}">Tous les catégories</a></li>
            <li><a class="dropdown-item" href="{{url('category/trottinette-electrique-pliable')}}">Troutinettes éléctriques</a></li>
            <li><a class="dropdown-item" href="{{url('category/velos-electriques')}}">Vélos éléctriques</a></li>
            <li><a class="dropdown-item" href="{{url('category/velos-de-route')}}">Vélos Route</a></li>
            <li><a class="dropdown-item" href="{{url('category/accessoires-velo')}}">Accesoires Vélo </a></li>
            <li><a class="dropdown-item" href="{{url('category/trotinette-enfants')}}">Trotinette Enfants</a></li>
          </ul>
        </li>

       
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Produits
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{url('/nouveauté')}}">Nouveautés </a></li>
            <li><a class="dropdown-item" href="{{url('/promotion')}}">En Promotion</a></li>
          </ul>
        </li>
         
       
     @if(Auth::user())
       @if(isset($cartitems) && !empty($cartitems) && count($cartitems) > 0)
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/acheter') }}">Poursuivre Cmd</a>
        </li>
      @else
        <li class="nav-item">
            <a class="nav-link disabled" href="#">Poursuivre Cmd</a>
        </li>
      @endif
    @endif
      
       

        <li class="nav-item">
          <a class="nav-link" href="{{url('panier')}}"> <i class="fa fa-shopping-cart"></i></a>
        </li>
      

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Inscrire') }}</a>
                                </li>
                            @endif
                        @else
                         
                        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu">
            <li>
                <a class="dropdown-item" href="{{url('/home')}}"><i class="fa fa-user"></i>  Mon Compte</a>
            </li>
            @if(Auth::user())
            <li>
                <a class="dropdown-item" href="{{url('mes-commandes')}}"><i class="fa fa-window-restore"></i> Mes Commandes</a>
            </li>
            @endif
            @if(Auth::user()->is_admin == 1)
            <li>
                <a class="dropdown-item" href="{{url('/dashboard')}}"> <i class="fa fa-table-columns"></i> tableau de bord</a>
            </li>
            @endif
            <li>
                <a class="dropdown-item"  href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> 
                <i class="fa fa-sign-out"></i> {{ __('Deconnexion') }}
            </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
            </li>
           
           
          </ul>
        </li>

                        @endguest
                    </ul>
   
                </div>
            </div>
        </nav>

        <main >
            @yield('content')
        </main>
    </div>


    <footer class="footer-section">
        <div class="container">
             <div class="footer-cta pt-5 pb-5"> 
                <div class="row">
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-map-marker-alt"></i>
                            
                        </div>
                    </div>
                </div> 
             </div> 
            <div class="footer-content pt-5 pb-5">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 mb-50">
                        <div class="footer-widget">
                            <div class="footer-logo">
                                <a href="index.html"><img src="" class="img-fluid" alt="logo"></a>
                            </div>
                            <div class="footer-text">
                                <p>Explorez notre gamme de vélos et trouvez votre compagnon idéal pour des aventures palpitantes et des promenades inoubliables..</p>
                            </div>
                            <div class="footer-social-icon">
                                <span>Abonnez-vous</span>
                                <a href="#"><i class="fa fa-facebook facebook-bg"></i></a>
                                <a href="#"><i class="fa fa-twitter twitter-bg"></i></a>
                                <a href="#"><i class="fa fa-linkedin linkedin-bg"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>liens Rapides</h3>
                            </div>
                            <ul>
                                <li><a href="#">Acceuil</a></li>
                                <li><a href="#">Apropos</a></li>
                                <li><a href="#">services</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">Contactez nous</a></li>
                                <li><a href="#">Nos services</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Abonnez-vous</h3>
                            </div>
                            <div class="footer-text mb-25">
                                <p>N'oubliez pas de vous abonner à nos nouveaux flux. Veuillez remplir le formulaire ci-dessous.</p>
                            </div>
                            <div class="subscribe-form">
                                <form action="#">
                                    <input type="text" placeholder="entrer votre adresse mail">
                                    <button><i class="fab fa-telegram-plane"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 text-center text-lg-left">
                        <div class="copyright-text">
                            <p>Copyright &copy; 2023, All Right Reserved <a href="https://codepen.io/anupkumar92/">Anup</a></p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </footer>


    
     <!-- Scripts -->
     <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
     <script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/js/custom.js')}}"></script>
    
    

    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script>
  
    var availableTags = [ ];
    $.ajax({
        method:"GET",
        url:"/list-produit",
        success: function (response){

            startAutoComplete(response);
        }
    });
     
     function startAutoComplete(availableTags){
        $( "#floatingInputGroup1" ).autocomplete({
      source: availableTags
    });
 
     }
   
  </script>

    
    <script src="{{asset('frontend/js/sweetalert.min.js')}}"></script>
      
   

   
    
    @if(session('status'))
    <script>
        swal("{{ session('status')}}");
    </script>
    @endif
    @yield('scripts')
    
</body>
</html>
