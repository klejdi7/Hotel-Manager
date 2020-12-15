@extends('layouts.home')

@section("res_search")
<div class="container">
  @if(isset($details))
      <h3> Results for "<b> {{ $query }} </b>":</h3>
  <table class="table table-striped">
      <thead>
          <tr>
             <th>Reservation Id</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Options</th>
          </tr>
      </thead>
      <tbody>
          @foreach($details as $user)
          <tr>
            <td>{{$user->reservation_id}}</td>
              <td>{{$user->fname_res}}</td>
              <td>{{$user->lname_res}}</td>
              <td> <form method="post" action="reservations/getInfo">    {{csrf_field()}}
                <button type="submit"  class="btn btn-primary"  data-toggle="modal" data-target=".bd-example-modal-lg" name="option"> <i class="fas fa-info-circle fa-1x"></i> <input type='hidden' name='selectedName' value="{{$user->fname_res}} "/>
                </button> </form></td>
                      </tr>
          @endforeach
      </tbody>
  </table>
</div>
@endif
@endsection
