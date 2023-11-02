@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Ajouter Categorie</h4>
    </div>
    <div class="card-body">
        <form action="{{url('insert-category')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="">Slug</label>
                    <input type="text" name="slug" class="form-control">
                </div>
                <div class="col-md-12">
                    <label for="">Description</label>
                    <textarea  name="description" id="" cols="3" class="form-control"></textarea>
                </div>
                <div class="col-md-6">
                    <label for="">Status</label>
                    <input type="checkbox" name="status" >
                </div>
                <div class="col-md-6">
                    <label for="">Popular</label>
                    <input type="checkbox" name="popular" >
                </div>
                <div class="col-md-12">
                    <label for="">Meta title</label>
                    <input type="text" name="meta-title" class="form-control">
                </div>
                <div class="col-md-12">
                    <label for="">Meta keywords</label>
                    <input type="text" name="meta-key" class="form-control">
                </div>
                <div class="col-md-12">
                    <label for="">Meta description</label>
                    <input type="text" name="meta-descrip" class="form-control">
                </div>
                <div class="col-md-12">
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="col-md-12">
                    <input type="submit" name="" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
