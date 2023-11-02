@extends('layouts.admin')
@section('content')
<h1>Clients qui ont commandé le produit : {{ $product->name }}</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Montant total des commandes</th>
                <th>status</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>
                        @if ($order->client)
                            {{ $order->client->name }}
                        @endif
                    </td>
                    <td>
                        @if ($order->client)
                            {{ $order->client->email }}
                        @endif
                    </td>
                    <td>
                        @if ($order->client)
                            {{ $order->client->phone }}
                        @endif
                    </td>

                    <td>
                        {{ $order->client->orders()->where('product_id', $product->id)->sum('total_price') }}
                    </td>
                    <td>
                        @if ($order->status == 0)
                        En attente
                        @elseif ($order->status == 1)
                            Terminé
                        @else
                            Statut inconnu
                        @endif
                    </td>
                </tr>

            @endforeach

        </tbody>
    </table>
@endsection
