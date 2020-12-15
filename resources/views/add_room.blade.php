@extends('layouts.home')

@section('add-room')

<form method="post" action="/addRoom"" style="padding:20px;">
  {{csrf_field()}}

    <h2> Add a new Room: </h2>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">Room Number #</label>
        <input type="text" class="form-control" id="inputEmail4" name="room_nr" placeholder="Room Number">
      </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Room Type</label>
        <input type="text" class="form-control" id="inputPassword4" name="room_type" placeholder="Room Type">
      </div>
      <div class="form-group col-md-6">

      <input type="submit" class="btn btn-primary" value="+ Add Room">
      </div>
    </div>
</form>

    @endsection
