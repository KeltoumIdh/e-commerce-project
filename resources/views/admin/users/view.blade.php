@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>User details
                    <a href="{{url('users')  }}" class="btn btn-primary btn-sm float-right">Retour</a>
                </h1>
            </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Role</label>
                                <div class="p-2 border">{{ $users->is_admin==0 ?'user':'admin' }}</div>
                            </div>
                            <div class="col-md-4">
                                <label for="">Nom</label>
                                <div class="p-2 border">{{ $users->name }}</div>
                            </div>
                            <div class="col-md-4">
                                <label for="">Nom</label>
                                <div class="p-2 border">{{ $users->lname }}</div>
                            </div>
                            <div class="col-md-4">
                                <label for="">email</label>
                                <div class="p-2 border">{{ $users->email }}</div>
                            </div>
                            <div class="col-md-4">
                                <label for="">phone</label>
                                <div class="p-2 border">{{ $users->phone }}</div>
                            </div>
                            <div class="col-md-4">
                                <label for="">adress1</label>
                                <div class="p-2 border">{{ $users->adress1 }}</div>
                            </div>
                            <div class="col-md-4">
                                <label for="">country</label>
                                <div class="p-2 border">{{ $users->country }}</div>
                            </div>
                            <div class="col-md-4">
                                <label for="">city</label>
                                <div class="p-2 border">{{ $users->city }}</div>
                            </div>

                            </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
