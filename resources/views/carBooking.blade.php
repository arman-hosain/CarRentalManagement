@extends('layouts.dashboard')

@section('content')
<div class="container">

    <h1>Add Car Details</h1>

   
    <form  action="{{ route('cars.carBooking',$car->id) }}" method="POST">
        @csrf
      
        <div class="">
                <img src="/storage/uploads/{{ $car->picture }}" >
        </div>
        <div class="card p-4">
            <h4>
                Car Model: <strong> {{ $car->brand }} {{ $car->model }}</strong>
            </h4>
        </div>

        <div class="card p-4">
            <h5>
                Customer name:{{ Auth::user()->name }}
            </h5>
            <h6>
                Price to pay: {{ $car->rent }} TAKA
            </h6>
        </div>
            {{-- location --}}
            
            <div class="form-group">
                <label class="col-md-4 control-label"> Rent time</label>
                <div class="col-md-8 inputGroupContainer">
                    <div class="input-group"><span class="input-group-addon"><i
                                class="glyphicon glyphicon-home"></i></span><input id="rent" name="rent"
                            placeholder="rent time" class="form-control" required="true"  type="date">
                        </div>
                </div>
            </div>
            {{-- details --}}

   

        <div class="row form-group">
            <div class="col-md-6">
                <button type="submit" class="btn btn-danger w-50 float-right">Book </button>
            </div>
        </div>



    </form>


</div>
@endsection