@extends('layouts.app')

@section('title')
   Nouveautés
@endsection
   

@section('content')


<div class="py-3 mb-4 shadow-sm  border-top" style="color: black;">
  <div class="container">
    <h5 class="mb-0">
    <a href="{{ URL::previous() }}"><i class="fa fa-arrow-left"></i></a> /
    <a href="{{url('/')}}"> <i class="fa fa-home"></i></a> 
   </h5>
  </div>
</div>

<div class="py-5">
      <div class="container">
         <div class="row">
           <center> <h2> Nouveaux Produits</h2></center>
         
             @foreach($newProducts as $pro)
                  <div class="col-md-3 mb-3">
                    <div class="card">
                    <a href="{{url ('produits/'.$pro->slug)}}">
                    <img src="{{asset('assets/uploads/product/'.$pro->image)}}" alt="product image" height="200px" width="200px">
                    <div class="card-body">
                    <h5>{{$pro->name}}</h5>
                    @if($pro->promo >= 1)
                     <span class="float-start">{{ $pro->selling_price}} MAD</span>
                     <span class="float-end text-danger"><s>{{ $pro->original_price}} MAD</s></span>
                     @else
                     <span class="float-start">{{ $pro->selling_price}} MAD</span>
                     @endif
                  </div>
                 </a>
                  </div>
                </div>
               @endforeach
              
          
         </div>
      </div>
    </div>
    
    {{ $newProducts->links('pagination::simple-bootstrap-4') }}
@endsection