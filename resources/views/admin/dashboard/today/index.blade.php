@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">Today orders</h4>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Order Date</th>
                                    <th>Tracking Number</th>
                                    <th>Total price</th>
                                    <th>Status</th>

                                </tr>
                            </thead>
                            <tbody>


                            @foreach ($todayOrders as $order)
    <tr>
        <td>{{ date('d-m-Y', strtotime($order->created_at)) }}</td>
        <td>{{ $order->tracking_num }}</td>
        <td>{{ $order->total_price }}</td>
        <td>{{ $order->status == '0' ? 'en attente' : 'livré' }}</td>
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
