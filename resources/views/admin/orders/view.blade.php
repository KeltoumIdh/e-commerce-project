@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">New orders
                            <a href="{{ url('orders') }}" class="btn btn-warning float-end">retour</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                        <br class="col-md-6 orders-details">
                            <h4>shipping details</h4>
                            <hr>
                            <label for="">First name</label>
                            <div class="border">{{ $orders->fname }} </div>
                            <label for="">Last name</label>
                            <div class="border">{{ $orders->lname }} </div>
                            <label for="">Email</label>
                            <div class="border">{{ $orders->email }} </div>
                            <label for="">Cotact no.</label>
                            <div class="border">{{ $orders->phone }} </div>
                            <label for="">Shipping adress</label>
                            <br class="border">
                                {{ $orders->adress1 }} ,<br>
                                {{ $orders->adress2 }}, <br>
                                {{ $orders->city }} ,<br>
                                {{ $orders->state }},
                                {{ $orders->country }},
                        </div>
                        <label for="">Zip code</label>
                        <div class="border">{{ $orders->pincode }} </div>
                    </div>
                        <div class="col-md-6">
                            <h4 >Order Details</h4>
                            <hr>
                        </div>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Image</th>

                                </tr>
                            </thead>
                            <tbody>


                                @foreach ($orders->orderitems as $item)
                                <tr>
                                    <td>
                                        @if ($item->products)
                                            {{ $item->products->name }}
                                        @endif
                                    </td>
                                    <td>{{ $item->qty }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>
                                        @if ($item->products)
                                            <img src="{{ asset('assests/uploads/product/' . $item->products->image) }}" alt="Image here" style="width: 100px; height: 80px;">
                                        @endif
                                    </td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                        <h4 class="px-2">Grand Total: <span class="float-end">{{ $orders->total_price }}</span></h4>




                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
