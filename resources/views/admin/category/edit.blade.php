@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Modifier Categorie</h4>
    </div>
    <div class="card-body">
        <form action="{{url('update-category/'.$category->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-6">
                    <label for="">Name</label>
                    <input type="text" value="{{ $category->name }}" name="name" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="">Slug</label>
                    <input type="text" name="slug" value="{{ $category->slug }}" class="form-control">
                </div>
                <div class="col-md-12">
                    <label for="">Description</label>
                    <textarea  name="description" id=""  cols="3" class="form-control">{{ $category->description }}</textarea>
                </div>
                <div class="col-md-6">
                    <label for="">Status</label>
                    <input type="checkbox" {{ $category->status ? 'checked' :'' }}  name="status" >
                </div>
                <div class="col-md-6">
                    <label for="">Popular</label>
                    <input type="checkbox" {{ $category->popular ? 'checked' :'' }} name="popular" >
                </div>
                <div class="col-md-12">
                    <label for="">Meta title</label>
                    <input type="text" name="meta-title" value="{{ $category->meta_title }}" class="form-control">
                </div>
                <div class="col-md-12">
                    <label for="">Meta keywords</label>
                    <input type="text" name="meta-key" value="{{ $category->meta_keywords }}" class="form-control">
                </div>
                <div class="col-md-12">
                    <label for="">Meta description</label>
                    <textarea  name="meta-descrip" id=""  cols="3" class="form-control">{{ $category->meta_descrip }}</textarea>
                </div>
                @if ($category->image)
                    <img src="{{ asset('assests/uploads/category/'.$category->image) }}" alt="categ image">
                @endif
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
