  
@extends('layouts.App')

@section('title')
   welcome to KS-BIKE
@endsection

@section('content')
    @include('layouts.slider')
   <!-- code du caroussel des produits trending  -->
    <div class="py-5">
      <div class="container">
         <div class="row">
           <center> <h2>Featured Products</h2></center>
         <div class="owl-carousel featured-carousel owl-theme">
                @foreach($featured_products as $prod)
                  <div class="item">
                    <div class="card">
                      <img src="{{asset('assets/uploads/products/'.$prod->image)}}" alt="product image">
                    <div class="card-body">
                     <h5>{{$prod->name}}</h5>
                     <span class="float-start">{{ $prod->selling_price}}</span>
                     <span class="float-end"><s>{{ $prod->original_price}}</s></span>
                  </div>
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
           <center> <h2>Trending Categories</h2></center>
         <div class="owl-carousel featured-carousel owl-theme">
                @foreach($trending_category as $tcat)
                  <div class="item">
                    <a href="{{url('view-category'.$tcat->slug)}}">
                    <div class="card">
                      <img src="{{asset('assets/uploads/category/'.$tcat->image)}}" alt="tcategory image">
                    <div class="card-body">
                     <h5>{{$tcat->name}}</h5>
                     <p>
                      {{ $tcat->description}}
                     </p>
                  </div>
                  </div>
                 </a>
                </div>
               @endforeach
         </div> 
         </div>
      </div>
    </div>


    <div class="py-5">
      <div class="container">
         <div class="row">
           <center> <h2>Tout les produits</h2></center>
         <div class="owl-carousel featured-carousel owl-theme">
                @foreach($product as $pro)
                  <div class="item">
                    
                    <div class="card">
                      <img src="{{asset('assets/uploads/product/'.$pro->image)}}" alt="tcategory image">
                    <div class="card-body">
                     <h5>{{$pro->name}}</h5>
                     <p>
                      {{ $pro->description}}
                     </p>
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