@extends('layouts.app')

@section('title')
   Mes Commandes
@endsection
   

@section('content')

<div class="py-3 mb-4 shadow-sm  border-top" style="color: black;">
  <div class="container">
    <h6 class="mb-0">
    <a href="{{ URL::previous() }}"><i class="fa fa-arrow-left"></i></a> /
      <a href="{{url('/')}}"> <i class="fa fa-home"></i> </a> 
      
    </h6>
  </div>

</div>


<div class="container m-4 py-7">
  <div class="row">
    <div class="col-md-12">
      
        <div class="card">
          <div class="card-header">
            <h4 class="text-center">Détails De la Commande</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <b><label for="">Prénom</label></b>
                <div class="border p-2">{{$orders->fname}}</div>
                <b><label for="">Nom</label></b>
                <div class="border p-2">{{$orders->lname}}</div>
                <b><label for="">Email</label></b>
                <div class="border p-2">{{$orders->email}}</div>
                <b><label for="">Tel</label></b>
                <div class="border p-2">{{$orders->phone}}</div>
                <b><label for="">Adresse d'expédition</label></b>
                <div class="border p-2">{{$orders->adress1}},
                {{$orders->adress2}},
                {{$orders->city}},
                {{$orders->country}},

                </div>
               <b><label for="">Date de Commande</label></b> 
                <div class="border p-2">{{date('d F Y', strtotime ($orders->created_at))}}
              </div>
              </div>
              <div class="col-md-6">
              <table class="table table-bordered">
          <thead>
          <tr>
            <th>Nom de produit</th>
            <th>Quantité</th>
            <th>Prix de produit</th>
            
            <th>Image</th>
          </tr>
        </thead>
        <tbody>
          @foreach($orders->orderItems as $item)
          <tr>
            <td>{{$item->products->name}}</td>
            <td>{{$item->qty}}</td>
            <td>{{$item->price}} MAD</td>
            <td>
              <img src=" {{asset('assets/uploads/product/'.$item->products->image)}}" width="70px" alt="">
            
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <span>Frais d'expédition:<span class="float-end">{{$orders->shipping_mode}} MAD</span></span><br>
      <span>TVA: <span class="float-end">{{$orders->order_tax}} MAD</span></span>
      <h5><b>Montant Totale TTC: <span class="float-end">{{$orders->total_price}} MAD</span></b></h5>
              </div>
            </div>

       
          </div>
        </div>
       
    </div>
  </div>

</div>




@endsection
