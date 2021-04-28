<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\car;
use App\carBooking;


class carBookingController extends Controller
{
    //
    public function bookingform($id){
        
        $car=Car::find($id);

        return view('carBooking',['car'=>$car]);

    }

    public function booking(Request $request,$id){

        
        $car=Car::find($id);

        $book=new carBooking();
        $book->car_id=$id;
        $book->customer_NID=Auth::user()->NID;
        $book->brand=$car->brand;
        $book->model=$car->model;
        $book->customer_NID=Auth::user()->NID;
        $book->name=Auth::user()->name;
        $book->email=Auth::user()->email;
        $book->rent_time=$request->input('rent');
        $book->price=$car->rent;
        $book->payment_status="unpaid";
        $car->status=1;
        // dd($request->input('rent'));
        $book->save();
        $car->save();
        return redirect()->route('cars.show');






    }
    public function paymentUpdate($id){
        $car=carBooking::findOrFail($id);
      
        if ($car->payment_status=="paid"){
            $car->payment_status="unpaid";
        }
        else{
            $car->payment_status="paid";
        }

        $car->update();
      return redirect()->route('cars.showBookedCar');
    }


  
}

