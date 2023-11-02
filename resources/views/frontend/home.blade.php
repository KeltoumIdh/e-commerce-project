  
@extends('layouts.app')

@section('title')
  Bienvenue à KS-BIKE
@endsection

@section('content')
    @include('layouts.slider')

    <!-- code du caroussel des produits trending  -->
    <div class="py-5">
      <div class="container">
         <div class="row">
          
           <center> <h2>Nouveauté</h2></center>
         <div class="owl-carousel featured-carousel owl-theme">
                @foreach($newProducts as $prod)
                  <div class="item">
                  
                    <div class="card">
                    <a href="{{url ('produits/'.$prod->slug)}}">
                      <img src="{{asset('assets/uploads/product/'.$prod->image)}}" alt="product image" height='240px'>
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
    </div>


   


   <!-- code du caroussel des produits trending  -->
    <div class="py-5">
      <div class="container">
         <div class="row">
          
           <center> <h2>Produits En Vedettes!</h2></center>
         <div class="owl-carousel featured-carousel owl-theme">
                @foreach($featured_products as $prod)
                  <div class="item">
                  
                    <div class="card">
                    <a href="{{url ('produits/'.$prod->slug)}}">
                      <img src="{{asset('assets/uploads/product/'.$prod->image)}}" alt="product image" height='220px'>
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
    </div>


    <div class="py-5">
      <div class="container">
         <div class="row">
          
           <center> <h2>Produits En Promotion</h2></center>
         <div class="owl-carousel featured-carousel owl-theme">
                @foreach($promoted_products as $pro)
                  <div class="item">
                  
                    <div class="card">
                    <a href="{{url ('produits/'.$pro->slug)}}">
                      <img src="{{asset('assets/uploads/product/'.$pro->image)}}" alt="product image" height='220px'>
                    <div class="card-body">
                     <h5>{{$pro->name}}</h5>
                     <span class="float-start">{{ $pro->selling_price}}MAD</span>
                     <span class="float-end text-danger"><s>{{ $pro->original_price}}MAD</s></span>
                  </div>
                  </a>
                  </div>
                  
                </div>
               @endforeach
         </div> 
         </div>
      </div>
    </div>




    

     <!-- code du caroussel des categories   -->
    <div class="py-5">
      <div class="container">
         <div class="row">
           <center> <h2>Acheter par Categorie</h2></center>
         <div class="owl-carousel featured-carousel owl-theme">
                @foreach($trending_category as $tcat)
                  <div class="item">
                    <a href="{{url('category/'.$tcat->slug)}}">
                    <div class="card">
                      <img src="{{asset('assets/uploads/category/'.$tcat->image)}}" alt="tcategory image" height='220px'>
                    <div class="card-body">
                     <h5>{{$tcat->name}}</h5>
                    
                  </div>
                  </div>
                 </a>
                </div>
               @endforeach
         </div> 
         </div>
      </div>
    </div>


   


    

@endsection

@section('scripts')
<script>
   $('.featured-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
</script>
@endsection