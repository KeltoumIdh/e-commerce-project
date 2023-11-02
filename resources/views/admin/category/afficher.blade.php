@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h1>La Page Produit</h1>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                    <th>ID</th>
                    <th>Categorie</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($products as $prod)
                    <td>
                        {{$prod->id}}
                    </td>
                    <td>
                        {{optional($prod->category)->name}}
                    </td>
                    <td>
                        {{$prod->name}}
                    </td>
                    <td>
                        {{$prod->description}}
                    </td>
                    <td>
                        {{$prod->selling_price}}
                    </td>
                    <td>
                        <img src="{{asset('assets/uploads/product/' .$prod->image)}}" alt="Image here" style="width: 80px; height: 80px;">
                    </td>
                    <td>
                        <a href="{{ url('edit-product/'.$prod->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{ url('delete-product/'.$prod->id) }}" class="btn btn-danger btn-sm">Delete</a>
                        <a href="{{ url('/products/'.$prod->id.'/show-clients') }}" class="btn btn-info btn-sm">Afficher</a>
                    </td>
                    </tr>
                    @endforeach

                </tr>
            </tbody>
        </table>

    </div>
</div>
@endsection
