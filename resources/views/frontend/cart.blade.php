@extends('layouts.app')

@section('title')
   Mon panier
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



<div class="container my-5">
  <div class="card shadow cartitems">
    @if($cartitems->count()>0)
    <div class="card-body">
      @php
       $total=0;
      @endphp

      @foreach ($cartitems as $item)
      <div class="row product_data">
        <div class="col-md-2 my-auto">
          <img src="{{ asset('assets/uploads/product/'.$item->products->image)}}" height="70px" width="70px" alt="">
        </div>
        <div class="col-md-3 my-auto">
          <h6 class='mt-2'>{{ $item->products->name}}</h6>
        </div>
        <div class="col-md-2 my-auto">
          <h6>{{$item->products->selling_price}} MAD</h6>
        </div>

        <div class="col-md-3 my-auto">
          <input type="hidden" class="prod_id" value="{{ $item->prod_id}}">
         @if($item->products->qty >= $item->prod_qty) 
          <label for="quantity">Quantité</label>
          <div class="input-group text-center mb-3" style="width:100px;">
            <button class="input-group-text  changeQty decrement-btn">-</button>
            <input type="text" name="quantity" class="form-control qty-input text-center" value='{{$item->prod_qty}}'>
            <button class="input-group-text changeQty increment-btn">+</button>

          </div>
        

      @else 
        <h6>En repture non disponible</h6>
          @endif
        </div>
        <div class="col-md-2 my-auto">
          <button class='mt-2 btn btn-danger delete-cart-item'><i class="fa fa-trash"></i> </button>
        </div>
      </div>
     
      @php  
       $total += $item->products->selling_price * $item->prod_qty;
      @endphp
      @endforeach
    </div>
    <div class="card-footer">
      <h6> <b class="float-end">Prix Total: {{$total}} MAD</b> <br> <br>
        <a href="{{ url('/acheter')}}" class="btn btn-outline-dark float-end">Passer à l'achat</a> <br/> <br/>
        <a href="{{ url('category')}}" class="btn btn-outline-dark float-start">Consulter le Catalogue</a>
      </h6>
    </div>
  @else
    <div class="card-body text-center">
      <h3>Votre Panier <i class="fa fa-shopping-cart"></i> est vide </h3>
     <a href="{{ url('category')}}" class="btn btn-outline-dark float-end">Consulter le Catalogue</a>
    </div>
  @endif
  </div>
</div>

@endsection