@extends('layouts.home')

@section('users')
    <h2 style="margin:20px;"> Perdorues </h2>
    <div class="input-group" style="width: 20%;margin:20px;">
      <input type="text" class="form-control" placeholder="Kerko rreth perdoruesve">
      <div class="input-group-append">
        <button class="btn btn-secondary" id="search" type="button">
          <i class="fa fa-search"></i>
        </button>
      </div>
    </div>
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Email</th>
            <th scope="col">Username</th>
            <th scope="col">Roli</th>
            <th scope="col">Krijuar</th>
            <th scope="col">Options</th>


          </tr>
        </thead>
        <tbody>
          @foreach($data as $user)

          <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->username}}</td>
            <td>{{$user->role}}</td>
            <td>{{$user->created_at}}</td>
            @if($user->username === Auth::user()->username && $user->role === "Admin")
            <td> </td>
            @else
            <td> <a style="background-color: #ff3300;" href="deleteUser?id={{$user->id}}"  class="btn"> <i  class="far fa-trash-alt"></i></a></td>
            @endif
          </tr>
@endforeach
        </tbody>
      </table>
      <a class="btn btn-primary" href="/newuser" style="margin:15px;"> Perdorues i ri </a>

@endsection