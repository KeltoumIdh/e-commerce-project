@extends('layouts.app')

@section('title')
   Bienvenu 
@endsection
   

@section('content')

<div class="py-3 mb-4 shadow-sm  border-top" style="color: black;">
  <div class="container">
    <h5 class="mb-0">
    <a href="{{ URL::previous() }}"><i class="fa fa-arrow-left"></i></a> /
      <a href="{{ url('/')}}"> <i class="fa fa-home"></i></a>  
        
      
    </h5>
</div>
  </div>

   <div class="container p-5">
       <div class="row justify-content-center">
           <div class="col-md-10">
               <div class="card">
                  <center> <div class="card-header">Mon Compte</div> </center>
                   <div class="card-body">
                      <h4 > Bonjour <b>{{ Auth::user()->name }} {{ Auth::user()->lname }}</b> et Bienvenue à KS-BIKE</h4>
                      <p> à partir de tableau de bord de votre compte vous pouvez visualiser vos commandes récentes, gérer vos adresses de facturation ansi que changer vos informations et le mot de passe </p><br>

                      <table class="table table-bordered" >
                        <tr>
                          <td><a  href="{{url('utilisateur/modifier')}}"><i class="fa fa-address-card-o"></i> Modifier Mes informations</a></td>
                        
                        </tr>
                        <tr>
                          <td><a  href="{{url('mes-commandes')}}"><i class="fa fa-window-restore"></i> Voir Mes Commandes</a></td>
                        
                        </tr>
                      </table>
                      <a href="{{ url('category')}}" class="btn btn-outline-dark float-end">Consulter le Catalogue</a>
                   </div>
               </div>
           </div>
       </div>
   </div>
   @endsection