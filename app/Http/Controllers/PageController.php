<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\car;
use App\carBooking;
use App\User;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;
use App\requestBooking;

class PageController extends Controller
{
    //
    public function addCar(){
        if (Auth::user()->role==1){
        return view('addCar'); //php file jei name e ase ota
        }
        else{
            return "Access Denied";
        }
    }
    
    
    public function showCar(){

        
        $cars=car::all();
        // $cars=car::where('status', 0)->get();
        $user=User::find(Auth::id());

        return view('index',['cars'=>$cars,'user'=>$user]);
   

    }

    public function showBookedCar(){
        if(Auth::user()->role==1)
        { $booked=carBooking::all();}
        else
            {
                $booked=carBooking::where('email', Auth::user()->email)->get();
            }
        

        $car=car::all();
        return view('bookedCar',['carBooking'=>$booked,'car'=>$car]);
    }

    public function showRequest(){
        if(Auth::user()->role==1)
       { $showReq=requestBooking::all();}
       else
       {
        $showReq=requestBooking::where('email',Auth::user()->email )->get();
       }
        return view('showRequest',['showReq'=>$showReq]);
    }

}
