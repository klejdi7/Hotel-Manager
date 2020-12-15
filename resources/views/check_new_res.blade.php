@extends('layouts.home')

@section('check_room')
<h1 style="background-color:#ff3300;padding:12px; border-radius:12px;color:#fff;"> Confirm Reservation </h2>
<? $people = "";
    $price = "";
?>
  @foreach ($data as $res)
<?php
  $people = $res->adults + $res->children;

$room = $res->room_nr;
$plan = $res->plan_type;
$room_t = DB::table('rooms')
->where('room_id', '=', $room)
->get();
$plan_p = DB::table('plans')
->where('plan_type', '=', $plan)
->get();
?>
<h1> Client Data <span class="badge badge-secondary" style="margin-bottom:10px;">  #{{$res->reservation_id}}</span></h1>
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

  <h1>People <span class="badge badge-secondary" style="margin-bottom:10px;">  {{$res->adults + $res->children}}</span></h1>
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
  @foreach($plan_p as $plan)
  <?php
 $p_plan = $plan->plan_price;
 $price = $p_plan * $people ;
  ?>
    <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon1">Total</span>
    </div>
    <input readonly type="text" class="form-control" placeholder="{{$price}}€" aria-label="Username" aria-describedby="basic-addon1">
  </div>
  @endforeach
</div>
<div class="form-row">
<div class="form-group col-md-4">
<a  style="background-color: #379DD8; color: #fff; text-decoration:none;text-align:center; " class="form-control" id="check" name="date_check" href="/konfirmo" disabled>Confrim </a>
</div>
<div class="form-group col-md-4">

<a  style="background-color: #ff3300; color: #fff; text-decoration:none;text-align:center; " class="form-control" id="check" name="date_check" href="/delete?res_id={{$res->reservation_id}}&room_nr={{$res->room_nr}}" disabled>Delete </a>
</div>
</div>
  @endforeach
  <?php
        $update = DB::table('reservations')
              ->where('reservation_id', $_GET['res_id'])
              ->update(['price' => $price]);
  ?>
  @endsection
