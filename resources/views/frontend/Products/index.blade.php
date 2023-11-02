<!-- la pages des produits apres le clique sur une categorie -->

@extends('layouts.app')

@section('title')
    {{ $category->name}}
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm  border-top" style="color: black;">
  <div class="container">
    <h6 class="mb-0">
    <a href="{{ URL::previous() }}"><i class="fa fa-arrow-left"></i></a> /
    <a href="{{url('/')}}"> <i class="fa fa-home"></i></a> /
    <a href="{{ url('category')}}"> Categories </a> /
    <a href="{{ url('category/'.$category->slug)}}">{{$category->name}} </h6>
  </div>
</div>

<div class="py-5">
      <div class="container">
         <div class="row">
           <center> <h2>{{ $category->name}}</h2></center>
         
                @foreach($products as $prod)
                  <div class="col-md-3 mb-3">
                    <div class="card">
                      <a href="{{url ('category/'.$category->slug. '/'.$prod->slug)}}">
                      <img src="{{asset('assets/uploads/product/'.$prod->image)}}" height="200px" width="200px" alt="product image">
                    <div class="card-body">
                     <h5>{{$prod->name}}</h5>
                     @if($prod->promo >= 1)
                     <span class="float-start">{{ $prod->selling_price}} MAD</span>
                     <span class="float-end text-danger"><s>{{ $prod->original_price}} MAD</s></span>
                     @else
                     <span class="float-start">{{ $prod->selling_price}} MAD</span>
                     @endif
                  </div>
                 </a>
                  </div>
                </div>
               @endforeach
              
          
         </div>
      </div>
    </div>
   <center> {{ $products->links('pagination::simple-bootstrap-4') }}</center> 

@endsection