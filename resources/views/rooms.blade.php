@extends('layouts.home')

@section('rooms')

<h2 style="margin:20px;"> Rooms </h2>
<div class="input-group" style="width: 15%;margin:20px;">
    <input type="text" class="form-control" placeholder="Search Rooms">
    <div class="input-group-append">
      <button class="btn btn-secondary" type="button">
        <i class="fa fa-search"></i>
      </button>
    </div>
  </div>
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Room Number</th>
        <th scope="col">Room Type</th>
        <th scope="col"> Options </th>
      </tr>
    </thead>
    <tbody>
      <?php  $x = 1 ?>
      @foreach($data as $room)
      <tr>
        <th scope="row">{{ $x++ }}</th>
        <td>{{$room->room_id}}</td>
        <td>{{$room->room_type}}</td>
        <td> <a style="background-color: #ff3300;" href="deleteRoom?room_id={{$room->room_id}}"  class="btn"> <i  class="far fa-trash-alt"></i></a></td>
        </tr>
        @endforeach
    </tbody>
  </table>

  <a href="{{ route('add_room')}}" class="btn btn-primary" style="margin:15px;"> Add Room </a>

@endsection
