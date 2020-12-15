@extends('layouts.home')

@section('finished')
<?php $res_name = "New" ; ?>
    <h2 style="margin:20px;"> Rezervimet </h2>
    <form action="/search" method="POST" role="search">
      {{ csrf_field() }}     
         <div class="input-group" style="width: 20%;margin:20px;">
      <input type="text" class="form-control" name="q" placeholder="Kerko rreth rezervimeve">
      <div class="input-group-append">
        <button class="btn btn-secondary" id="search" type="submit">
          <i class="fa fa-search"></i>
        </button>
      </div>
    </div>
    </form>

    <table class="table">

        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Room Number</th>
            <th scope="col">Room Type</th>
            <th score="col">Plan</th>
            <th >Options</th>
          </tr>
        </thead>
        <tbody>
         <?php  $x = 1 ?>
          @foreach($data as $i)
          <tr>
            <th scope="row">{{ $x++ }}</th>
            <td id="name">{{ $i->fname_res }}</td>
            <td>{{$i->room_nr}}</td>
            <td>Suite</td>
          <td>{{ $i->plan_type}}</td>
         
            <td> <form method="post" action="getFInfo">    {{csrf_field()}}
              <button type="submit"  class="btn btn-primary"  data-toggle="modal" data-target=".bd-example-modal-lg" name="option"> <i class="fas fa-info-circle fa-1x"></i> <input type='hidden' name='selectedName' value="{{$i->fname_res}} "/>
              </button> </form></td>
          </tr>
          @endforeach
        </tbody>
      </table>

@endsection