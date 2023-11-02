<!-- la page category -->
@extends('layouts.app')

@section('title')
   Catalogue
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm  border-top" style="color: black;">
  <div class="container">
    <h5 class="mb-0">
    <a href="{{ URL::previous() }}"><i class="fa fa-arrow-left"></i></a> /
    <a href="{{url('/')}}"> <i class="fa fa-home"></i> </a>
    </h5>
</div>
</div>

   <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <center><h2>Tous les Categories</h2></center>
          <div class="row">
            @foreach($category as $cat)
            <div class="col-md-3 mb-3">
               <a href="{{url('category/'.$cat->slug)}}">
                    <div class="card">
                      
                      <img src="{{asset('assets/uploads/category/'.$cat->image)}}" alt="category image" height="250px">
                    <div class="card-body">
                     <h5>{{$cat->name}}</h5>
                     <p>
                      {{ $cat->meta_title}}
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
   </div>
@endsection