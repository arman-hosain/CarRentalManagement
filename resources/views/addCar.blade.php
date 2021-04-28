@extends('layouts.dashboard')

@section('content')
<div class="container">

    <h1>Add Car Details</h1>

   
    <form class="well form-horizontal" action="{{ route('cars.create') }}" method="post" enctype="multipart/form-data">
        @csrf
      
            {{-- brand --}}
            <div class="form-group">
                <label class="col-md-4 control-label">Brand name</label>
                <div class="col-md-8 inputGroupContainer">
                    <div class="input-group"><span class="input-group-addon"><i
                                class="glyphicon glyphicon-tags"></i></span><input id="fullName" name="brand"
                            placeholder="Brand Name" class="form-control" required="true" value="" type="text"></div>
                </div>
            </div>
            {{-- model --}}
            <div class="form-group">
                <label class="col-md-4 control-label">Model name</label>
                <div class="col-md-8 inputGroupContainer">
                    <div class="input-group"><span class="input-group-addon"><i
                                class="glyphicon glyphicon-fire"></i></span><input id="model" name="model"
                            placeholder="model" class="form-control" required="true" value="" type="text"></div>
                </div>
            </div>
            {{-- milage --}}
            <div class="form-group">
                <label class="col-md-4 control-label">Milage</label>
                <div class="col-md-8 inputGroupContainer">
                    <div class="input-group"><span class="input-group-addon"><i
                                class="glyphicon glyphicon-home"></i></span><input id="milage" name="milage"
                            placeholder="milage" class="form-control" required="true" value="" type="text"></div>
                </div>
            </div>
            {{-- seat_number --}}
            <div class="form-group">
                <label class="col-md-4 control-label">Number of Seats</label>
                <div class="col-md-8 inputGroupContainer">
                    <div class="input-group"><span class="input-group-addon"><i
                                class="glyphicon glyphicon-home"></i></span><input id="seat_number" name="seat_number"
                            placeholder="seat number" class="form-control" required="true" value="" type="text"></div>
                </div>
            </div>
            {{-- rent --}}
            <div class="form-group">
                <label class="col-md-4 control-label">Set a Rent</label>
                <div class="col-md-8 inputGroupContainer">
                    <div class="input-group"><span class="input-group-addon"><i
                                class="glyphicon glyphicon-home"></i></span><input id="rent" name="rent"
                            placeholder="Rent" class="form-control" required="true" value="" type="text"></div>
                </div>
            </div>
            {{-- location --}}
            <div class="form-group">
                <label class="col-md-4 control-label"> Location</label>
                <div class="col-md-8 inputGroupContainer">
                    <div class="input-group"><span class="input-group-addon"><i
                                class="glyphicon glyphicon-home"></i></span><input id="location" name="location"
                            placeholder="location" class="form-control" required="true" value="" type="text"></div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label"> Details</label>
                <div class="col-md-8 inputGroupContainer">
                    <div class="input-group"><span class="input-group-addon"><i
                                class="glyphicon glyphicon-home"></i></span><input id="location" name="details"
                            placeholder="details" class="form-control" required="true" value="" type="text"></div>
                </div>
            </div>
            {{-- details --}}
            


                <div class="form-group">
      
                    <div class="col-md-8 inputGroupContainer">
                        <input type="file" name="image" class="form-control">
                    </div>
    
       
                </div>
       
            {{-- picture-upload --}}

   <br>

        <div class="row form-group">
            <div class="col-md-6">
                <button type="submit" class="btn btn-danger w-50 float-right">Create</button>
            </div>
        </div>



    </form>

</div>
@endsection