@extends('layouts.app')

@section('title')
   Facture
@endsection
   

@section('content')
<div class="py-3 mb-4 shadow-sm  border-top" style="color: black;">
  <div class="container">
    <h6 class="mb-0">
    
      <a href="{{url('/')}}"> <i class="fa fa-home"></i> </a> 
      
    </h6>
  </div>

</div>
@if(isset($status))
    <div class="alert alert-success">
        {{ $status }}
    </div>
@endif

<div class="container m-4 py-7">
  <div class="row">
    <div class="col-md-12">
      
        <div class="card">
          <div class="card-header">
            <h4 class="text-center">Facture</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 ">
                <div><p>Merci d'avoir acheté chez KS-Bike ! votre commande a été reçue.</p></div>
                <h6><b>Facture</b></h6>
                <hr>
                <label>Nom Complet:</label>
                <b><span class="float-end">{{$order->fname}} {{$order->lname}}</span></b><br>
                <label>Numéro de commande:</label>
                <b><span class="float-end">{{$order->tracking_num}} </span></b><br>
                <label for="">Total TTC:</label>
                <b><span class="float-end">{{$order->total_price}} MAD</span></b> <br>
                <label for="">Date:</label>
                <b> <span class="float-end">{{ date('d F Y', strtotime($order->created_at))}}</span></b>
               
              </div>
</div>
              <br>
              <div class="col-md-12">
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
          @foreach($order->orderItems as $item)
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

      <div class="col-md-6">
      <span>Frais d'expédition:<span class="float-end">{{$order->shipping_mode}} MAD</span></span><br>
      <span>TVA: <span class="float-end">{{$order->order_tax}} MAD</span></span>
      <h5 style="color:red"><b>Montant Totale TTC: <span class="float-end">{{$order->total_price}} MAD</span></b></h5>
              </div>
            </div>
</div>

       
          </div>
        </div>
       
    </div>
  </div>

</div>


@endsection