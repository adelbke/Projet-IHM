@extends('layouts.dashboard')

@section('content')
@push('title')
lésion Ajoutée
@endpush

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Mon joli site</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
            textarea { resize: none; }
            .card { width: 25em; }
        </style>
    </head>
    <body>
        <br>
        <br>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Bravo!</h4>
            <p class="mb-0">Votre lésion a bien été Ajouté.</p>
          </div>
    </body>
</html>

@endsection
