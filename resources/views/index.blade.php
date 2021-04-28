@extends('layouts.dashboard')


@section('content')
<nav class="navbar navbar-light bg-dark">
  <a class="navbar-brand"  style="color: white;">Search cars here</a>
  
  <form class="form-inline" method="GET" action="{{ route('search') }}">
    <input class="form-control mr-sm-2" type="search" aria-label="Search" name="search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>


@foreach ($cars as $car)
<div class="container col">


  
    <div class="card-body">
      <table class="table table-dark">
        <tr>
          <td>
            <h1>{{ $car->brand }}</h1>
            <p class="lead font-italic">{{ $car->model }}</p>
            <hr>
            <p>
              
              <br />
              <small>{{ $car->details }}</small>
            </p>
           <hr>
            <p >
              <img src="img/map.png" style="width: 30px" /> Location:<br />{{ $car->location }}
            </p>
            <p>
              <img src="img/seat.png" style="width: 30px" /> Number of seats: <br>
              {{ $car->seat_number }}
            </p>

            <p >
              <img src="img/speedometer.png" style="width: 30px" />Car Milage
              <br>{{ $car->milage }}
            </p>
            <p >
              <img src="img/price-tag.png" style="width: 30px" /> <br>{{ $car->rent }} Taka
            </p>

        @if ($car->status == 1)
            <div> Status:  <span class="badge badge-danger text-wrap" style="width: 10rem;">Reserved</span></div>
        @else
            <div>Status:   <span class="badge badge-success text-wrap" style="width: 10rem;">Available</span></div>
        @endif


            <br>

          </td>

          <td>
            <div class="text-center">
              <img src="/storage/uploads/{{ $car->picture }}" style="height: 300px; width: auto" />
            </div>
            
              <div class="d-flex"  style="margin-top:30%;">
                @if (Auth::user()->role == 1)
                  <div style="margin-right:25px;">
                    <a class="btn btn-primary" href="{{ route('cars.statusUpdate', $car->id) }}"> change
                      status </a>
                  </div>
                <br>
                  <div style="margin-right:25px;"><a class="btn btn-success" href="{{ route('cars.edit', ['car' => $car]) }}"> Edit </a></div>
                <br>
                  <div>
                    <form class="d-inline" action="{{ route('cars.deletex', $car->id) }}" method="post">
                      @method('delete')
                      @csrf
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                  </div>
                @else
                @if ($car->status == 1)
                  <div><a class="btn btn-success" href="{{ route('cars.request', $car->id) }}">Request </a></div>
                @else
                  <div><a class="btn btn-success" href="{{ route('cars.book', $car->id) }}">Rent Car </a></div>
                
                @endif
                @endif
              </div>


     
          </td>
        </tr>

        <hr />
      </table>
    </div>
  </div>
  @endforeach

@endsection
