@extends('layouts.home')

@section('new_res')
<?php         
$plans = DB::table('plans')->get();

$rooms = DB::table('rooms')
    ->where('status', '=', null)
    ->get();?>
<form method="post" action="/store">
  {{csrf_field()}}
  {{-- {{ method_field('PUT') }} --}}
    <h2> Te dhena </h2>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4" >First Name</label>
        <input type="text" class="form-control" id="inputEmail4" name="fname" placeholder="First Name">
      </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Last Name</label>
        <input type="text" class="form-control" id="inputPassword4" name="lname" placeholder="Last Name">
      </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">NID</label>
      <input type="text" class="form-control" id="inputPassword4" name="nid" placeholder="NID">
    </div>
  </div>
    <div class="form-row">
        <div class="form-group col-md-6">
          <label for="checkin">Check In</label>
          <input type="date" placeholder="Check In" class="form-control qty1" id="checkin" name="checkin">

        </div>
        <div class="form-group col-md-6">
            <label for="checkout">Check Out</label>
            {{-- <input type="text" class="form-control" id="inputCity"> --}}
            <input type="date" placeholder="Check Out" class="form-control qty1" id="checkout" name="checkout">
 
        </div>
 
      <div id="check_dates" style="display:none;width: 100%; height: 40px;color: #fff; background-color: #ff3300;border-radius: 12px; margin-bottom: 20px;">
          {{-- <h5 class="total"></h5> --}}
          <input type="text" style="margin: 9px"  class="total" value="" />

      </div>
      </div>
      <h2> People </h2>
      <div class="form-row">

        <div class="form-group col-md-6">

          <label for="adult">Adults</label>
          <select class="form-control" id="exampleFormControlSelect1" name="adult">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>

          </select>
        </div>
        <div class="form-group col-md-6">
            <label for="child">Children</label>
            {{-- <input type="text" class="form-control" id="inputCity"> --}}
            {{-- <input type="number"  placeholder="Femije" class="form-control" id="child" name="child"> --}}
            <select class="form-control" id="exampleFormControlSelect1" name="child">
            <option value="">No Children</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
            </select>
        </div>
      </div>
      <h2> Room&Plan </h2>
      <div class="form-row">

        <div class="form-group col-md-4">

          <label for="adult">Room</label>
          <select class="form-control" id="exampleFormControlSelect1" name="room_nr">
            <option> Room Number </option>
                  @foreach($rooms as $room)
              <option value="{{$room->room_id}}">{{$room->room_id}}</option>
            @endforeach
            </select>
        </div>

        <div class="form-group col-md-4">
            <label for="child">Plan</label>
            <select class="form-control" id="exampleFormControlSelect1" name="room_plan">
              <option> Plan </option>
              @foreach($plans as $plan)
                <option value="{{$plan->plan_type}}">{{$plan->plan_type}}</option>
  @endforeach
              </select>
        </div>
      </div>
    
    <div class="form-group">
      
    </div>
    <input type="hidden" value="{{ Auth::user()->name }}" name="res_by">
    
    <button type="submit" name="krijo" class="btn btn-primary">Create Reservation</button>
  </form>
 
@endsection