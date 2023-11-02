@extends('layouts.admin')
@section('content')
<h1>Commandes de {{ $client->name }}</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Date de commande</th>
                <th>Numéro de suivi</th>
                <th>Prix total</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->created_at->format('d-m-Y') }}</td>
                    <td>{{ $order->tracking_num }}</td>
                    <td>{{ $order->total_price }}</td>
                    <td>{{ $order->status == '0' ? 'En attente' : 'Terminé' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
