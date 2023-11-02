@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">New orders</h4>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Order Date</th>
                                    <th>Tracking Number</th>
                                    <th>Total price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>


                                    @foreach ($orders as $item)
                                    <tr>
                                    <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                    <td>{{ $item->tracking_num }}</td>
                                    <td>{{ $item->total_price }}</td>
                                    <td>{{ $item->status=='0' ?'En attente': 'Livree ' }}</td>
                                    <td>
                                        <a href="{{url('admin/view-order/'.$item->id)}}" class="btn btn-primary btn-sm">view</a>
                                        <a href="{{url('admin/valider-order/'.$item->id)}}" class="btn btn-success">Valider</a>
                                        <a href="{{url('admin/annuler-order/'.$item->id)}}" class="btn btn-danger">Annuler</a>
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
@endsection
