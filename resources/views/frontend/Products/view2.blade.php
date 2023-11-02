@extends('layouts.app')

@section('title',$products->name)
   

@section('content')

<div class="py-3 mb-4 shadow-sm  border-top" style="color: black;">
  <div class="container">
    <h4 class="mb-0">
    <a href="{{ URL::previous() }}"><i class="fa fa-arrow-left"></i></a> /
      <a href="{{url('/')}}"> <i class="fa fa-home"></i></a>
       </h4>
      
  </div>

</div>

<div class="container mb-5">
  <div class="card shadow product_data">
    <div class="card-body">
      <div class="row">
        <div class="col-md-4 border-right">
          <img src="{{asset('assets/uploads/product/'. $products->image)}}" class="w-100" height="300px" width="200px" alt="">
        </div>
        <div class="col-md-8">
          <h2 class="mb-0">
            {{ $products->name}}
            <label style="font-size: 16px;background-color:#f7a54a;" class="float-end badge  trending_tag" >{{$products->trending == '1'? 'trending': ''}}</label>
          </h2>

          <hr>
          
          @if($products->promo >= 1)
            <label class="me-3  text-danger"> Prix original: <s> {{$products->original_price}} MAD</s></label>
            <label class="fw-bold"> Prix promo: {{$products->selling_price}} MAD</label>
          @else
            <label class="fw-bold"> Prix : {{$products->selling_price}} MAD</label>
          @endif

          <p class="mt-3">
               {{$products->small_descrip}}
          </p>
          <hr>
          @if($products->qty >0 )
            <label class="badge bg-success">En stock</label>
          @else
          <label class="badge bg-danger">En repture de stock</label>
          @endif
          
          <div class="row mt-2">
             <div class="col-md-3">
              <input type="hidden" value="{{$products->id}}" class="prod_id">
              <label for="Quantity">Quantity</label>
              <div class="input-group text-center mb-3">
                <button class="input-group-text decrement-btn"> -</button>
                <input type="text" name="quantity " value="1" class="form-control qty-input text-center"/>
                <button class="input-group-text increment-btn">+</button>
              </div>
               

              
             </div>
          </div>
          <div class="col-md-9">
             
              @if($products->qty >0 )
              <button type="button" class="btn  me-3 addToCart-btn float-start" style="background-color:#353535; color:white">Ajouter Au Panier <i class="fa fa-shopping-cart"></i></button>
              @endif
              <button type="button" class="btn  me-3 addToFav-btn float-start" style="background-color:#f7a54a; color:white">Ajouter Au Favoris <i class="fa fa-heart"></i></button>
              </div>
        </div>
      </div>
      <hr/>
              <h3>Description</h3>
              <p>{{$products->description}}</p>

    </div>
  </div>
</div>

@endsection

