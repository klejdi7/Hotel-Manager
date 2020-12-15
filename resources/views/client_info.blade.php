@extends('layouts.home')

@section('info')
@foreach($data as $res)
<?php 
$room = $res->room_nr;

$room_t = DB::table('rooms')
->where('room_id', '=', $room)
->get();
?>
@if(Auth::user()->role === "Admin")
<div class="badge badge-secondary" style="font-size: 30px;margin-bottom:30px;"><h2>Reservation done by : {{$res->res_by}} </h2>
<h2> Created At {{$res->created_at}} </h2>
</div>
@endif
<h1>Client Data <span class="badge badge-secondary" style="margin-bottom:10px;">  #{{$res->reservation_id}}</span></h1>
<div class="info" style="color:#000;">
<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon1">First Name</span>
    </div>
    <input readonly type="text" class="form-control" placeholder="{{$res->fname_res}}" aria-label="Username" aria-describedby="basic-addon1">
  </div>

  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon1">Last Name</span>
    </div>
    <input readonly type="text" class="form-control" placeholder="{{$res->lname_res}}" aria-label="Username" aria-describedby="basic-addon1">
  </div>

  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon1">NID</span>
    </div>
    <input readonly type="text" class="form-control" placeholder="{{$res->nid}}" aria-label="Username" aria-describedby="basic-addon1">
  </div>

  <h1>Room Number <span class="badge badge-secondary" style="margin-bottom:10px;">  #{{$res->room_nr}}</span></h1>
  @foreach ($room_t as $room)
  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon1">Room Type</span>
    </div>
    <input readonly type="text" class="form-control" placeholder="{{$room->room_type}}" aria-label="Username" aria-describedby="basic-addon1">
  </div>
  @endforeach
  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon1">Plan</span>
    </div>
    <input readonly type="text" class="form-control" placeholder="{{$res->plan_type}}" aria-label="Username" aria-describedby="basic-addon1">
  </div>

  <h1>Persona <span class="badge badge-secondary" style="margin-bottom:10px;">  {{$res->adults + $res->children}}</span></h1>
  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon1">Adults</span>
    </div>
    <input readonly type="text" class="form-control" placeholder="{{$res->adults}}" aria-label="Username" aria-describedby="basic-addon1">
  </div>
  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon1">Children</span>
    </div>
    <input readonly type="text" class="form-control" placeholder="{{$res->children}}" aria-label="Username" aria-describedby="basic-addon1">
  </div>
  <?php 
 $datetime1 = new DateTime($res->check_in);
  $datetime2 = new DateTime($res->check_out);
  $interval = $datetime1->diff($datetime2);
  $elapsed = $interval->format('%a Nights');
  ?>
<h1>Dates <span class="badge badge-secondary" style="margin-bottom:10px;">{{$elapsed}}</span></h1>
<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon1">Check In</span>
    </div>
    <input readonly type="text" class="form-control" placeholder="{{$res->check_in}}" aria-label="Username" aria-describedby="basic-addon1">
  </div>
  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon1">Check Out</span>
    </div>
    <input readonly type="text" class="form-control" placeholder="{{$res->check_out}}" aria-label="Username" aria-describedby="basic-addon1">
  </div>
  <h1>Price <span class="badge badge-secondary" style="margin-bottom:10px;">Total</span></h1>
<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon1">Total</span>
    </div>
    <input readonly type="text" class="form-control" placeholder="{{$res->price}}€" aria-label="Username" aria-describedby="basic-addon1">
  </div>
</div>
  @endforeach
@endsection