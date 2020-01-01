@extends('layouts.dashboard')


@section('content')
@push('title')
		Liste des Utilisateurs
@endpush

<div class="container">
    <div class="row">
        {{-- <h1 class="text-center">la liste des utilisateurs</h1> --}}

        <table class="table">
            <tr>
                <th>nom</th>
                <th>prénom</th>
                <th>email</th>
                <th>options</th>
            </tr>

            @foreach ($users as $user)
            @if ($user->role=="Admin")
            <tr>
                <td>{{$user->Lastname}}</td>
                <td>{{$user->Firstname}}</td>
                <td>{{$user->email}}</td>
                <td>
                <div class="row">
                @if ($user->confirmed=="Pending")
                  <form  method="POST" action="{{ url('/list',['id' => $user->id]) }}">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-success mx-2">Confirmer</button>
                </form>
                @endif
                <form  method="POST" action="{{ url('/list',['id' => $user->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mx-2">Supprimer</button>
                </form>
            </div>
                </td>
            </tr>
            @endif
            @endforeach
        </table>
    </div>
</div>
    
@endsection