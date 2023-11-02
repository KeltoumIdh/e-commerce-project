@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h1>Admins</h1>


    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($admins as $u)

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
                        
                        </tr>


                    @endforeach

                </tr>
            </tbody>
        </table>

    </div>

</div>
@endsection
