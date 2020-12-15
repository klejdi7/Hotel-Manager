@extends("layouts.home")

@section('plans')

<h2 style="margin:20px;"> Plans </h2>
<div class="input-group" style="width: 15%;margin:20px;">
  <input type="text" class="form-control" placeholder="Search for Plans">
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
        <th scope="col">Plan  </th>
        <th scope="col">Price</th>
        <th scope="col"> Options </th>
      </tr>
    </thead>
    <tbody>
      <?php  $x = 1 ?>
      @foreach($data as $plan)
      <tr>
        <th scope="row">{{ $x++ }}</th>
        <td>{{$plan->plan_type}}</td>
        <td>{{$plan->plan_price}}€</td>
        <td> <a style="background-color: #ff3300;" href="deletePlan?plan_id={{$plan->plan_id}}"  class="btn"> <i  class="far fa-trash-alt"></i></a></td>
      </tr>
        @endforeach
    </tbody>
  </table>

<a href="{{ route('add_plan')}}" class="btn btn-primary" style="margin:15px;"> Add Plan </a>
@endsection
