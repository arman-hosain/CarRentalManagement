<?php


namespace App\Http\Controllers;
use Auth;
use App\car;
use Illuminate\Http\Request;
use App\requestBooking;
class RequestController extends Controller
{
    //
    public function requestCar($id){

         $car=Car::find($id);
        // dd($id);

        return view('request',["car"=>$car]);

    }


    public function requestBook($id, Request $request){

        $car=Car::find($id);

        $requestcar=new requestBooking();
        $requestcar->picture=$car->picture;
        $requestcar->car_id=$id;
        // dd($request['message']);
        $requestcar->message=$request['message'];
        $requestcar->request_date=$request['request_date'];
        $requestcar->request_status="pending";
       
        $requestcar->car_brand=$car->brand;
      
        $requestcar->NID=Auth::user()->NID;
        $requestcar->customer_name=Auth::user()->name;
        $requestcar->email=Auth::user()->email;
        
        
        // dd($request->input('rent'));
        $requestcar->save();
       
        return redirect()->route('cars.show');

    }


    public function requestStatus($id){
        $car=requestBooking::findOrFail($id);
      
        if ($car->request_status=="pending"){
            $car->request_status="accepted";
        }
        else{
            $car->request_status="pending";
        }
       
        $car->update();
      return redirect()->route('showRequests');
    }
}
