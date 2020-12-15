@extends('layouts.home')

@section('new-plan')

<form method="post" action="/addPlan"" style="padding:20px;">
  {{csrf_field()}}

    <h2> Create a new Plan: </h2>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">Plan Name</label>
        <input type="text" class="form-control" id="inputEmail4" name="type_name" placeholder="Plan Name">
      </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Plan Price</label>
        <input type="text" class="form-control" id="inputPassword4" name="type_price" placeholder="Price">
      </div>
      <div class="form-group col-md-6">

      <input type="submit" class="btn btn-primary" value="+ Add Plan">
      </div>
    </div>
</form>

    @endsection
