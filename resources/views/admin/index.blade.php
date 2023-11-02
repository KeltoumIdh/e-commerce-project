@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="me-md-3 me-xl-5">
            <h2>Dashboard</h2>
            <hr>

        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <h5 class="card-title">Total Orders</h5>
                <h1>{{ $totalOrder }}</h1>
                <a href="{{ url('orders') }}" class="card-link">View</a>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h5 class="card-title">Today Orders</h5>
                <h1>{{ $todayOrder }}</h1>
                <a href="{{ url('today-orders') }}" class="card-link">View</a>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card bg-warning text-white">
            <div class="card-body">
                <h5 class="card-title">This month Orders</h5>
                <h1>{{ $thisMonthOrder }}</h1>
                <a href="{{ url('month-orders') }}" class="card-link">View</a>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card bg-danger text-white">
            <div class="card-body">
                <h5 class="card-title">Last Month Orders</h5>
                <h1>{{ $lastMonthOrder }}</h1>
                <a href="{{ url('lastmonth-orders') }}" class="card-link">View</a>
            </div>
        </div>
    </div>

    <hr>
    <div class="col-md-6 mb-3">
        <div class="card bg-info text-white">
            <div class="card-body">
                <h5 class="card-title">Total Products</h5>
                <h1>{{ $totalProduct }}</h1>
                <a href="{{ url('products') }}" class="card-link">View</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="card bg-info text-white">
            <div class="card-body">
                <h5 class="card-title">Total Categories</h5>
                <h1>{{ $totalCategories }}</h1>
                <a href="{{ url('categories') }}" class="card-link">View</a>
            </div>
        </div>
    </div>

    <hr>
    <div class="col-md-4 mb-3">
        <div class="card bg-secondary text-white">
            <div class="card-body">
                <h5 class="card-title">All users</h5>
                <h1>{{ $totalAllUsers }}</h1>
                <a href="{{ url('users') }}" class="card-link">View</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card bg-secondary text-white">
            <div class="card-body">
                <h5 class="card-title">Clients</h5>
                <h1>{{ $totalUser }}</h1>
                <a href="{{ url('clients') }}" class="card-link">View</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card bg-secondary text-white">
            <div class="card-body">
                <h5 class="card-title">Admins</h5>
                <h1>{{ $totalAdmin }}</h1>
                <a href="{{ url('admin123') }}" class="card-link">View</a>
            </div>
        </div>
    </div>

</div>
@endsection
