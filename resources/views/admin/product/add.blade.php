@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Ajouter Produit</h4>
    </div>
    <div class="card-body">
        <form action="{{url('insert-product')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <select class="form-select" name="categ_id" >
                        <option value="">Sélectionner une Catégorie</option>
                        @foreach ($category as $categ )
                            <option value="{{ $categ->id }}">{{ $categ->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="">Slug</label>
                    <input type="text" name="slug" class="form-control">
                </div>

                <div class="col-md-12">
                    <label for="">Small Description</label>
                    <textarea  name="small_descrip" id="" cols="3" class="form-control"></textarea>
                </div>
                <div class="col-md-12">
                    <label for="">Description</label>
                    <textarea  name="description" id="" cols="3" class="form-control"></textarea>
                </div>
                <div class="col-md-6">
                    <label for="">Original price</label>
                    <input type="number" class="form-control" name="original_price" >
                </div>
                <div class="col-md-6">
                    <label for="">Selling price</label>
                    <input type="number" class="form-control" name="selling_price" >
                </div>
                <div class="col-md-6">
                    <label for="">Quantity</label>
                    <input type="number" class="form-control" name="qty" >
                </div>
                <div class="col-md-6">
                    <label for="">tax</label>
                    <input type="number" class="form-control" name="tax" >
                </div>
                <div class="col-md-6">
                    <label for="">Status</label>
                    <input type="checkbox" name="status" >
                </div>
                <div class="col-md-6">
                    <label for="">trending</label>
                    <input type="checkbox" name="trending" >
                </div>
                <div class="form-group">
                    <label for="">Promo</label>
                    <input type="checkbox" name="promo" >
                </div>
                <div class="col-md-6">
                    <label for="promotion_duration">Durée de promotion (en jours)</label>
                    <input type="number" name="promotion_duration" id="promotion_duration" class="form-control" value="{{ old('promotion_duration', $product->promotion_duration ?? '') }}">
                </div>

                <div class="col-md-6">
                    <label for="promotion_price">Prix de promotion</label>
                    <input type="number" step="0.01" name="promotion_price" id="promotion_price" class="form-control" value="">
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
