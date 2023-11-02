@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">This month orders</h4>
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


                                    @foreach ($thisMonthOrder as $item)
                                    <tr>
                                    <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                    <td>{{ $item->tracking_num }}</td>
                                    <td>{{ $item->total_price }}</td>
                                    <td>{{ $item->status=='0' ?'pending': 'completed' }}</td>

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
