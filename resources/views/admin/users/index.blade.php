@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h1>Admins</h1>
        <a href="{{ url('add-admin') }}" class="btn btn-primary">Ajouter Nouveau Admin</a>

    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($users as $u)
                    @if ($u->is_admin==1)
                        <td>
                            {{$u->id}}
                        </td>
                        <td>
                            {{$u->name.' '.$u->lname}}
                        </td>
                        <td>
                            {{$u->email}}
                        </td>
                        <td>
                            {{$u->phone}}
                        </td>
                        <td>
                            <a href="{{ url('/view-user/'.$u->id) }}" class="btn btn-sm btn-primary">Afficher</a>
                        </td>
                        </tr>
                    @endif

                    @endforeach

                </tr>
            </tbody>
        </table>

    </div>
    <div class="card-header">
        <h1>Clients</h1>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($users as $u)
                    @if ($u->is_admin==0)
                        <td>
                            {{$u->id}}
                        </td>
                        <td>
                            {{$u->name.' '.$u->lname}}
                        </td>
                        <td>
                            {{$u->email}}
                        </td>
                        <td>
                            {{$u->phone}}
                        </td>
                        <td>
                            <a href="{{ url('/view-user/'.$u->id) }}" class="btn btn-sm btn-primary">Afficher</a>
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
