@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <ul class="navbar-nav me-auto">

            <select name="category" id="categorySelect" class="form-select ml-3" aria-label="Default select example" style="width: 120px;">
                <option selected value="{{ url('/') }}">Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script >
                $(document).ready(function() {
                    $('#categorySelect').on('change', function() {
                        var categoryId = $(this).val();
                        var url = "{{ route('products.filter', ['id' => ':id']) }}";
                        window.location.href = url.replace(':id', categoryId);
                    });
                });
            </script>

            <form class="d-flex mt-3 ml-0 col-6" action="{{ route('product.search') }}" method="GET">
                <input class="form-control  me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary mt-0" type="submit">Search</button>
            </form>
        </ul>

        <h1>La Page Produit</h1>
        <a href="{{ url('prod-repture/') }}" class="btn btn-success btn-sm col-3">produits d'une quantite limitée</a>

    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                    <th>ID</th>
                    <th>Categorie</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Statut</th>
                    <th>Promo</th>
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
                        <a class="link-success" href="prod-categ/{{ $prod->category->id }}">{{optional($prod->category)->name}}</a>
                    </td>
                    <td>
                        <a class="link-primary" href="{{ url('/products/'.$prod->id.'/show-clients') }}">{{$prod->name}}</a>
                    </td>
                    <td>
                        {{$prod->description}}
                    </td>
                    <td>
                        {{$prod->selling_price}}
                    </td>
                    <td>
                        @if ($prod->qty <= 0)
                            <span class="text-danger">Rupture de stock</span>
                        @elseif ($prod->qty <= 5)
                            <span class="text-warning">Quantité limitée</span>
                        @else
                            <span class="text-success">En stock</span>
                        @endif
                    </td>
                    <td>
                        @if ($prod->promotion_duration && $prod->promotion_price)
                        @php
                            $promotionEndDate = \Carbon\Carbon::parse($prod->promotion_created_at)->addDays($prod->promotion_duration);
                        // pour convertir la date de création du produit en un objet Carbon que nous pouvons manipuler.
                        @endphp
                        @if (\Carbon\Carbon::now()->lt($promotionEndDate))
                        {{-- si La date actuelle est inférieure à la date de fin de la promotion --}}
                            <span class="text-danger">En promotion</span> jusqu'au {{ $promotionEndDate->format('d/m/Y') }} - {{ $prod->promotion_price }} MAD
                        @else
                            Promotion expirée
                        @endif
                        @else
                            Prix normal
                        @endif
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
</div> </div>
@endsection
