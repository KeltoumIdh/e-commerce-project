@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Modifier Produit</h4>
    </div>
    <div class="card-body">
        <form action="{{url('update-product/'.$product->id)}}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <select class="form-select" >
                        <option value="">{{ $product->category->name }}</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{ $product->name }}" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="">Slug</label>
                    <input type="text" name="slug" value="{{ $product->slug }}" class="form-control">
                </div>

                <div class="col-md-12">
                    <label for="">Small Description</label>
                    <textarea  name="small_descrip" id="" cols="3" class="form-control">{{ $product->small_descrip }}</textarea>
                </div>
                <div class="col-md-12">
                    <label for="">Description</label>
                    <textarea  name="description" id="" cols="3" class="form-control">{{ $product->description }}</textarea>
                </div>
                <div class="col-md-6">
                    <label for="">Original price</label>
                    <input type="number" class="form-control" value="{{ $product->original_price }}" name="original_price" >
                </div>
                <div class="col-md-6">
                    <label for="">Selling price</label>
                    <input type="number" class="form-control" value="{{ $product->selling_price }}" name="selling_price" >
                </div>
                <div class="col-md-6">
                    <label for="">Quantity</label>
                    <input type="number" class="form-control" value="{{ $product->qty }}" name="qty" >
                </div>
                <div class="col-md-6">
                    <label for="">tax</label>
                    <input type="number" class="form-control" value="{{ $product->tax }}" name="tax" >
                </div>
                <div class="col-md-6">
                    <label for="">Status</label>
                    <input type="checkbox" name="status" {{ $product->status ? 'checked':'' }} >
                </div>
                <div class="col-md-6">
                    <label for="">trending</label>
                    <input type="checkbox" name="trending" {{ $product->trending ? 'checked':'' }}>
                </div>
                <div class="form-group">
                    <label for="">Promo</label>
                    <input type="checkbox" name="promo" {{ $product->promo ? 'checked':'' }}>
                </div>
                <div class="col-md-6">
                    <label for="promotion_duration">Durée de promotion (en jours)</label>
                    <input type="number" name="promotion_duration" id="promotion_duration" class="form-control" value="{{ $product->promotion_duration }}">
                </div>

                <div class="col-md-6">
                    <label for="promotion_price">Prix de promotion</label>
                    <input type="number" step="0.01" name="promotion_price" id="promotion_price" class="form-control" value="{{ $product->promotion_price }}">
                </div>

                <div class="col-md-12">
                    <label for="">Meta title</label>
                    <input type="text" name="meta-title" value="{{ $product->meta_title }}" class="form-control">
                </div>
                <div class="col-md-12">
                    <label for="">Meta keywords</label>
                    <input type="text" name="meta-key" value="{{ $product->meta_keywords }}" class="form-control">
                </div>
                <div class="col-md-12">
                    <label for="">Meta description</label>
                    <input type="text" name="meta-descrip" value="{{ $product->meta_descrip }}" class="form-control">
                </div>
                @if ($product->image)
                <img src="{{ asset('assests/uploads/product/'.$product->image) }}" alt="product image" style="width: 100%"">
                @endif
                <div class="col-md-12">
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="col-md-12">
                    <input type="submit" value="modifier" name="" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
