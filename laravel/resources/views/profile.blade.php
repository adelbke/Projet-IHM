@extends('layouts.dashboard')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="card text-center">
        <div class="card-header">
          User Profile
        </div>
        <div class="card-body">
          <table class="table table-sm">
              <tbody>
                <tr>
                  <th scope="row">Nom</th>
                <td>{{auth()->user()->Firstname}}</td>

                </tr>
                <tr>
                  <th scope="row">Prénom</th>
                  <td>{{auth()->user()->Lastname}}</td>

                </tr>
                <tr>
                  <th scope="row">Email</th>
                  <td >{{auth()->user()->email}}</td>
                </tr>
                <tr>
                  <th scope="row">Role</th>
                  <td >{{auth()->user()->role}}</td>
                </tr>
              </tbody>
            </table>
            <a href="#" class="btn btn-primary">Modifier</a>
        </div>
      </div>
</body>
</html>

@endsection
