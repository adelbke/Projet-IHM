@extends('layouts.dashboard')
@push('title')
		Profile
@endpush
@section('content')

<div class="container">
<br>

<table class="table">
  <tr>
    <td>Nom</td>
    <td>{{auth()->user()->Lastname}}</td>
  </tr>
  <tr>
    <td>Prénom</td>
    <td>{{auth()->user()->Firstname}}</td>
  </tr>
  <tr>
    <td>Adresse E-Mail</td>

  <td>{{auth()->user()->email}} </td>
  </tr>
  <tr>
    <td>Rôle</td>
    <td>
      @if(auth()->user()->role=="Admin")
      Admin
      @else
      Super Admin
      @endif


    </td>
  </tr>
  <tr>
    <td></td>
    <td></td>
  </tr>

</table>
</div>



@endsection
