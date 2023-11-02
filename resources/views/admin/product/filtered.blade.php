@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Résultats de filtrage</h1>
    </div>
    <div class="card-body">
        @if ($products->isEmpty())
            <p>Aucun produit trouvé dans cette catégorie.</p>
        @else
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Catégorie</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Statut</th>
                        <th>Promo</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $prod)
                        <tr>
                            <td>{{ $prod->id }}</td>
                            <td>
                                <a class="link-success" href="prod-categ/{{ $prod->category->id }}">{{ optional($prod->category)->name }}</a>
                            </td>
                            <td>
                                <a class="link-primary" href="{{ url('/products/'.$prod->id.'/show-clients') }}">{{ $prod->name }}</a>
                            </td>
                            <td>{{ $prod->description }}</td>
                            <td>{{ $prod->selling_price }}</td>
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
                                    @endphp
                                    @if (\Carbon\Carbon::now()->lt($promotionEndDate))
                                        <span class="text-danger">En promotion</span> jusqu'au {{ $promotionEndDate->format('d/m/Y') }} - {{ $prod->promotion_price }} MAD
                                    @else
                                        Promotion expirée
                                    @endif
                                @else
                                    Prix normal
                                @endif
                            </td>
                            <td>
                                <img src="{{ asset('assets/uploads/product/' . $prod->image) }}" alt="Image here" style="width: 80px; height: 80px;">
                            </td>
                            <td>
                                <a href="{{ url('edit-product/'.$prod->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ url('delete-product/'.$prod->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                <a href="{{ url('/products/'.$prod->id.'/show-clients') }}" class="btn btn-info btn-sm">Afficher</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
