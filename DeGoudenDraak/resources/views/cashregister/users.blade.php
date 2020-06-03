@extends('layouts.cashregister')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-lg-offset-1 m-5">
                @if(Session::has('fail'))
                    <div class="alert alert-danger">
                        {{Session::get('fail')}}
                    </div>
                @endif
                <div class="table-responsive">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h4>Gebruikers overzicht</h4>
                            <button title="Wijzig het bericht." type="button" class="btn btn-success font-weight-bold float-right" data-toggle="modal" data-target="#add">+</button>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel">Bericht wijzigen</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"></span>
                                        <span class="fas fa-window-close text-danger"></span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form action="/cashregister/users" class="col-sm-12" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <label for="Points">Naam</label>
                                        <input type="text" class="form-control" value="" name="name" id="name" required>

                                        <label for="Points">Email</label>
                                        <input type="email" class="form-control" value="" name="email" id="email" required>

                                        <label for="Points">Wachtwoord</label>
                                        <input type="text" class="form-control" value="" name="password" id="password" required>

                                        <input class="btn btn-sm btn-success" type="submit">
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <div class="form-group col-sm-12 d-flex flex-row-reverse justify-content-between">

                                        <button title="Verwijder het bericht inclusief de afbeeldingen." type="submit" class="btn btn-danger mr-2">
                                            <i class="fas fa-trash"></i>
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table id="usersTable" class="table table-bordered table-striped">

                        <thead>
                        <tr>
                            <th>Naam</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Operaties</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($users as $user )

{{--                            @if ($user->roles()->pluck('name')->implode(' ') == null)
                            @else--}}

                                <tr>


                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->roles()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}

                                    <td>
                                        @if($user->hasRole("Admin"))
                                            <a title="Haal de rol administrator weg bij de gebruiker" class="btn btn-primary" href="/admin-area/users/remove-admin/{{$user->id}}">Admin Weghalen</a>
                                        @else
                                            <a title="Maak de gebruiker administrator" class="btn btn-primary" href="/admin-area/users/give-admin/{{$user->id}}">Maak Admin</a>
                                        @endif
                                        @if($user->hasRole("Contentmanager"))
                                            <a title="Haal de rol Content manager weg bij de gebruiker" class="btn btn-primary" href="/admin-area/users/remove-contentmanager/{{$user->id}}">Content Manager Weghalen</a>
                                        @else
                                            <a title="Maak de gebruiker een Content manager" class="btn btn-primary" href="/admin-area/users/give-contentmanager/{{$user->id}}">Maak Content Manager</a>
                                        @endif
                                        <form class="float-right d-flex pr-2" method="POST" action="/cashregister/users/{{$user->id}}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <div class="form-group d-flex float-right">
                                                <button title="Verwijder de gebruiker" type="submit" class="btn btn-danger delete-user float-left">
                                                    X
                                                </button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
{{--                            @endif--}}

                        @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection