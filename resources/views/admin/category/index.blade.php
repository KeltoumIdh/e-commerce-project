@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h1>La Page Categorie</h1>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($category as $categ)
                    <td>
                        {{$categ->id}}
                    </td>
                    <td>
                        <a class="link-success" href="prod-categ/{{ $categ->id }}">{{$categ->name}}</a>
                    </td>
                    <td>
                        {{$categ->description}}
                    </td>
                    <td>
                        <img src="{{asset('assests/uploads/category/' .$categ->image)}}" alt="Image here" style="width: 100px; height: 80pxphp ;">
                    </td>
                    <td>
                        <a href="{{ url('edit-category/'.$categ->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('delete-category/'.$categ->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                    </tr>
                    @endforeach

                </tr>
            </tbody>
        </table>

    </div>
</div>
@endsection
