<!-- la page category -->
@extends('layouts.App')

@section('title')
   category
@endsection

@section('content')
   <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <center><h2>All Categories</h2></center>
          <div class="row">
            @foreach($category as $cat)
            <div class="col-md-3 mb-3">
               <a href="{{url('view-category'.$cat->slug)}}">
                    <div class="card">
                      
                      <img src="{{asset('assets/uploads/category/'.$cat->image)}}" alt="category image">
                    <div class="card-body">
                     <h5>{{$cat->name}}</h5>
                     <p>
                      {{ $cat->description}}
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