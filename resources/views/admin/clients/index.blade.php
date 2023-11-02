@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h1>La Page Clients</h1>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($clients as $client)
                    @if ($client->is_admin<> '1')


                    <td>
                        {{$client->id}}
                    </td>
                    <td>
                        {{$client->name}}
                    </td>
                    <td>
                        {{$client->email}}
                    </td>
                    <td>
                        <a href="{{ url('view-client-order/'.$client->id) }}" class="btn btn-primary">Afficher</a>
                    </td>
                    </tr>
                    @endif
                    @endforeach

                </tr>
            </tbody>
        </table>

    </div>
</div>
@endsection
