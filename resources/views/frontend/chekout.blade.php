@extends('layouts.app')

@section('title')
   Poursuivre Commande
@endsection
   

@section('content')
<div class="py-3 mb-4 shadow-sm  border-top" style="color: black;">
  <div class="container">
    <h6 class="mb-0">
    <a href="{{ URL::previous() }}"><i class="fa fa-arrow-left"></i></a> /
      <a href="{{ url('/')}}"> Acceuil</a> / 
      <a href="{{ url('cart')}}"> Panier</a>  
      
    </h6>
  </div>

</div>
     <div class="container mt-5 mb-4">
      <form action="{{ route('pay') }}" method="POST">
       @csrf
      <div class="row">
        <div class="col-md-7">
          <div class="card">
            <div class="card-body">

            <div class="col-md-6"><br/>
                  <label><b>Mode de livraison:</b></label><br/>
                  <input type="radio"  value="express"  name="livraison" data-price="100" required onchange="updateTotal()"> <i class="fa fa-truck"></i> Livraison express (100 MAD) <br/>
                  <input type="radio"  value="privé"  name="livraison" data-price="120" required onchange="updateTotal()">   <i class="fa fa-truck"></i> Transporteur privé (120 MAD) <br>
                  <input type="radio"  value="recuperer"  name="livraison" data-price="0" required onchange="updateTotal()">   <i class="fa fa-shopping-basket"></i> Récuperer
                </div><br/>

              <h6>Informations Personnel</h6>
              <hr>
              <div class="row checkout-form">
                <div class="col-md-6 mt-3">
                  <label>Nom </label>
                  <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="fname" placeholder="Enter votre nom" required>
                </div>

                <div class="col-md-6 mt-3">
                  <label>Prénom</label>
                  <input type="text" class="form-control"  value="{{ Auth::user()->lname }}" name="lname" placeholder="Enter votre Prénom" required>
                </div>

                <div class="col-md-6 mt-3">
                  <label>Email</label>
                  <input type="text" class="form-control"  value="{{ Auth::user()->email }}" name="email" placeholder="Enter votre adress mail" required>
                </div>

                <div class="col-md-6 mt-3">
                  <label>Tel</label>
                  <input type="text" class="form-control"  value="{{ Auth::user()->phone }}" name="phone" placeholder="Enter votre numéro de telephone" required>
                </div>
                <div class="col-md-6">
                  <label>Adress d'éxpédition</label>
                  <input type="text" class="form-control"  value="{{ Auth::user()->adress1 }}"   name="adress1" placeholder="Enter votre Adress2" required>
                </div>

                <div class="col-md-6">
                  <label>Adress 2</label>
                  <input type="text" class="form-control"  value="{{ Auth::user()->adress2 }}" name="adress2" placeholder="Enter votre Adress 2" required>
                </div>

                <div class="col-md-6">
                  <label>Pays</label>
                  <input type="text"  value="{{ Auth::user()->country }}" class="form-control" name="country" placeholder="Enter votre pays" required>
                </div>

                <div class="col-md-6">
                  <label>Ville</label>
                  <input type="text"  value="{{ Auth::user()->city }}" class="form-control" name="city" placeholder="Enter votre ville" required>
                </div>

                
                

              </div>
            </div>
          </div>
        </div>
       
        <div class="col-md-5">
          <div class="card">
            <div class="card-body">
            @php
             $total=0;
            @endphp

             <h6>Détails de Commande</h6> 
              <hr>
              <table class="table table-striped table-bordred">
                 <thead>
                   <tr>
                    <th>Nom Produit</th>
                    <th>Quantité</th>
                    <th>Prix</th>
                   </tr>
                 </thead>
                
                  <tbody>
                  @foreach($cartitems as $item)
                  <tr>
                    <td>{{$item->products->name}}</td>
                    <td>{{$item->prod_qty}}</td>
                    <td>{{$item->products->selling_price}}</td>
                    
                  </tr>
                  @php  
                   $total += $item->products->selling_price * $item->prod_qty;
                  @endphp
                  @endforeach
                  </tbody>
              </table>  
              
              
              <script>
  function updateTotal() {
    let expeditionPrice = 0;
    let selectedRadio = document.querySelector('input[name="livraison"]:checked');
    if (selectedRadio) {
      expeditionPrice = parseFloat(selectedRadio.dataset.price);
    }

    let tva = ({{$total}} * 20 / 100);
    let totalCommande = {{$total}} + tva + expeditionPrice;

    document.getElementById('livraison-price').textContent = `${expeditionPrice} MAD`;
    document.getElementById('tax').textContent = `${tva} MAD`;
    document.getElementById('total-commande').textContent = `${totalCommande} MAD`;
  }
</script>
 
             
             sous total: <span class="float-end">{{$total}} MAD</span>  <br>
             Expédition:<span id="livraison-price" class="float-end"></span>      <br>
             TVA: <span  id="tax" class="float-end"> {{$item->products->tax}} %   </span>    <br>
            
            <b style="color:orange;"> TOTAL TTC:<span id="total-commande"class="float-end" > MAD</span></b>
          
              <hr>
              
              
              <button type="submit" class="btn btn-primary float-end">Payez par carte bancaire</button>
              <br>
              
               
              
            </div>
          </div>
        </div>
      </div>
      </form>
      


@endsection

