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

@if(count($orders) > 0)
    <div class="container m-4 py-7">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Mes Commandes</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Date Commande</th>
                                    <th>Num Commande</th>
                                    <th>Mantant Total</th>
                                    <th>Etat</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $item)
                                <tr>
                                    <td>{{ date('d F Y', strtotime($item->created_at)) }}</td>
                                    <td>{{ $item->tracking_num }}</td>
                                    <td>{{ $item->total_price }} MAD</td>
                                    <td>{{ $item->status == '0' ? 'En attente' : 'Livré' }}</td>
                                    <td>
                                        <a href="{{ url('voir-commande/'.$item->id) }}" class="btn btn-outline-secondary">voir detail commande</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
<div class="container m-4 py-7">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Mes Commandes</h4>
                    </div>
     <div class="p-2">
     <h5 class="text-center">Aucune commande disponible.</h5>
    <a href="{{ url('category')}}" class="btn btn-outline-dark float-end">Consulter le Catalogue</a>
     </div>               
    
                </div>
            </div>
        </div>
</div>
@endif


@endsection
