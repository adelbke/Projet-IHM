@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <h1 class="text-center">la liste des utilisateurs</h1>

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
                <form  method="POST" action="{{ url('/list',['id' => $user->id]) }}">
                    @csrf
                    @method('DELETE')
                    @if ($user->confirmed==false)
                        <a href="" class="btn btn-success">Confirmer</a>
                    @endif

                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
                </td>
            </tr>
            @endif
            @endforeach
        </table>
    </div>
</div>
    
@endsection