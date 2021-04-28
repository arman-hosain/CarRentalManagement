@extends('layouts.dashboard')

@section('content')

<img src="/storage/uploads/{{ $car->picture }}" class="img-responsive" style="display: block; margin-left: auto; margin-right: auto;" />

<div class="card col-10 ml-auto mr-auto">


    <div class="card-body">
      <h1 class="card-title">{{ $car->brand }}</h1>
      <h6>{{ $car->model }}</h6>
      <hr>
              <p>{{ $car->details }}</p>
      <h2>Specifications</h2>

      <table class="table table-col-12">
        <tr>
          <td><img src="/img/map.png" style="width:50px; height:auto">
            <h4 class="card-text" display="inline">{{ $car->location }}</h4>
          </td>
        <td>
          <img src="/img/seat.png" style="width:50px; height:auto">
        <h4 class="card-text" display="inline">{{ $car->seat_number }}</h4>
        </td>
        <td>
          <img src="/img/speedometer.png" style="width:50px; height:auto">
          <h4 class="card-text" display="inline">{{ $car->milage }}</h4>
        </td>
        <td>
          <img src="/img/price-tag.png" style="width:50px; height:auto">
          <h4 class="card-text" display="inline">{{ $car->rent }}</h4>
        </td>


        </tr>
        <tr>
          {{-- <h4>{{ $car->details }}</h4> --}}
        </tr>

      </table>

     
      <!-- ===================================== -->

      <form action="{{ route('cars.requestBooking',$car->id) }}" method="post" >
        @csrf
          <div class="form-group">
              <label>Message</label>
              <textarea class="form-control col-3" name="message" rows="2"></textarea>
            </div>


        <div class="form-row">
          <div class="col-3">
            <input type="date" class="form-control"  name="request_date"/>
          </div>
        </div>

        <br>
        <button type="submit" class="btn btn-danger col-3 ml-auto mr-auto">Request</button>


      </form>
    </div>
</div>





@endsection
